<?php
	class Templates extends ModuleExtender{
        public 
        $main,
        $current_module_table,
        $per_page = 10;

        private
        $default_mode_url = '/admin/?option=templates&suboption=templates';

        function __construct(&$main) {
            $this->main = $main;
            parent::__construct();

            //Get and set current mode
            if(!$_GET['suboption'] && !$_GET['ajax']){
                header('Location: '.$this->default_mode_url);
            };

            $this->main->module_mode = $_GET['suboption'];

            switch($this->main->module_mode){
                case 'templates' : $this->current_module_table = 'templates'; break;
                case 'zones'     : $this->current_module_table = 'zones'; break;
            };

            //Module settings
            if($_GET['id']){
                $this->main->item_data = $this->getItemData($_GET['id']);
            };
        }

        public function templates(){
            $this->main->vars['list_no_sortable'] = true;
            
            $this->main->content_list_delete_link       = Utilities::getParamstring('action,id').'&action=delete&id=';
            $this->main->content_list_show_link         = Utilities::getParamstring('action,id').'&action=show&id=';
            $this->main->content_list_hide_link         = Utilities::getParamstring('action,id').'&action=hide&id=';
            $this->main->content_list_edit_link         = '/admin/?option=templates&suboption='.$this->main->module_mode.'&action=edit&id=';
            $this->main->new_item_link                  = '/admin/?option=templates&suboption='.$this->main->module_mode.'&action=create';
            $this->main->multiple_link                  = '/admin/?option=templates&suboption='.$this->main->module_mode.'&action=multiple';
            $this->main->autocomplete_search_link       = '/admin/?ajax=true&option=templates&suboption='.$this->main->module_mode.'&action=autocomplete_search';
            $this->main->content_list_table    = $this->current_module_table;

            $this->main->createDatasetParams($this->current_module_table, $this->main->item_data['id']);
            $this->main->createDatasetField(array(
                'type' 			=> 'checkbox',
                'label' 		=> 'Активен',
                'help' 			=> 'Активен',
                'value' 		=> $this->main->item_data['publish'],
                'name' 			=> 'publish',
                'meta_mode'     => true,
                'default'       => 0
            ));

            $this->main->createDatasetField(array(
                'type' 			=> 'separator'
            ));

            $this->main->createDatasetField(array(
                'type' 			=> 'text',
                'label' 		=> 'Название',
                'name' 			=> 'name',
                'value' 		=> $this->main->item_data['name'],
                'help' 			=> 'Название',
                'default' 		=> 'Шаблон ',
                'use_index_suffix' => true,
                'required'		=> true,
                'list'          => false
            ));

            $this->main->createDatasetField(array(
                'type' 			=> 'separator'
            ));

            $this->main->createDatasetField(array(
                'type' 			=> 'template_file',
                'label' 		=> 'Файл шаблона',
                'name' 			=> 'file',
                'value' 		=> $this->main->item_data['file'],
                'help' 			=> 'Файл шаблона',
                'default' 		=> '/templates/inner.tpl',
                'required'		=> true,
                'list'          => true,
                'root_dir'      => '/templates/'
            ));
            
            if(!$_GET['action']){
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