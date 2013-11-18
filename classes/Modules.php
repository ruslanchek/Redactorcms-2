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
                    return $this->module_getMakers();
                } break;

                case '5' : {
                    return $this->module_getMaker();
                } break;

                case '6' : {
                    return $this->module_getCatalogGroups();
                } break;

                case '7' : {
                    return $this->module_getCatalogSection();
                } break;

                case '8' : {
                    return $this->module_getCatalogObject();
                } break;

                case '9' : {
                    return $this->module_getCatalogGroup();
                } break;

                case '10' : {
                    return $this->module_getSearch();
                } break;

                case '11' : {
                    return $this->module_getSitemap();
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

        private function module_getNewsList(){
            $data = $this->getStructureWithSectionData(
                6,
                $this->item['data']['id'],
                3,
                'section_19',
                array(array('col_132', 'date')),
                false,
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
                'items'         => $this->getSearchItems($sq)
            );

            $this->page['content'] = $this->smarty->fetch('modules/search.tpl');
        }

        private function module_getMakers(){
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
                'text'          => $this->getPage(74),
                'items'         => $this->getMakers()
            );

            $this->page['content'] = $this->smarty->fetch('modules/makers-list.tpl');
        }

        private function module_getMaker(){
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
                'item'          => $this->getMaker($this->item['data']['content_id'])
            );

            $this->page['content'] = $this->smarty->fetch('modules/makers-item.tpl');
        }

        private function module_getCatalogGroups(){
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
                'text'          => $this->getPage(75),
                'items'         => $this->getCatalog()
            );

            $this->page['content'] = $this->smarty->fetch('modules/catalog-groups.tpl');
        }

        private function module_getCatalogGroup(){
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
                'item'          => $this->getCatalogSection($this->item['data']['content_id'])
            );

            $this->page['content'] = $this->smarty->fetch('modules/catalog-group.tpl');
        }

        private function module_getCatalogSection(){
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
                'text'          => $this->getPage(75),
                'items'         => $this->getCatalog()
            );

            $this->page['content'] = $this->smarty->fetch('modules/catalog-section.tpl');
        }

        private function module_getCatalogObject(){
            $this->error404();
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