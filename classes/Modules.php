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

        private function module_GetPage(){
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

            if($sq != ''){
                $title = 'Поиск по запросу &laquo;' . $sq . '&raquo;';
            }else{
                $title = 'Поиск по сайту';
            }

            $this->page = array(
                'id'            => $this->item['data']['id'],
                'path'          => $this->item['data']['path'],
                'pid'           => $this->item['data']['pid'],
                'title'         => 'Поиск по сайту',
                'description'   => $this->item['data']['description'],
                'keywords'      => $this->item['data']['keywords'],
                'h1'            => $title,
                'mode'          => $this->item['data']['mode'],
                'breadcrumbs'   => $this->getBreadCrumbs($this->item['data']['id']),
                'sq'            => $sq,
                'content'       => $this->smarty->fetch('modules/search.tpl')
            );
        }

        private function module_GetSitemap(){
            function getBranch($pid){
                $query = "
                    SELECT
                        `structure`.`id`,
                        `structure_data`.`name`,
                        `structure_data`.`path`
                    FROM
                        `structure`,
                        `structure_data`
                    WHERE
                        `structure`.`pid` = ".intval($pid)." &&
                        `structure`.`id` = `structure_data`.`id` &&
                        `structure_data`.`mode` NOT IN(3)
                    ORDER BY
                        `structure_data`.`sort` ASC
                ";
                $result = mysql_query($query);

                while($row = mysql_fetch_assoc($result)){
                    $row['childrens'] = getBranch($row['id']);
                    $rows[] = $row;
                };

                return $rows;
            }

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
                'data'          => getBranch(0)
            );

            $this->page['content'] = $this->smarty->fetch('modules/sitemap.tpl');
        }
    }