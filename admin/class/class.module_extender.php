<?php
    class ModuleExtender{
        public function __construct(){
            $this->addScriptsAndStyles();
        }

        private function addScriptsAndStyles(){
            if($_GET['action'] == 'edit'){
                array_push(
                    $this->main->addition_js,
                    'http://maps.google.com/maps/api/js?sensor=false',
                    '/admin/js/checkboxes.js',
                    '/admin/js/colorpicker.js',
                    '/admin/js/calendar.js',
                    '/admin/js/uploader.js',
                    '/admin/js/form.js',
                    '/admin/js/ui.js',
                    '/admin/js/sections_actions.js',
                    '/admin/js/validate.js',
                    '/admin/redactor/redactor.js',
                    '/admin/js/autocomplete.js',
                    '/admin/js/tagsinput.js'
                );

                array_push(
                    $this->main->addition_css,
                    '/admin/css/checkboxes.css',
                    '/admin/css/colorpicker.css',
                    '/admin/css/calendar.css',
                    '/admin/css/uploader.css',
                    '/admin/redactor/css/redactor.css',
                    '/admin/css/autocomplete.css',
                    '/admin/css/tagsinput.css'
                );
            }else{
                array_push(
                    $this->main->addition_js,
                    '/admin/js/form.js',
                    '/admin/js/validate.js',
                    '/admin/js/list.js',
                    '/admin/js/autocomplete.js'
                );

                array_push(
                    $this->main->addition_css,
                    '/admin/css/autocomplete.css'
                );
            };
        }

        private function moveItem(){
            $query = "
                UPDATE `".DB::quote($this->current_module_table)."`
                SET `sort` = ".intval($_GET['row_value'])."
                WHERE `id` = ".intval($_GET['row_id'])."
            ";

            $this->main->db->query($query);

            $query = "
                UPDATE `".DB::quote($this->current_module_table)."`
                SET `sort` = ".intval($_GET['target_value'])."
                WHERE `id` = ".intval($_GET['target_id'])."
            ";

            $this->main->db->query($query);
        }

        private function deleteItem($id){
            $query = "
                DELETE FROM `".$this->current_module_table."`
                WHERE `id` = ".intval($id)."
            ";

            $this->main->db->query($query);
        }

        private function publishStatusItem($id, $status){
            $query = "
                UPDATE `".$this->current_module_table."`
                SET `publish` = ".intval($status)." 
                WHERE `id` = ".intval($id)."
            ";

            $this->main->db->query($query);
        }

        //Do list actions
        public function bindActions(){
            if(isset($_GET['action']) && strlen($_GET['action']) > 0){
                switch($_GET['action']){
                    //Delete list item
                    case 'delete' : {
                        $this->deleteItem($_GET['id']);
                        header('Location: '.Utilities::getParamstring('action,id'));
                    }; break;

                    //Show content list item
                    case 'show' : {
                        $this->publishStatusItem($_GET['id'], 1);
                        header('Location: '.Utilities::getParamstring('action,id'));
                    }; break;

                    //Hide content list item
                    case 'hide' : {
                        $this->publishStatusItem($_GET['id'], 0);
                        header('Location: '.Utilities::getParamstring('action,id'));
                    }; break;

                    //Multiple action on the content list items
                    case 'multiple' : {
                        foreach(explode(';', $_GET['items']) as $item){
                            switch($_GET['operation']){
                                case 'del'      : $this->deleteItem($item);             break;
                                case 'show'     : $this->publishStatusItem($item, 1);   break;
                                case 'hide'     : $this->publishStatusItem($item, 0);   break;
                                case 'reorder'  : $this->reorderContentListRow($item);  break;
                            };
                        };
                    }; break;

                    case 'switch_state' : {
                        
                    }; break;

                    //Create item
                    case 'create' : {
                        $id = $this->createItem();

                        if($id > 0){
                            header('Location: '.$this->main->content_list_edit_link.$id);
                        }else{
                            header('Location: '.Utilities::getParamstring('action'));
                        };
                    }; break;

                    //Get search result
                    case 'autocomplete_search' : {
                        print $this->autocompleteSearch($_GET['q']);
                    }; break;

                    case 'move_item' : {
                        print $this->moveItem();
                    }; break;
                };
            };
        }

        protected function saveFormFields(){
            if(isset($_REQUEST['save']) or isset($_REQUEST['ok'])){
                $this->main->saveItem($_GET['id'], $this->current_module_table, $this->main->dataset, $_POST);

                if(isset($_REQUEST['ok'])){
                    if(strlen($this->main->append_return_link) > 0){
                        header('Location: '.$this->main->append_return_link);
                    }else{
                        header('Location: /admin/?option='.$this->main->module_name);
                    };
                };

                if(isset($_REQUEST['save'])){
                    header('Location: '.Utilities::getParamstring());
                };
            };
        }

        //Get item data for editor
        protected function getItemData($id){
            $query = "SELECT * FROM `".$this->current_module_table."` WHERE `id` = ".intval($id);
            return $this->main->db->assocItem($query);
        }

        private function getDefaults($new_id){
            $defaults = "";

            foreach($this->main->dataset['data'] as $item){
                if($item['list'] && strlen($item['name']) > 0 || $item['meta_mode']){
                    if($item['use_index_suffix']){
                        $suffix = $new_id;
                    }else{
                        $suffix = '';
                    };

                    $defaults .= "`".DB::quote($item['name'])."` = '".DB::quote($item['default'].$suffix)."', ";
                };
            };

            $defaults .= "`sort` = ".intval($new_id);

            return $defaults;
        }

        //Creates an item
        private function createItem(){
            $this->main->db->query("INSERT INTO `".$this->current_module_table."` () VALUES ()");
            $id = mysql_insert_id();

            $query = "
                UPDATE
                    `".$this->current_module_table."`
                SET
                    ".$this->getDefaults($id)."
                WHERE
                    `id` = ".intval($id)."
            ";

            $this->main->db->query($query);
            
            return $id;
        }

        //Returns search results to autocomplete
        public function autocompleteSearch($q){
            $query = "SELECT `id`, `name` FROM `".$this->current_module_table."` WHERE ";

            $searchStringArray = $this->main->getArrayFromSearchString($q);

            $where = '';

            foreach($searchStringArray as $key => $val){
                if(strlen($val) > 0){
                    $where .= "`name` LIKE '%".DB::quote($val)."%' OR ";
                };
            };

            if(strlen($where) > 0){
                $where .= "`name` LIKE '%".DB::quote($q)."%'";
            };

            if($where == ''){
                return null;
            }else{
                $query .= $where;
            };

            $sql = $this->main->db->query($query);

            $result = $q."\n";

            while($req = mysql_fetch_assoc($sql)){
                if(strlen($req['name']) > 0){
                    $result .= $req['name']."\n";
                };
            };

            return $result;
        }

        //Set search string for list
        private function setSearchstring(){
            $search_req = $this->main->getArrayFromSearchString($_GET['content_search']);

            $searchstring = '';

            foreach($search_req as $key => $val){
                if(strlen($val) > 0){
                    $searchstring .= "`name` LIKE '%".DB::quote($val)."%' OR ";
                };
            };

            $searchstring .= "`name` LIKE '%".DB::quote($_GET['content_search'])."%'";

            return $searchstring;
        }

        //Create cols selection for list query
        private function getAdditionalListFields(){
            $cols = '';

            foreach($this->main->dataset['data'] as $item){
                if($item['list'] && strlen($item['name']) > 0 &&
                   ($item['name'] != 'name' && $item['name'] != 'sort' && $item['name'] != 'id' && $item['name'] != 'publish')
                ){
                    $cols .= ', `'.DB::quote($item['name']).'`';
                };
            };

            return $cols;
        }

        //Set per page to pager
        public function setPerPage($value){
            setcookie($this->main->module_mode.'_list_per_page_limit', $value, time() + 3600 * 24 * 365, '/admin/');
            $this->per_page = $value;
        }

        //Get module content list
        private function getContentList(){
            if(isset($_GET['content_search']) && strlen($_GET['content_search']) > 0){
                $searchstring = $this->setSearchstring();
            };

            //Set per page cookie
            if(isset($_GET['limit'])){
                $this->setPerPage(intval($_GET['limit']));
            }else if($_COOKIE[$this->main->module_mode.'_list_per_page_limit']){
                $this->per_page = intval($_COOKIE[$this->main->module_mode.'_list_per_page_limit']);
            };

            $this->main->current_per_page = $this->per_page;

            if(strlen($searchstring) > 0){
                $where = " WHERE ".$searchstring;
            };

            $counter_query = "
                SELECT
                    count(*) AS `count`
                FROM
                    `".$this->main->db->quote($this->current_module_table)."`
                ";

            $counter_result = mysql_fetch_row($this->main->db->query($counter_query));
            $limit = $this->main->getLimitsForList($counter_result[0], $this->per_page);
            
            $query = "
                SELECT
                    `id`,
                    `name`,
                    `publish`,
                    `sort`
                    ".$this->getAdditionalListFields()."
                FROM
                    `".$this->main->db->quote($this->current_module_table)."`
                    ".$where.$this->main->getSortingParams()."
                LIMIT
                    ".$limit[0].", ".$limit[1];

            return $this->main->db->assocMulti($query);
        }

        //Returns a dataset for list
        private function getListCols(){
            $result = array();
            
            foreach($this->main->dataset['data'] as $item){
                if($item['list']){
                    array_push($result, array(
                        'name' => $item['label'],
                        'col_name' => $item['name'],
                        'type' => $item['type'],
                        'options_custom' => $item['options_custom'],
                        'options_table' => $item['options_table'],
                        'options_source' => $item['options_source'],
                        'prefix' => null,
                        'suffix' => null,
                        'mode' => null
                    ));
                };
            };

            return $result;
        }

        protected function prepareListData(){
            $this->main->content_list = $this->getContentList();
            $this->main->list_items = $this->getListCols();
        }
    }
?>