<?php
	class Menu extends ModuleExtender{
        public 
        $main,
        $current_module_table,
        $per_page = 10;

        private
        $default_mode_url = '/admin/?option=structure&suboption=menu';

        function __construct(&$main) {
            $this->main = $main;
            parent::__construct();

            //Get and set current mode
            if(!$_GET['suboption']){
                header('Location: '.$this->default_mode_url);
            };

            $this->main->module_mode = $_GET['suboption'];

            switch($this->main->module_mode){
                case 'menu' : $this->current_module_table = 'menus'; break;
            };

            //Module settings
            $this->main->item_data = $this->getItemData($_GET['id']);
        }

        public function menu(){
            $this->main->vars['list_no_sortable'] = true;
            $this->main->vars['list_no_publish'] = true;
            
            $this->main->content_list_delete_link = Utilities::getParamstring('action,id').'&action=delete&id=';
            $this->main->content_list_show_link   = Utilities::getParamstring('action,id').'&action=show&id=';
            $this->main->content_list_hide_link   = Utilities::getParamstring('action,id').'&action=hide&id=';
            $this->main->content_list_edit_link   = '/admin/?option=structure&suboption='.$this->main->module_mode.'&action=edit&id=';
            $this->main->new_item_link            = '/admin/?option=structure&suboption='.$this->main->module_mode.'&action=create';
            $this->main->multiple_link            = '/admin/?option=structure&suboption='.$this->main->module_mode.'&action=multiple';
            $this->main->append_return_link       = Utilities::getParamstring('option,suboption,id,action').'option=structure&suboption=menu';

            $this->main->createDatasetParams($this->current_module_table, $this->main->item_data['id']);

            $this->main->createDatasetField(array(
                'type' 			=> 'checkbox',
                'value' 		=> $this->main->item_data['publish'],
                'name' 			=> 'publish',
                'default'       => 1,
                'meta_mode'     => true,
                'no_edit'       => true,
                'list'          => false
            ));

            $this->main->createDatasetField(array(
                'type' 			=> 'text',
                'label' 		=> $this->main->getText('menu', 'name_label'),
                'name' 			=> 'name',
                'value' 		=> $this->main->item_data['name'],
                'help' 			=> $this->main->getText('menu', 'name_help'),
                'default' 		=> $this->main->getText('menu', 'item_name').' ',
                'use_index_suffix' => true,
                'required'		=> true,
                'list'          => false,
                'meta_mode'     => true
            ));

            if(!$_GET['actions']){
                $this->prepareListData();
            };

            if($_GET['action'] == 'edit'){
                $this->saveFormFields();
            };

            //Start actions
            $this->bindActions();
        }
    }
?>