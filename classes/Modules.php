<?
    Class Modules extends Project {
        private $item;

        public function getModule($item){
            $this->item = $item;

            switch($this->item['data']['mode']){
                case '1' : {
                    return $this->module_getPage();
                } break;

                case '2' : {
                    return $this->module_getNewsList();
                } break;

                case '3' : {
                    return $this->module_getNewsItem();
                } break;

                case '4' : {
                    return $this->module_getNewsList($this->item['data']['content_id']);
                } break;

                case '5' : {
                    return $this->module_getArticlesList();
                } break;

                case '6' : {
                    return $this->module_getArticlesItem();
                } break;

                case '7' : {
                    return $this->module_getVacanciesList();
                } break;

                case '8' : {
                    return $this->module_getVacanciesItem();
                } break;

                case '9' : {
                    return $this->module_getGallery();
                } break;

                case '10' : {
                    return $this->module_getSearch();
                } break;

                case '11' : {
                    return $this->module_getSitemap();
                } break;

                case '12' : {
                    return $this->module_getServicesList();
                } break;

                case '13' : {
                    return $this->module_getServicesItem();
                } break;

                default : {
                    die('Не выбран модуль-обработчик для узла!');
                } break;
            }
        }

        private function module_getPage(){
            $this->page = array(
                'id'            => $this->item['data']['id'],
                'path'          => $this->item['data']['path'],
                'pid'           => $this->item['data']['pid'],
                'title'         => $this->item['data']['title'],
                'description'   => $this->item['data']['description'],
                'keywords'      => $this->item['data']['keywords'],
                'h1'            => $this->item['data']['name'],
                'mode'          => $this->item['data']['mode'],
                'breadcrumbs'   => $this->getBreadCrumbs($this->item['data']['id']),
                'content'       => $this->getPage($this->item['data']['content_id'])
            );
        }

        private function module_getGallery(){
            $this->page = array(
                'id'            => $this->item['data']['id'],
                'path'          => $this->item['data']['path'],
                'pid'           => $this->item['data']['pid'],
                'title'         => $this->item['data']['title'],
                'description'   => $this->item['data']['description'],
                'keywords'      => $this->item['data']['keywords'],
                'h1'            => $this->item['data']['name'],
                'mode'          => $this->item['data']['mode'],
                'breadcrumbs'   => $this->getBreadCrumbs($this->item['data']['id']),
                'items'         => $this->getItemImageGallery('section_27', $this->item['data']['content_id'], 'col_189')
            );

            $this->page['content'] = $this->smarty->fetch('modules/gallery.tpl');
        }

        private function module_getArticlesList(){
            $data = $this->getStructureWithSectionData(
                10,
                false,
                6,
                'section_26',
                array(array('col_184', 'announce')),
                false,
                'sort',
                'ASC'
            );

            $this->page = array(
                'id'            => $this->item['data']['id'],
                'path'          => $this->item['data']['path'],
                'pid'           => $this->item['data']['pid'],
                'title'         => $this->item['data']['title'],
                'description'   => $this->item['data']['description'],
                'keywords'      => $this->item['data']['keywords'],
                'h1'            => $this->item['data']['name'],
                'mode'          => $this->item['data']['mode'],
                'breadcrumbs'   => $this->getBreadCrumbs($this->item['data']['id']),
                'items'         => $data['items'],
                'pager'         => $data['pager']
            );

            $this->page['content'] = $this->smarty->fetch('modules/articles-list.tpl');
        }

        private function module_getArticlesItem(){
            $data = $this->getStructureItemWithSectionData(
                'section_26',
                $this->item['data']['content_id'],
                array(
                    array('col_183', 'text')
                )
            );

            $this->page = array(
                'id'            => $this->item['data']['id'],
                'path'          => $this->item['data']['path'],
                'pid'           => $this->item['data']['pid'],
                'title'         => $this->item['data']['title'],
                'description'   => $this->item['data']['description'],
                'keywords'      => $this->item['data']['keywords'],
                'h1'            => $this->item['data']['name'],
                'mode'          => $this->item['data']['mode'],
                'breadcrumbs'   => $this->getBreadCrumbs($this->item['data']['id']),
                'item'          => $data
            );

            $this->page['content'] = $this->smarty->fetch('modules/articles-item.tpl');
        }


        private function module_getServicesList(){
            $data = $this->getStructureWithSectionData(
                false,
                false,
                13,
                'section_30',
                array(array('col_199', 'announce')),
                false,
                'sort',
                'ASC'
            );

            $this->page = array(
                'id'            => $this->item['data']['id'],
                'path'          => $this->item['data']['path'],
                'pid'           => $this->item['data']['pid'],
                'title'         => $this->item['data']['title'],
                'description'   => $this->item['data']['description'],
                'keywords'      => $this->item['data']['keywords'],
                'h1'            => $this->item['data']['name'],
                'mode'          => $this->item['data']['mode'],
                'breadcrumbs'   => $this->getBreadCrumbs($this->item['data']['id']),
                'items'         => $data['items'],
                'pager'         => $data['pager']
            );

            $this->page['content'] = $this->smarty->fetch('modules/services-list.tpl');
        }

        private function module_getServicesItem(){
            $data = $this->getStructureItemWithSectionData(
                'section_30',
                $this->item['data']['content_id'],
                array(
                    array('col_200', 'text')
                )
            );

            $this->page = array(
                'id'            => $this->item['data']['id'],
                'path'          => $this->item['data']['path'],
                'pid'           => $this->item['data']['pid'],
                'title'         => $this->item['data']['title'],
                'description'   => $this->item['data']['description'],
                'keywords'      => $this->item['data']['keywords'],
                'h1'            => $this->item['data']['name'],
                'mode'          => $this->item['data']['mode'],
                'breadcrumbs'   => $this->getBreadCrumbs($this->item['data']['id']),
                'item'          => $data
            );

            $this->page['content'] = $this->smarty->fetch('modules/services-item.tpl');
        }


        private function module_getVacanciesList(){
            $data = $this->getStructureWithSectionData(
                10,
                false,
                8,
                'section_25',
                array(array('col_179', 'announce')),
                false,
                'sort',
                'ASC'
            );

            $this->page = array(
                'id'            => $this->item['data']['id'],
                'path'          => $this->item['data']['path'],
                'pid'           => $this->item['data']['pid'],
                'title'         => $this->item['data']['title'],
                'description'   => $this->item['data']['description'],
                'keywords'      => $this->item['data']['keywords'],
                'h1'            => $this->item['data']['name'],
                'mode'          => $this->item['data']['mode'],
                'breadcrumbs'   => $this->getBreadCrumbs($this->item['data']['id']),
                'items'         => $data['items'],
                'pager'         => $data['pager']
            );

            $this->page['content'] = $this->smarty->fetch('modules/vacancies-list.tpl');
        }

        private function module_getVacanciesItem(){
            $data = $this->getStructureItemWithSectionData(
                'section_25',
                $this->item['data']['content_id'],
                array(
                    array('col_177', 'text')
                )
            );

            $this->page = array(
                'id'            => $this->item['data']['id'],
                'path'          => $this->item['data']['path'],
                'pid'           => $this->item['data']['pid'],
                'title'         => $this->item['data']['title'],
                'description'   => $this->item['data']['description'],
                'keywords'      => $this->item['data']['keywords'],
                'h1'            => $this->item['data']['name'],
                'mode'          => $this->item['data']['mode'],
                'breadcrumbs'   => $this->getBreadCrumbs($this->item['data']['id']),
                'item'          => $data
            );

            $this->page['content'] = $this->smarty->fetch('modules/vacancies-item.tpl');
        }


        private function module_getNewsList($line_id = false){
            $where = false;

            if($line_id > 0){
                $where = " && `col_166` = " . intval($line_id);
            }

            $data = $this->getStructureWithSectionData(
                10,
                false,
                3,
                'section_19',
                array(array('col_132', 'date')),
                $where,
                'col_132',
                'DESC'
            );


            $this->page = array(
                'id'            => $this->item['data']['id'],
                'path'          => $this->item['data']['path'],
                'pid'           => $this->item['data']['pid'],
                'title'         => $this->item['data']['title'],
                'description'   => $this->item['data']['description'],
                'keywords'      => $this->item['data']['keywords'],
                'h1'            => $this->item['data']['name'],
                'mode'          => $this->item['data']['mode'],
                'breadcrumbs'   => $this->getBreadCrumbs($this->item['data']['id']),
                'items'         => $data['items'],
                'pager'         => $data['pager']
            );

            $this->page['content'] = $this->smarty->fetch('modules/news-list.tpl');
        }

        private function module_getNewsItem(){
            $data = $this->getStructureItemWithSectionData(
                'section_19',
                $this->item['data']['content_id'],
                array(
                    array('col_132', 'date'),
                    array('col_134', 'text')
                )
            );

            $this->page = array(
                'id'            => $this->item['data']['id'],
                'path'          => $this->item['data']['path'],
                'pid'           => $this->item['data']['pid'],
                'title'         => $this->item['data']['title'],
                'description'   => $this->item['data']['description'],
                'keywords'      => $this->item['data']['keywords'],
                'h1'            => $this->item['data']['name'],
                'mode'          => $this->item['data']['mode'],
                'breadcrumbs'   => $this->getBreadCrumbs($this->item['data']['id']),
                'item'          => $data
            );

            $this->page['content'] = $this->smarty->fetch('modules/news-item.tpl');
        }

        private function module_getSearch(){
            $sq = htmlspecialchars(strip_tags($_GET['sq']));

            require_once $_SERVER['DOCUMENT_ROOT'] . '/shared/search/class.search_model.php';
            $sm = new SearchModel();

            $this->page = array(
                'id'            => $this->item['data']['id'],
                'path'          => $this->item['data']['path'],
                'pid'           => $this->item['data']['pid'],
                'title'         => 'Поиск по сайту',
                'description'   => $this->item['data']['description'],
                'keywords'      => $this->item['data']['keywords'],
                'h1'            => 'Поиск по сайту',
                'mode'          => $this->item['data']['mode'],
                'breadcrumbs'   => $this->getBreadCrumbs($this->item['data']['id']),
                'sq'            => $sq,
                'data'          => $sm->getResults($sq)
            );

            $this->page['content'] = $this->smarty->fetch('modules/search.tpl');
        }

        private function module_GetSitemap(){
            $this->page = array(
                'id'            => $this->item['data']['id'],
                'path'          => $this->item['data']['path'],
                'pid'           => $this->item['data']['pid'],
                'title'         => $this->item['data']['title'],
                'description'   => $this->item['data']['description'],
                'keywords'      => $this->item['data']['keywords'],
                'h1'            => $this->item['data']['name'],
                'mode'          => $this->item['data']['mode'],
                'breadcrumbs'   => $this->getBreadCrumbs($this->item['data']['id']),
                'data'          => $this->getSitemapBranch(0)
            );

            $this->page['content'] = $this->smarty->fetch('modules/sitemap.tpl');
        }
    }