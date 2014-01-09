<?php
	class Main extends Utilities {
		public
        $title,
        $module_name,
        $template = 'main.tpl',
        $addition_js = array(),
        $addition_css = array(),
        $list_items = array(),
        $content_list = array(),
        $ajax_content,
        $content_list_delete_link,
        $content_list_edit_link,
        $content_list_new_item_link,
        $new_item_link,
        $submenu,
        $config,
        $domain,
        $self_url,
        $locale,
        $addition_menu,
        $pager,
        $form_error,
        $vars,
        $constants;

        private
        $locale_array;

        // TODO : Right linked vars here!
		function __construct(&$config, &$db){
            $this->constants = $this->getSettingsParams();

			$this->config = $config;
			$this->domain = Utilities::punycode_to_unicode($_SERVER['HTTP_HOST']);
			$this->locale = $config['locale'];
            $this->db = $db;
			$this->prepareLocale();
			setlocale(LC_ALL, $this->locale);
		}

        public function applyGallerySort(){
            $sort_params = json_decode(stripslashes($_POST['sort_params']), true);

            foreach($sort_params as $item){
                 $query = "
                    UPDATE
                        `images`
                    SET
                        `sort` = ".intval($item['sort'])."
                    WHERE
                        `id` = ".intval($item['id']);

                $this->db->query($query);
            };
        }

        public function getSettingsParams(){
            $result = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/constants.ini', true);
            return $result;
        }

        //Returns multiple select params (1,2,5,7...)
        public function parseMultipleSelectParams($params){
            if($params){
                $temp = '';

                foreach($params as $item){
                    $temp .= DB::quote($item).',';
                };

                $temp = substr($temp, 0, strlen($temp)-1);

                $clause = in_array(0, explode(',', $temp));

                if($clause && strlen($temp) > 1){
                    $temp = substr($temp, 2, strlen($temp));
                };

                return $temp;
            }else{
                return '';
            };
        }

        //return ini file array
		private function getLocaleContents(){
			$ini = $_SERVER['DOCUMENT_ROOT'].'/admin/locale/'.$this->locale.'.ini';
			return parse_ini_file($ini, true);
		}

		//Preparing locale content
		protected function prepareLocale(){
			$this->locale_array = $this->getLocaleContents();
		}

		//Return locale sting
		public function getText($module_name, $item){
			return $this->locale_array[$module_name][$item];
		}

        //Returns search string array
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

        //Returns search results to autocomplete
        public function searchTag($q){
            $search_query = "SELECT `name` FROM `tags` WHERE ";

            $searchStringArray = $this->getArrayFromSearchString($q);

            $where = '';

            foreach($searchStringArray as $key => $val){
                if(strlen($val) > 0){
                    $where .= "`name` LIKE '%".$val."%' OR ";
                };
            };

            $where = substr($where, 0, -3);

            if($where == ''){
                return null;
            }else{
                $search_query .= $where;
            };

            $sql = mysql_query($search_query);

            $result = "";

            $i = 0;
            while($req = mysql_fetch_assoc($sql)){
                $result .= $req['name']."\n";
                $i++;
            };

            return $result;
        }

        //Get pages array
        private function getPagesArray(){
            $result = array();

            $width = 5;

            if($this->pager['total_pages'] > $width){
                $offset = ($width-1)/2;

                $p_from = $this->pager['current_page']-$offset;
                $p_to = $this->pager['current_page']+$offset;

                if($p_to > $this->pager['total_pages']){
                    $p_to = $this->pager['total_pages'];
                };

                if($p_from < 1){
                    $p_from = 1;
                };

                if($p_from <= $offset-1){
                    $p_to = $width-$p_from+1;
                };

                if($p_to >= $this->pager['total_pages']){
                    $p_from = $this->pager['total_pages']-$width+1;
                };

                $i = $p_from-1;

                if($p_from > 1){
                    $result[] = array('page' => 1, 'name' => 1);
                    $result[] = array('name' => '...');
                };

                while($i < $p_to){
                    $i++;

                    if($this->pager['current_page'] == $i){
                        $result[] = array('page' => $i, 'name' => $i, 'current' => true);
                    }else{
                        $result[] = array('page' => $i, 'name' => $i);
                    };
                };

                if($p_to < $this->pager['total_pages']){
                    $result[] = array('name' => '...');
                    $result[] = array('page' => $this->pager['total_pages'], 'name' => $this->pager['total_pages']);
                };
            }else{
                $i = 0;

                while($i < $this->pager['total_pages']){
                    $i++;

                    if($this->pager['current_page'] == $i){
                        $result[] = array('page' => $i, 'name' => $i, 'current' => true);
                    }else{
                        $result[] = array('page' => $i, 'name' => $i);
                    };
                };
            };

            return $result;
        }

        //Get limits
        public function getLimitsForList($total_items, $limit){
            $total_pages = ceil($total_items/$limit);

            $this->pager['current_page'] = 1;

            if(isset($_GET['page'])){
                if($_GET['page'] && $_GET['page'] > 1 && $_GET['page'] <= $total_pages){
                    $start = (intval($_GET['page'])*$limit)-$limit;
                    $this->pager['current_page'] = intval($_GET['page']);

                }elseif($_GET['page'] > $total_pages){
                    $start = ($total_pages*$limit)-$limit;
                    $this->pager['current_page'] = $total_pages;
                };
            }else{
                $start = 0;
                $this->pager['current_page'] = 1;
            };

            if($this->pager['current_page'] > 1){
                $this->pager['prev_page'] = $this->pager['current_page'] - 1;
            }else{
                $this->pager['prev_page'] = false;
            };

            if($this->pager['current_page'] < $total_pages){
                $this->pager['next_page'] = $this->pager['current_page'] + 1;
            }else{
                $this->pager['next_page'] = false;
            };

            $this->pager['limit'] = $limit;
            $this->pager['start'] = $start;
            $this->pager['total_items'] = $total_items;
            $this->pager['total_pages'] = $total_pages;
            $this->pager['pages_array'] = $this->getPagesArray();

            if($start < 0){
                $start = 0;
            };

            return array(intval($start), intval($limit));
        }

        //Returns a combined section and mode name
        public function getCombinedModuleName(){
            return $this->module_name.'_'.$this->module_mode;
        }

		//Returns a name of option from related table by id
        public function getLisOptionNameById($id, $related_table){
			$sql = mysql_query("SELECT `id` FROM `".$related_table."`");
			if($sql){
				$query = "
					SELECT `name` FROM `".$related_table."`
					WHERE `id` = '".$id."'
				";
				$sql = mysql_query($query);
				$result = mysql_fetch_assoc($sql);

				return $result['name'];
			}else{
				return $this->getText('common', 'error_table_not_esists');
			};
        }

        //Returns a name of option from array given as a string
        public function getLisOptionNameByArrayGiven($id, $string){
        	$first_step = explode(';', $string);

            foreach($first_step as $item){
                $arr = explode('=', $item);

                if(!empty($arr[0]) && !empty($arr[1])){
                    $result[] = array(
                        'key' => $arr[0],
                        'value' => $arr[1]
                    );
                };
            };

            return $result[$id-1]['value'];
        }

        //Returns a name of option from array given as a string
        public function getLisOptionsNamesByArrayGiven($id, $string){
        	$first_step = explode(';', $string);
            $result = '';

            $arr1 = explode(',', $id);

            foreach($first_step as $item){
                $arr = explode('=', $item);

                if(!empty($arr[0]) && !empty($arr[1])){
                    foreach($arr1 as $needles){
                        if($needles == $arr[0]){
                            $result .= $arr[1].', ';
                        };
                    };
                };
            };

            return substr($result, 0 ,strlen($result)-2);
        }

        //Returns true if value is in array
        public function compareMultiSelectValues($values, $value){
            return in_array($value, explode(',', $values));
        }

		//Get item MySql fieldset fieldsets
		public function getMySqlFieldset($arr, $table = false){
            $str = '';

			if($table){
				foreach($arr as $item){
					$str .= "`".$table."`.`".$item.'`, ';
				};
			}else{
				foreach($arr as $item){
					$str .= "`".$item.'`, ';
				};
			};

			return substr($str, 0, strlen($str)-2);
		}

		//Return typographed text
		private function typography($text){
			return $text;
		}

        //Try to save new tags
        private function saveNewTags($tags){
            $a = explode(',', $tags);
            $queries = array();

            foreach($a as $item){
                mysql_query("INSERT INTO `tags` (`name`) VALUES ('".DB::quote($item)."')");
            };
        }

		//Saves data to the DB
		public function saveItem($id, $table, $dataset, $postdata, $return_data = false, $set_user_stamp = false){
			$data = array();

			foreach($dataset['data'] as $item_1){
				if(!$postdata[$item_1['name']] && ($item_1['required'] == '1' || $item_1['required'] === true)){
					$value = $item_1['default'];
				}else{
					$value = $postdata[$item_1['name']];
				};

                if(!$item_1['no_edit']){
                    switch($item_1['type']){
                        case 'html' : {

                            file_put_contents($_SERVER['DOCUMENT_ROOT'] . $item_1['file'], stripcslashes($_POST[$item_1['name']]));
                        }; break;

                        case 'checkbox' : {
                            $result = Utilities::getCbValue($value);
                            array_push($data, array($item_1['name'] => $result));
                        }; break;

                        case 'textarea' : {
                            $result = DB::quoteWithHTML($value);
                            array_push($data, array($item_1['name'] => $result));
                        }; break;

                        case 'tags' : {
                            $result = DB::quote($value);
                            array_push($data, array($item_1['name'] => $result));
                            $this->saveNewTags($result);
                        }; break;

                        case 'text' : {
                            if($item_1['urlconversion']){
                                $result = DB::quote(Utilities::convertUrl($value));
                            }else{
                                $result = DB::quote($value);
                            };

                            if($item_1['email'] && Utilities::matchPattern($value, 'email')){
                                $result = $value;
                            };

                            if($item_1['number'] && Utilities::matchPattern($value, 'number')){
                                $result = $value;
                            };

                            array_push($data, array($item_1['name'] => $result));
                        }; break;

                        case 'url' : {
                            if($item_1['mode'] == 1){
                                $result = DB::quote($value);
                            }else{
                                $result = DB::quote(Utilities::convertUrl($value));
                            };

                            array_push($data, array($item_1['name'] => $result));
                        }; break;

                        case 'param' : {
                            if($item_1['urlconversion']){
                                $result = DB::quote(Utilities::convertUrl($value));
                            }else{
                                $result = DB::quote($value);
                            };

                            if($item_1['number'] && Utilities::matchPattern($result, 'number')){
                                $result = $value;
                            };

                            array_push($data, array($item_1['name'] => $result));
                        }; break;

                        case 'catalog' : {
                            $result = json_decode(urldecode($value));

                            $r1 = '';

                            foreach($result as $item){
                                $r1 .= '{"key":"'. htmlspecialchars(htmlspecialchars_decode($item->key)) . '","val":"' . htmlspecialchars(htmlspecialchars_decode($item->val)) . '"},';
                            };

                            $r1 = DB::quote('['.substr($r1, 0, strlen($r1) - 1).']');

                            array_push($data, array($item_1['name'] => $r1));
                        }; break;

                        case 'multiselect' : {
                            $result = $this->parseMultipleSelectParams($value);
                            array_push($data, array($item_1['name'] => $result));
                        }; break;

                        case 'slider';
                        case 'calendar';
                        case 'select';
                        case 'color_picker';
                        case 'map';
                        case 'hidden';
                        case 'template_file';

                            $result = DB::quote($value);
                            array_push($data, array($item_1['name'] => $result));

                        break;

                        default : {
                            //$result = $value;
                        }; break;
                    }
                };
			};

            if($return_data){
                return $data;

            }else{

                $params = '';

                for($i=0; $i<count($data); $i++){
                    foreach($data[$i] as $key => $value){
                        $params .= "`".$key."` = '".$value."', ";
                    };
                };

                if($set_user_stamp){
                    $params .= "`changer_id` = ".intval($dataset['params']['user_id']).", ";
                    $params .= "`change_date` = NOW()";
                }else{
                    $params = substr($params, 0, (strlen($params)-2));
                };

                $query = "
                    UPDATE
                        `".$table."`
                    SET
                        ".$params."
                    WHERE
                        `id` = ".intval($id);

                $this->db->query($query);
            };
		}

        //Get sorting parameters link for list
        public function getListSortingLink($col){
            if($col == $_GET['sort_col']){
                if($_GET['sort_direction'] == 'ASC'){
                    $dir = 'DESC';
                }else{
                    $dir = 'ASC';
                };
            }else{
                if(!isset($_GET['sort_col']) && $col == 'id'){
                    $dir = 'DESC';
                }else{
                    $dir = 'ASC';
                };
            };

            $link = Utilities::getParamstring('sort_col,sort_direction') . '&sort_col=' . $col . '&sort_direction=' . $dir;

            return $link;
        }

        public function getListSortingArrow($col){
            if($col == $_GET['sort_col']){
                if($_GET['sort_direction'] == 'ASC'){
                    return '<span class="sort_uarr">&uarr;</span>';
                }else{
                    return '<span class="sort_darr">&darr;</span>';
                };
            }else{
                if(!isset($_GET['sort_col']) && $col == 'id'){
                    return '<span class="sort_uarr">&uarr;</span>';
                };
            };
        }

        public function createDatasetParams($table, $id, $validete = true){
            $this->dataset['params'] = array(
                'enctype'       => 'application/x-www-form-urlencoded',
                'method'        => 'POST',
                'validate'      => $validete,
                'table'         => $table,
                'item_params'   => array('id' => $id),
                'form_action'   => Utilities::getParamstring()
            );

            $this->dataset['data'] = array();
        }

        public function createDatasetField($data){
            array_push($this->dataset['data'], $data);
        }

        //Create sorting wheres
        public function getSortingParams(){
            if(isset($_GET['sort_col']) && $_GET['sort_col'] != ''){
                if(isset($_GET['sort_direction']) && $_GET['sort_direction'] != ''){
                    if($_GET['sort_direction'] == 'DESC'){
                        $dir = 'DESC';
                    }else{
                        $dir = 'ASC';
                    };
                }else{
                    $dir = "ASC";
                };

                $result = " ORDER BY `".DB::quote($_GET['sort_col'])."`".$dir;
            }else{
                $result = " ORDER BY `id` ASC";
            };

            return $result;
        }

        //Parse options from table to array
        public function parseOptionsFromTable($table){
            $query = "
                SELECT `id`, `name` FROM `".DB::quote($table)."`
                WHERE `publish` = 1
                ORDER BY `id` ASC
            ";
            $sql = mysql_query($query);

            while($req = mysql_fetch_assoc($sql)){
                $rows[] = array(
                    'key' => $req['id'],
                    'value' => $req['name']
                );
            };

            return $rows;
        }

        //Parse custom options from string to array
        public function parseCustomOptions($string){
            $first_step = explode(';', $string);
            $result = array();

            foreach($first_step as $item){
                $arr = explode('=', $item);

                if(!empty($arr[0]) && !empty($arr[1])){
                    $result[] = array(
                        'key' => $arr[0],
                        'value' => $arr[1]
                    );
                };
            };

            if(!empty($result)){
                return $result;
            };
        }

        //Row existance checking
        public function checkExistRow($table, $col, $value, $id){
            if($this->db->checkRowExistance($table, $col, $value, array($id))){
                print 'false';
            }else{
                print 'true';
            };
        }

        public function switchItemParam(){
            $query = "
                UPDATE
                    `".DB::quote($_GET['table'])."`
                SET
                    `".DB::quote($_GET['col'])."` = ".intval($_GET['value'])."
                WHERE
                    `id` = ".intval($_GET['id'])."
            ";

            $this->db->query($query);
        }

        //$this->main->dataset['params']['item_params']['id']
        //$this->main->item_data['id']

        //Returns a list of images
        public function getImagesList($type, $item_name, $relative_table, $relative_id){
            $query = "
            	SELECT
            	    `id`,
            	    `name`,
            	    `extension`,
            	    `path`,
            	    `size`,
            	    `date`,
            	    `width`,
            	    `height`
            	FROM
            		`images`
            	WHERE
            	    `type` = ".intval($type)." &&
            	    `relative_id` = ".intval($relative_id)." &&
            	    `relative_table` = '".DB::quote($relative_table)."' &&
            	    `form_item` = '".DB::quote($item_name)."'
            	ORDER BY
            	    `sort`
            	ASC
            ";

            return $this->db->assocMulti($query);
        }

        //Returns a list of files
        function getFilesList($type, $item_name, $relative_table, $relative_id){
            $query = "
            	SELECT
            	    `id`,
            	    `name`,
            	    `extension`,
            	    `path`,
            	    `size`,
            	    `date`
            	FROM
            		`files`
            	WHERE
            	    `type` = ".intval($type)." &&
            	    `relative_id` = ".intval($relative_id)." &&
            	    `relative_table` = '".DB::quote($relative_table)."' &&
            	    `form_item` = '".DB::quote($item_name)."'
            	ORDER BY
            	    `id`
            	ASC
            ";

            return $this->db->assocMulti($query);
        }

        //Get image
        public function getRowImage($relative_id, $relative_table, $form_item){
            $query = "
                SELECT
                    `name`,
                    `extension`,
                    `path`
                FROM
                    `images`
                WHERE
                    `relative_id` = ".intval($relative_id)." &&
                    `relative_table` = '".DB::quote($relative_table)."' &&
                    `form_item` = '".DB::quote($form_item)."' &&
                    `type` = 0
            ";

            if($sql = $this->db->query($query)){
                return mysql_fetch_assoc($sql);
            };
        }

        //Deletes a content item file
        public function deleteFile(){
            $sql = $this->db->query("
                SELECT
                    `id`,
                    `name`,
                    `extension`,
                    `path`,
                    `relative_id`,
                    `relative_table`,
                    `form_item`
                FROM
                    `files`
                WHERE
                    `id` = ".intval($_GET['file_id'])."
            ");

            $f = mysql_fetch_assoc($sql);
            $file = $_SERVER['DOCUMENT_ROOT'].$f['path'].$f['name'].(($f['extension'])?'.'.$f['extension']:false);

            if(file_exists($file)){
                unlink($file);
            };

            $this->db->query("DELETE FROM `files` WHERE `id` = '".$f['id']."'");

            $this->db->query("
                UPDATE
                    `".DB::quote($f['relative_table'])."`
                SET
                    `".DB::quote($f['form_item'])."` = `".DB::quote($f['form_item'])."` - 1
                WHERE
                    `id` = ".intval($f['relative_id'])."
            ");
        }

        //Deletes a content item image
        //TODO : Here is a params
        public function deleteImage(){
            $sql = $this->db->query("
                SELECT
                    `id`,
                    `name`,
                    `extension`,
                    `path`,
                    `relative_id`,
                    `relative_table`,
                    `form_item`
                FROM
                    `images`
                WHERE
                    `id` = ".intval($_GET['file_id'])."
            ");

            $f = mysql_fetch_assoc($sql);
			$r1 = explode(';', $_GET['thumbs']);

			foreach($r1 as $item){
				$r2 = explode(',', $item);

				$file = $_SERVER['DOCUMENT_ROOT'].$f['path'].$f['name'].'_'.$r2[2].(($f['extension'])?'.'.$f['extension']:false);

				if(file_exists($file)){
                    print $file.' ';
	                unlink($file);
	            };
			};

			$file = $_SERVER['DOCUMENT_ROOT'].$f['path'].$f['name'].(($f['extension'])?'.'.$f['extension']:false);

            if(file_exists($file)){
                unlink($file);
            };

			$file = $_SERVER['DOCUMENT_ROOT'].$f['path'].'._thumb_'.$f['name'].(($f['extension'])?'.'.$f['extension']:false);

            if(file_exists($file)){
                unlink($file);
            };

            $file = $_SERVER['DOCUMENT_ROOT'].$f['path'].'._thumb_list_'.$f['name'].(($f['extension'])?'.'.$f['extension']:false);

            if(file_exists($file)){
                unlink($file);
            };

            $this->db->query("DELETE FROM `images` WHERE `id` = ".intval($f['id']));

            $this->db->query("
                UPDATE
                    `".DB::quote($f['relative_table'])."`
                SET
                    `".DB::quote($f['form_item'])."` = `".DB::quote($f['form_item'])."` - 1
                WHERE
                    `id` = ".intval($f['relative_id'])."
            ");
        }

        //Get file info of a content item image
        public function getFileInfo(){
            $query = "
        		SELECT
        		    `metaname` AS `name`,
        		    `metadesc` AS `desc`
        		FROM
        			`".DB::quote($_GET['type'])."`
        		WHERE
        			`id` = ".intval($_GET['id'])."
        	";

            $result = $this->db->assocMulti($query);

            print json_encode($result[0]);
        }

        //Save file info of a content item image
        public function saveFileInfo(){
        	$query = "
        		UPDATE
        			`".DB::quote($_POST['type'])."`
        		SET
        			`metaname` = '".DB::quote($_POST['name'])."',
        			`metadesc` = '".DB::quote($_POST['desc'])."'
        		WHERE
        			`id` = ".intval($_POST['id'])."
        	";

        	$this->db->query($query);
        }
	}