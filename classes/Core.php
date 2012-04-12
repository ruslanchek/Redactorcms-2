<?php
    Class Core extends Project {
        private
        $static_routes = array(),
        $error404;

        protected
        $template;

        public
        $page,
        $uri_chain,
        $uri,
        $answer_type,
        $current_route,
        $controller,
        $maildata;

        function __construct($config){
            $sd = $_SERVER['DOCUMENT_ROOT'];

            $this->config = $config;

            //Set up DB
            $this->db = new DB(
                $this->config['db_base'],
                $this->config['db_host'],
                $this->config['db_user'],
                $this->config['db_pass']
            );

            //Set up Smarty
            $this->smarty = new Smarty();

            $this->smarty->setTemplateDir($sd.'/templates/');
            $this->smarty->setCompileDir($sd.'/templates_c/');
            $this->smarty->setConfigDir($sd.'/configs/');
            $this->smarty->setCacheDir($sd.'/cache/');

            //Smarty settings
            $this->smarty->force_compile = false;
            $this->smarty->debugging = false;
            $this->smarty->caching = false;
            $this->smarty->cache_lifetime = 120;

            $this->smarty->assign('core', $this);

            //Prepare main data
            $this->setRequest();
            $this->setAnswerType();

            //Run
            parent::__construct();
        }

        /* Core utilities
        *****************************************************************************/
        //Find value in array
        private static function findValueInArray($needle, $haystack, $index_name){
            $found = false;
            foreach ($haystack as $key => $value) {
                if ($value[$index_name] == $needle) {
                    $found = $key;
                    break;
                };
            };
            return $found;
        }

        /* Core functions
        *****************************************************************************/
        //Process the request URL vars
		private function setRequest(){
			$uri = mb_strtolower($_SERVER['REQUEST_URI'], "UTF-8");
			$this->uri = parse_url(preg_replace('/\/+/', "/", $uri, PHP_URL_PATH));
            $this->uri = preg_replace('/\/+/', "/", $this->uri['path'].'/');
			$this->uri_chain = explode('/', trim($this->uri, '/'));
		}

        //Set answer type
        private function setAnswerType(){
            if(isset($_GET['ajax'])){
                $this->answer_type = 'ajax';
            }else{
                $this->answer_type = 'html';
            };
        }

        //Process route
        private function getProcessRoute(){
            foreach($this->static_routes as $key => $value){
                if(preg_match('|/'.trim($value['uri'], '/').'/(.*)$|i', $this->uri, $match) && $value['chain']){
                    return array('status' => true, 'match' => $match, 'key' => $key);
                }elseif($value['uri'] == '/'){
                    return array('status' => true, 'match' => $match, 'key' => $key);
                }elseif($value['uri'] == $this->uri && !$value['chain']){
                    return array('status' => true, 'key' => $key);
                };
            };
        }

        //Get pages array
        private function getPagesArray($total_pages, $current_page){
            $result = array();
            $width = 5;

            if($total_pages > $width){
                $offset = ($width-1)/2;

                $p_from = $current_page - $offset;
                $p_to = $current_page + $offset;

                if($p_to > $total_pages){
                    $p_to = $total_pages;
                };

                if($p_from < 1){
                    $p_from = 1;
                };

                if($p_from <= $offset-1){
                    $p_to = $width-$p_from+1;
                };

                if($p_to >= $total_pages){
                    $p_from = $total_pages-$width+1;
                };

                $i = $p_from-1;

                if($p_from > 1){
                    $result[] = array('page' => 1, 'name' => 1);
                    $result[] = array('name' => '...');
                };

                while($i < $p_to){
                    $i++;

                    if($current_page == $i){
                        $result[] = array('page' => $i, 'name' => $i, 'current' => true);
                    }else{
                        $result[] = array('page' => $i, 'name' => $i);
                    };
                };

                if($p_to < $total_pages){
                    $result[] = array('name' => '...');
                    $result[] = array('page' => $total_pages, 'name' => $total_pages);
                };
            }else{
                for($i = 1; $i < $total_pages+1; $i++){
                    if($current_page == $i){
                        $result[] = array('page' => $i, 'name' => $i, 'current' => true);
                    }else{
                        $result[] = array('page' => $i, 'name' => $i);
                    };
                };
            };

            return $result;
        }

        /* Global functions
        *****************************************************************************/
        //Check current patch for dinamyc route
        private function checkDynamicRoute(){
            $query = "
                SELECT
                    `structure`.`id`,
                    `structure`.`pid`,
                    `structure_data`.`path`,
                    `structure_data`.`title`,
                    `structure_data`.`description`,
                    `structure_data`.`keywords`,
                    `structure_data`.`name`,
                    `structure_data`.`template`,
                    `structure_data`.`page_id`,
                    `structure_data`.`mode`,
                    `structure_data`.`private`
                FROM
                    `structure`,
                    `structure_data`
                WHERE
                    `structure`.`id` = `structure_data`.`id` &&
                    `path` = '".DB::quote($this->uri)."' &&
                    `publish` = 1
            ";

            $data['data'] = $this->db->assocItem($query);

            if(!empty($data['data'])){
                $data['status'] = true;
            };

            return $data;
        }

        //Execute route of the static controller
        private function setStaticControllerRoute($item){
            $bc[] = array(
                'name' => $this->getNodeData(1, 'name'),
                'path' => '/'
            );

            $bc = array_merge($bc, $item['vars']['breadcrumbs']);

            $this->page = array(
                'title'         => $item['vars']['title'],
                'description'   => $item['vars']['description'],
                'keywords'      => $item['vars']['keywords'],
                'content'       => $item['vars']['content'],
                'h1'            => $item['vars']['h1'],
                'breadcrumbs'   => $bc,
                'mode'          => $item['mode']
            );

            $this->current_route['mode'] = $item['name'];
        }

        //Process route of the controller
        public function parseControllerChain($chain){
            $found = false;

            foreach($chain as $item){
                if($item['route'] == $this->uri){
                    $found = true;
                    $current_item = $item;
                };

                if($item['name'] == ROOT){
                    $root_item = $item;
                };
            };

            if($this->uri == $this->current_route['uri'] || !$this->current_route['chain']){
                $this->setStaticControllerRoute($root_item);
            }else{
                if($found){
                    $this->setStaticControllerRoute($current_item);
                }else{
                    $this->error404();
                };
            };
        }

        //Returns specified node data col
        public function getNodeData($id, $col){
            $query = "
			    SELECT
			        `".DB::quote($col)."` AS `col`
			    FROM
			        `structure_data`
			    WHERE
			        `id` = ".intval($id)."
			";

			$result = $this->db->assocItem($query);
			return $result['col'];
        }

        //Returns a full node path
        private function getNodePath($id, $path = false, $part = false){
            $query = "
                SELECT
                    `structure`.`pid`,
                    `structure_data`.`part`
                FROM
                    `structure`,
                    `structure_data`
                WHERE
                    `structure`.`id` = ".intval($id)." &&
                    `structure`.`id` = `structure_data`.`id`
            ";
            $result = $this->db->assocItem($query);

            if($result['pid'] > 1){
                $path .= $this->getNodePath($result['pid'], $path);
            }else{
                $path .= '/';
            };

            if($part){
                $path .= $part.'/';
            }else{
                $path .= $result['part'].'/';
            };

            return Utilities::removePathDoubleSlashes($path);
        }

        //Returns a full node path
        private function getBreadCrumbs($id){
            $query = "
                SELECT
                    `structure`.`pid`               AS `pid`,
                    `structure_data`.`id`           AS `id`,
                    `structure_data`.`name`         AS `name`
                FROM
                    `structure`,
                    `structure_data`
                WHERE
                    `structure`.`id` = `structure_data`.`id` &&
                    `structure`.`id` = ";

            $result = $this->db->assocItem($query.intval($id));

            $breadcrumbs = array();
            $result['path'] = $this->getNodePath($result['id']);
            $result['current'] = true;
            array_push($breadcrumbs, $result);

            $pid = $result['pid'];

            while($pid > 0){
                $result = $this->db->assocItem($query.intval($pid));
                $result['path'] = $this->getNodePath($result['id']);
                
                array_push($breadcrumbs, $result);
                
                $pid = $result['pid'];
            };

            return array_reverse($breadcrumbs);
        }

        //Execute route of the dynamic controller
        private function setDynamicControllerRoute($item){
            if(strlen($item['data']['title']) <= 0){
                $item['data']['title'] = $item['data']['name'];
            };

            switch($item['data']['mode']){
                case '1' : {
                    if($item['data']['private'] == '1' && !$this->login->user_status['status']){
                        $content = $this->smarty->fetch('modules/need_auth.tpl');
                    }else{
                        $content = $this->getPage($item['data']['page_id']);
                    };

                    $this->page = array(
                        'id'            => $item['data']['id'],
                        'path'          => $item['data']['path'],
                        'pid'           => $item['data']['pid'],
                        'title'         => $item['data']['title'],
                        'description'   => $item['data']['description'],
                        'keywords'      => $item['data']['keywords'],
                        'h1'            => $item['data']['name'],
                        'mode'          => $item['data']['mode'],
                        'breadcrumbs'   => $this->getBreadCrumbs($item['data']['id']),
                        'content'       => $content
                    );
                }; break;

                case '2' : {
                    if($_GET['item'] > 0){
                        $data = $this->getNewsItemData($_GET['item']);

                        if($data['id'] > 0){
                            $bc = $this->getBreadCrumbs($item['data']['id']);
                            $bc[count($bc)-1]['current'] = false;

                            array_push(
                                $bc,
                                array(
                                    'id' => $data['id'],
                                    'name' => $data['name'],
                                    'current' => true
                                )
                            );

                            $this->page = array(
                                'id'            => $item['data']['id'],
                                'pid'           => $item['data']['pid'],
                                'path'          => $item['data']['path'],
                                'title'         => $data['name'],
                                'description'   => $item['data']['description'],
                                'keywords'      => $item['data']['keywords'],
                                'h1'            => $data['name'],
                                'mode'          => $item['data']['mode'],
                                'data'          => $data,
                                'breadcrumbs'   => $bc
                            );

                            if($item['data']['private'] == '1' && !$this->login->user_status['status']){
                                $this->page['content'] = $this->smarty->fetch('modules/need_auth.tpl');
                            }else{
                                $this->page['content'] = $this->smarty->fetch('modules/news_item.tpl');
                            };
                        }else{
                            $this->error404();
                        };

                    }else{
                        $data = array();
                        $data['list'] = $this->getNewsList(5);

                        $this->page = array(
                            'id'            => $item['data']['id'],
                            'pid'           => $item['data']['pid'],
                            'path'          => $item['data']['path'],
                            'title'         => $item['data']['title'],
                            'description'   => $item['data']['description'],
                            'keywords'      => $item['data']['keywords'],
                            'h1'            => $item['data']['name'],
                            'mode'          => $item['data']['mode'],
                            'continuous'    => true,
                            'loading_url'   => '/?ajax&action=load_more_items&module=news&per_page_items=2',
                            'data'          => $data,
                            'breadcrumbs'   => $this->getBreadCrumbs($item['data']['id'])
                        );

                        if($item['data']['private'] == '1' && !$this->login->user_status['status']){
                            $this->page['content'] = $this->smarty->fetch('modules/need_auth.tpl');
                        }else{
                            $this->page['content'] = $this->smarty->fetch('modules/news_list.tpl');
                        };
                    };

                }; break;

                case '3' : {
                    if($_GET['item'] > 0){
                        $data = $this->getArticlesItemData($_GET['item']);

                        if($data['id'] > 0){
                            $bc = $this->getBreadCrumbs($item['data']['id']);
                            $bc[count($bc)-1]['current'] = false;

                            array_push(
                                $bc,
                                array(
                                    'id' => $data['id'],
                                    'name' => $data['name'],
                                    'current' => true
                                )
                            );

                            $this->page = array(
                                'id'            => $item['data']['id'],
                                'pid'           => $item['data']['pid'],
                                'path'          => $item['data']['path'],
                                'title'         => $data['name'],
                                'description'   => $item['data']['description'],
                                'keywords'      => $item['data']['keywords'],
                                'h1'            => $data['name'],
                                'mode'          => $item['data']['mode'],
                                'data'          => $data,
                                'breadcrumbs'   => $bc
                            );

                            if($item['data']['private'] == '1' && !$this->login->user_status['status']){
                                $this->page['content'] = $this->smarty->fetch('modules/need_auth.tpl');
                            }else{
                                $this->page['content'] = $this->smarty->fetch('modules/news_item.tpl');
                            };
                        }else{
                            $this->error404();
                        };

                    }else{
                        $data = array();
                        $data['list'] = $this->getArticlesList();

                        $this->page = array(
                            'id'            => $item['data']['id'],
                            'pid'           => $item['data']['pid'],
                            'path'          => $item['data']['path'],
                            'title'         => $item['data']['title'],
                            'description'   => $item['data']['description'],
                            'keywords'      => $item['data']['keywords'],
                            'h1'            => $item['data']['name'],
                            'mode'          => $item['data']['mode'],
                            'data'          => $data,
                            'breadcrumbs'   => $this->getBreadCrumbs($item['data']['id'])
                        );

                        if($item['data']['private'] == '1' && !$this->login->user_status['status']){
                            $this->page['content'] = $this->smarty->fetch('modules/need_auth.tpl');
                        }else{
                            $this->page['content'] = $this->smarty->fetch('modules/news_list.tpl');
                        };
                    };

                }; break;

                case '4' : {
                    if($_GET['item'] > 0){
                        $data = $this->getAlbum($_GET['item']);

                        if($data['id'] > 0){
                            $bc = $this->getBreadCrumbs($item['data']['id']);
                            $bc[count($bc)-1]['current'] = false;

                            array_push(
                                $bc,
                                array(
                                    'id' => $data['id'],
                                    'name' => $data['name'],
                                    'current' => true
                                )
                            );

                            $this->page = array(
                                'id'            => $item['data']['id'],
                                'pid'           => $item['data']['pid'],
                                'path'          => $item['data']['path'],
                                'title'         => $data['name'],
                                'description'   => $item['data']['description'],
                                'keywords'      => $item['data']['keywords'],
                                'h1'            => $data['name'],
                                'mode'          => $item['data']['mode'],
                                'data'          => $data,
                                'breadcrumbs'   => $bc
                            );

                            if($item['data']['private'] == '1' && !$this->login->user_status['status']){
                                $this->page['content'] = $this->smarty->fetch('modules/need_auth.tpl');
                            }else{
                                $this->page['content'] = $this->smarty->fetch('modules/photos.tpl');
                            };
                        }else{
                            $this->error404();
                        };

                    }else{
                        $data = array();
                        $data['list'] = $this->getAlbums();

                        $this->page = array(
                            'id'            => $item['data']['id'],
                            'pid'           => $item['data']['pid'],
                            'path'          => $item['data']['path'],
                            'title'         => $item['data']['name'],
                            'description'   => $item['data']['description'],
                            'keywords'      => $item['data']['keywords'],
                            'h1'            => $item['data']['name'],
                            'mode'          => $item['data']['mode'],
                            'data'          => $data,
                            'breadcrumbs'   => $this->getBreadCrumbs($item['data']['id'])
                        );

                        if($item['data']['private'] == '1' && !$this->login->user_status['status']){
                            $this->page['content'] = $this->smarty->fetch('modules/need_auth.tpl');
                        }else{
                            $this->page['content'] = $this->smarty->fetch('modules/albums.tpl');
                        };
                    };

                }; break;


                case '5' : {
                    if($_GET['action'] == 'go' && strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
                        $form = $this->login();
                    };

                    $this->page = array(
                        'id'            => $item['data']['id'],
                        'path'          => $item['data']['path'],
                        'pid'           => $item['data']['pid'],
                        'title'         => $item['data']['title'],
                        'description'   => $item['data']['description'],
                        'keywords'      => $item['data']['keywords'],
                        'h1'            => $item['data']['name'],
                        'mode'          => $item['data']['mode'],
                        'form'          => $form,
                        'breadcrumbs'   => $this->getBreadCrumbs($item['data']['id'])
                    );

                    if($this->login->user_status['status']){
                        $this->page['content'] = $this->smarty->fetch('modules/no_need_auth.tpl');
                    }else{
                        $this->page['content'] = $this->smarty->fetch('modules/auth.tpl');
                    };

                }; break;

                case '6' : {
                    if($_GET['action'] == 'go' && strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
                        $form = $this->register();
                    };

                    $this->page = array(
                        'id'            => $item['data']['id'],
                        'path'          => $item['data']['path'],
                        'pid'           => $item['data']['pid'],
                        'title'         => $item['data']['title'],
                        'description'   => $item['data']['description'],
                        'keywords'      => $item['data']['keywords'],
                        'h1'            => $item['data']['name'],
                        'mode'          => $item['data']['mode'],
                        'form'          => $form,
                        'breadcrumbs'   => $this->getBreadCrumbs($item['data']['id'])
                    );

                    if($this->login->user_status['status']){
                        $this->page['content'] = $this->smarty->fetch('modules/no_need_auth.tpl');
                    }else{
                        $this->page['content'] = $this->smarty->fetch('modules/register.tpl');
                    };

                }; break;

                case '7' : {
                    if($_GET['action'] == 'go' && strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
                        $form = $this->remember($_POST['email']);
                    };

                    $this->page = array(
                        'id'            => $item['data']['id'],
                        'path'          => $item['data']['path'],
                        'pid'           => $item['data']['pid'],
                        'title'         => $item['data']['title'],
                        'description'   => $item['data']['description'],
                        'keywords'      => $item['data']['keywords'],
                        'h1'            => $item['data']['name'],
                        'mode'          => $item['data']['mode'],
                        'form'          => $form,
                        'breadcrumbs'   => $this->getBreadCrumbs($item['data']['id'])
                    );

                    if($this->login->user_status['status']){
                        $this->page['content'] = $this->smarty->fetch('modules/no_need_auth.tpl');
                    }else{
                        if($_GET['action'] == 'password_recover'){
                            $this->page['form'] = $this->login->rememberCode($_GET['user_id'], $_GET['code']);
                            $this->page['content'] = $this->smarty->fetch('modules/remember_pass_code.tpl');
                        }else{
                            $this->page['content'] = $this->smarty->fetch('modules/remember_pass.tpl');
                        };
                    };

                }; break;

                case '8' : {
                    if($_GET['action'] == 'go' && strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
                        $form = $this->changeUserData();
                    };

                    $this->page = array(
                        'id'            => $item['data']['id'],
                        'path'          => $item['data']['path'],
                        'pid'           => $item['data']['pid'],
                        'title'         => $item['data']['title'],
                        'description'   => $item['data']['description'],
                        'keywords'      => $item['data']['keywords'],
                        'h1'            => $item['data']['name'],
                        'mode'          => $item['data']['mode'],
                        'form'          => $form,
                        'breadcrumbs'   => $this->getBreadCrumbs($item['data']['id'])
                    );

                    if($this->login->user_status['status']){
                        $this->page['content'] = $this->smarty->fetch('modules/personal.tpl');
                    }else{
                        $this->page['content'] = $this->smarty->fetch('modules/need_auth.tpl');
                    };

                }; break;

                case '9' : {
                    if($_GET['action'] == 'go' && strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
                        $form = $this->changePassword();
                    };

                    $this->page = array(
                        'id'            => $item['data']['id'],
                        'path'          => $item['data']['path'],
                        'pid'           => $item['data']['pid'],
                        'title'         => $item['data']['title'],
                        'description'   => $item['data']['description'],
                        'keywords'      => $item['data']['keywords'],
                        'h1'            => $item['data']['name'],
                        'mode'          => $item['data']['mode'],
                        'form'          => $form,
                        'breadcrumbs'   => $this->getBreadCrumbs($item['data']['id'])
                    );

                    if($this->login->user_status['status']){
                        $this->page['content'] = $this->smarty->fetch('modules/change_password.tpl');
                    }else{
                        $this->page['content'] = $this->smarty->fetch('modules/need_auth.tpl');
                    };

                }; break;

                case '10' : {
                    if($_GET['action'] == 'go' && strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
                        $form = $this->postToGb($_POST['email']);
                    };

                    $data = array();
                    $data['list'] = $this->getGbItems();

                    $this->page = array(
                        'id'            => $item['data']['id'],
                        'pid'           => $item['data']['pid'],
                        'path'          => $item['data']['path'],
                        'title'         => $item['data']['title'],
                        'description'   => $item['data']['description'],
                        'keywords'      => $item['data']['keywords'],
                        'h1'            => $item['data']['name'],
                        'mode'          => $item['data']['mode'],
                        'form'          => $form,
                        'data'          => $data,
                        'breadcrumbs'   => $this->getBreadCrumbs($item['data']['id'])
                    );

                    if($item['data']['private'] == '1' && !$this->login->user_status['status']){
                        $this->page['content'] = $this->smarty->fetch('modules/need_auth.tpl');
                    }else{
                        $this->page['content'] = $this->smarty->fetch('modules/guest_book.tpl');
                    };
                }; break;

                case '11' : {
                    if($_GET['item'] > 0){
                        $data = $this->getVideosItemData($_GET['item']);

                        if($data['id'] > 0){
                            $bc = $this->getBreadCrumbs($item['data']['id']);
                            $bc[count($bc)-1]['current'] = false;

                            array_push(
                                $bc,
                                array(
                                    'id' => $data['id'],
                                    'name' => $data['name'],
                                    'current' => true
                                )
                            );

                            $this->page = array(
                                'id'            => $item['data']['id'],
                                'pid'           => $item['data']['pid'],
                                'path'          => $item['data']['path'],
                                'title'         => $data['name'],
                                'description'   => $item['data']['description'],
                                'keywords'      => $item['data']['keywords'],
                                'h1'            => $data['name'],
                                'mode'          => $item['data']['mode'],
                                'data'          => $data,
                                'breadcrumbs'   => $bc
                            );

                            if($item['data']['private'] == '1' && !$this->login->user_status['status']){
                                $this->page['content'] = $this->smarty->fetch('modules/need_auth.tpl');
                            }else{
                                $this->page['content'] = $this->smarty->fetch('modules/videos_item.tpl');
                            };
                        }else{
                            $this->error404();
                        };

                    }else{
                        $data = array();
                        $data['list'] = $this->getVideosList();

                        $this->page = array(
                            'id'            => $item['data']['id'],
                            'pid'           => $item['data']['pid'],
                            'path'          => $item['data']['path'],
                            'title'         => $item['data']['title'],
                            'description'   => $item['data']['description'],
                            'keywords'      => $item['data']['keywords'],
                            'h1'            => $item['data']['name'],
                            'mode'          => $item['data']['mode'],
                            'data'          => $data,
                            'breadcrumbs'   => $this->getBreadCrumbs($item['data']['id'])
                        );

                        if($item['data']['private'] == '1' && !$this->login->user_status['status']){
                            $this->page['content'] = $this->smarty->fetch('modules/need_auth.tpl');
                        }else{
                            $this->page['content'] = $this->smarty->fetch('modules/videos_list.tpl');
                        };
                    };

                }; break;
            };

        }

        //Get template filename by id
        private function getTemplateFileName($id){
            return $this->getItemParamFromTable('templates', $id, 'file');
        }

        //Process route
        public function processRoute(){
            $static_key = $this->getProcessRoute();
            $dynamic_key = $this->checkDynamicRoute();

            if($static_key['status']){
                $file = $_SERVER['DOCUMENT_ROOT'].'/controllers/'.$this->static_routes[$static_key['key']]['name'].'.php';

                if(is_file($file)){
                    if(isset($static_key['match'])){
                        $route_request_uri = parse_url(preg_replace('/\/+/', "/", $static_key['match'][1], PHP_URL_PATH));
                        $route_request_uri = $route_request_uri['path'];
                        $route_request_uri = explode('/', trim($route_request_uri, '/'));
                    }else{
                        $route_request_uri = false;
                    };

                    $this->current_route = array(
                        'type'              => 'static',
                        'name'              => $this->static_routes[$static_key['key']]['name'],
                        'uri'               => $this->static_routes[$static_key['key']]['uri'],
                        'chain'             => $this->static_routes[$static_key['key']]['chain'],
                        'file'              => $file,
                        'route_request_uri' => $route_request_uri
                    );
                }else{
                    trigger_error('File of controller ('.$file.') for static route ('.$this->uri.') is missed', E_USER_ERROR);
                };

            }elseif($dynamic_key['status']){
                $template = $this->getTemplateFileName($dynamic_key['data']['template']);

                if($template != ''){
                    if(file_exists($_SERVER['DOCUMENT_ROOT'].'/templates/'.$template)){
                        $this->setTemplate($template);

                        $this->current_route = array(
                            'type'              => 'dynamic',
                            'name'              => $dynamic_key['data']['name'],
                            'uri'               => $dynamic_key['data']['path'],
                            'mode'              => $dynamic_key['data']['mode'],
                            'page_id'           => $dynamic_key['data']['page_id']
                        );

                        $this->setDynamicControllerRoute($dynamic_key);
                    }else{
                        die('Ошибка. Шаблона '.$_SERVER['DOCUMENT_ROOT'].'/templates/'.$template.' не существует, создайте файл.');
                    };

                }else{
                    die('Ошибка. Для страницы не выбран шаблон.');
                };
                
            }else{
                $this->error404();
            };
        }
    
        //Add new static route
        public function setStaticRoute($uri, $name, $chain = false){
            if(!$this->findValueInArray($name, $this->static_routes, 'name') && !$this->findValueInArray($uri, $this->static_routes, 'uri')){
                array_push($this->static_routes, array('uri' => $uri, 'name' => $name, 'chain' => $chain));
            }else{
                trigger_error('Trying to allocate existed static route (name => '.$name.', uri => '.$uri.')', E_USER_ERROR);
            };
        }

        //Add new static routes
        public function setStaticRoutes($routes_array, $common_name = false, $common_chain = false){
            foreach($routes_array as $item){
                if($common_name){
                    $name = $common_name;
                }else{
                    $name = $item['name'];
                };

                if($common_chain){
                    $chain = $common_chain;
                }else{
                    $chain = $item['name'];
                };
                
                array_push(
                    $this->static_routes,
                    array(
                         'uri' => '/'.$item['path'].'/',
                         'name' => $name,
                         'chain' => $chain
                    )
                );
            };
        }

        //Render 404 error
        public function error404(){
			$sapi_name = php_sapi_name();
            
			if($sapi_name == 'cgi' || $sapi_name == 'cgi-fcgi'){
				header('Status: 404 Not Found');
			}else{
				header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
			};

            $this->template = '404.tpl';
			$this->error404 = true;
		}

        //Set global template
        public function setTemplate($template = 'main.tpl'){
            if(!isset($this->error404) && !$this->error404){
                if($this->answer_type == 'ajax'){
                    $this->template = 'ajax.tpl';
                }else{
                    $this->template = $template;
                };
            };
        }

        //Render template
        public function renderPage(){
            $this->smarty->display($this->template);
        }

        //Get table count
        public function getTableItemsCount($table, $where = false){
            $w = "";
            if($where != ""){
                $w = "WHERE ".$where;
            };

            $query = "SELECT count(*) AS `count` FROM `".$this->db->quote($table)."` ".$w;
            $result = $this->db->assocItem($query);
            
            return $result['count'];
        }

        //Get content item image
        public function getItemSingleImage($table, $relative_id, $form_item){
            $query = "
                SELECT
                    `id`,
                    `name`,
                    `extension`,
                    `path`,
                    `date`,
                    `size`,
                    `width`,
                    `height`,
                    `metaname`,
                    `metadesc`
                FROM
                    `images`
                WHERE
                    `relative_table` = '".DB::quote($table)."' &&
                    `relative_id` = ".intval($relative_id)." &&
                    `form_item` = '".DB::quote($form_item)."' &&
                    `type` = 0
                LIMIT 1
            ";

            return $this->db->assocItem($query);
        }

        //Get content item images set
        public function getItemImageGallery($table, $relative_id, $form_item){
            $query = "
                SELECT
                    `id`,
                    `name`,
                    `extension`,
                    `path`,
                    `date`,
                    `size`,
                    `width`,
                    `height`,
                    `metaname`,
                    `metadesc`
                FROM
                    `images`
                WHERE
                    `relative_table` = '".DB::quote($table)."' &&
                    `relative_id` = ".intval($relative_id)." &&
                    `form_item` = '".$this->db->quote($form_item)."' &&
                    `type` = 1
                ORDER BY
                    `id`
                ASC
            ";

            return $this->db->assocMulti($query);
        }

        //Get content item
        public function getContentItem($section_id, $item_id, $col_name){
            $query = "
                SELECT
                    `".DB::quote($col_name)."` AS `content`
                FROM
                    `section_".intval($section_id)."`
                WHERE
                    `id` = ".intval($item_id)." &&
                    `publish` = 1
            ";

            $result = $this->db->assocItem($query);
            return $result['content'];
        }

        //Get content item
        public function getItemParamFromTable($table, $item_id, $col_name){
            $query = "
                SELECT
                    `".DB::quote($col_name)."` AS `param`
                FROM
                    `".DB::quote($table)."`
                WHERE
                    `id` = ".intval($item_id)."
            ";

            $result = $this->db->assocItem($query);
            return $result['param'];
        }

        //Get section content
        public function getSectionContent($section_id, $fields, $where, $order, $limit, $current_page = false){
            $section_id = $this->db->quote($section_id);
            $f = "";
            if(is_array($fields) && !empty($fields)){
                foreach($fields as $item){
                    if(is_array($item)){
                        $f .= "`".$this->db->quote($item[0])."` AS `".$this->db->quote($item[1])."`, ";
                    }else{
                        $f .= "`".$this->db->quote($item)."`, ";
                    };
                };
                $f = substr($f, 0, strlen($f)-2);
            }else{
                $f .= "*";
            };

            $w = "";
            if($where != ""){
                $w = "WHERE ".$where;
            };

            //TODO : Make a multiple orders here
            $o = "";
            if(!empty($order)){
                $o = "ORDER BY `".$order[0]."` ".$order[1];
            };

            $l = "";
            
            if($limit){
                if($current_page < 1){
                    $current_page = 1;
                };

                $result['pager']['per_page'] = $limit;
                $result['pager']['total_items'] = $this->getTableItemsCount('section_'.$section_id, $where);
                $result['pager']['total_pages'] = ceil($result['pager']['total_items']/$result['pager']['per_page']);

                if($current_page > $result['pager']['total_pages']){
                    $current_page = $result['pager']['total_pages'];
                };

                $start_item = ($current_page-1) * $limit;

                if($current_page > 1){
                    $result['pager']['prev_page'] = $current_page - 1;
                }else{
                    $result['pager']['prev_page'] = false;
                };

                if($current_page < $result['pager']['total_pages']){
                    $result['pager']['next_page'] = $current_page + 1;
                }else{
                    $result['pager']['next_page'] = false;
                };

                $result['pager']['pages'] = $this->getPagesArray($result['pager']['total_pages'], $current_page);

                if(isset($start_item) && $start_item >= 0){
                    $l = "LIMIT ".$this->db->quote($start_item).", ".$this->db->quote($limit);
                }else{
                    $l = "LIMIT ".$this->db->quote($limit);
                };
            };

            $query = "SELECT ".$f." FROM `section_".$this->db->quote($section_id)."` ".$w." ".$o." ".$l;
            $result['items'] = $this->db->assocMulti($query);
            return $result;
        }
    
        //Search string array
        public function getArrayFromSearchString($searchString){
            $searchString = trim($searchString);

            $searchString = preg_replace("/(\s{2,})/"," ", $searchString);
            $searchStringArray = explode(" ", $searchString);

            for($i = 0; $i < count($searchStringArray); $i++){
                if($i > 10){
                    unset($searchStringArray[$i]);
                };
            };

            return $searchStringArray;
        }

        //Get current template zone contents
        public function drawZone($zone_id){
            $zone_template = 'zones/list.tpl';
            $zone_html = $this->smarty->fetch($zone_template);

            return $zone_html;
        }
    }
?>