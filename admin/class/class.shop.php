<?php
	class Shop extends ModuleExtender{
        public 
        $main,
        $current_module_table,
        $per_page = 10;

        private
        $default_mode_url = '/admin/?option=shop&suboption=goods';

        function __construct(&$main) {
            $this->main = $main;
            parent::__construct();

            //Get and set current mode
            if(!$_GET['suboption'] && !$_GET['ajax']){
                header('Location: '.$this->default_mode_url);
            };

            $this->main->module_mode = $_GET['suboption'];

            switch($this->main->module_mode){
                case 'goods'            : $this->current_module_table = 'shop_goods'; break;
                case 'categories'       : $this->current_module_table = 'shop_categories'; break;
                case 'parameters'       : $this->current_module_table = 'shop_parameters'; break;
            };

            //Module settings
            if($_GET['id']){
                $this->main->item_data = $this->getItemData($_GET['id']);
            };
        }

        public function goods(){
            $this->main->vars['list_no_sortable'] = false;
            
            $this->main->content_list_delete_link       = Utilities::getParamstring('action,id').'&action=delete&id=';
            $this->main->content_list_show_link         = Utilities::getParamstring('action,id').'&action=show&id=';
            $this->main->content_list_hide_link         = Utilities::getParamstring('action,id').'&action=hide&id=';
            $this->main->content_list_edit_link         = '/admin/?option=shop&suboption='.$this->main->module_mode.'&action=edit&id=';
            $this->main->new_item_link                  = '/admin/?option=shop&suboption='.$this->main->module_mode.'&action=create';
            $this->main->multiple_link                  = '/admin/?option=shop&suboption='.$this->main->module_mode.'&action=multiple';
            $this->main->autocomplete_search_link       = '/admin/?ajax=true&option=shop&suboption='.$this->main->module_mode.'&action=autocomplete_search';
            $this->main->content_list_up_link           = Utilities::getParamstring('action,item_id').'&action=move_item&dir=up';
            $this->main->content_list_down_link         = Utilities::getParamstring('action,item_id').'&action=move_item&dir=down';
            $this->main->content_list_table             = $this->current_module_table;

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
                'label' 		=> 'Наименование',
                'name' 			=> 'name',
                'value' 		=> $this->main->item_data['name'],
                'help' 			=> 'Название',
                'default' 		=> 'Товар ',
                'use_index_suffix' => true,
                'required'		=> true,
                'list'          => true
            ));

            $this->main->createDatasetField(array(
                'type' 			=> 'text',
                'label' 		=> 'Артикул',
                'name' 			=> 'item_article',
                'value' 		=> $this->main->item_data['item_article'],
                'help' 			=> 'Артикул',
                'list'          => true
            ));

            $this->main->createDatasetField(array(
                'type' 			=> 'select',
                'label' 		=> 'Категория',
                'name' 			=> 'category',
                'value' 		=> $this->main->item_data['category'],
                'help' 			=> 'Категория',
                'options' 		=> $this->main->parseOptionsFromTable('shop_categories')
            ));

            $this->main->createDatasetField(array(
                'type' 			=> 'separator'
            ));

            $this->main->createDatasetField(array(
                'type' 			=> 'text',
                'label' 		=> 'Цена',
                'name' 			=> 'price',
                'value' 		=> $this->main->item_data['price'],
                'help' 			=> 'Цена',
                'list'          => true
            ));

            $this->main->createDatasetField(array(
                'type' 			=> 'param',
                'label' 		=> 'Скидка',
                'name' 			=> 'discount',
                'value' 		=> $this->main->item_data['discount'],
                'help' 			=> 'Скидка',
                'list'          => true,
                'suffix'        => '%',
                'max'
            ));

            $this->main->createDatasetField(array(
                'type' 			=> 'separator'
            ));

            $this->main->createDatasetField(array(
                'type' 			=> 'image',
                'label' 		=> 'Картинка товара',
                'name' 			=> 'item_picture',
                'value' 		=> $this->main->item_data['item_picture'],
                'help' 			=> 'Картинка товара',
                'list'          => true,
                'thumbs'        => $this->main->constants['shop']['image_thumbs_params'][0],
                'folder'        => 'shop/goods/front'
            ));

            $this->main->createDatasetField(array(
                'type' 			=> 'gallery',
                'label' 		=> 'Галерея товара',
                'name' 			=> 'item_gallery',
                'value' 		=> $this->main->item_data['item_gallery'],
                'help' 			=> 'Галерея товара',
                'list'          => true,
                'thumbs'        => $this->main->constants['shop']['gallery_thumbs_params'][0],
                'folder'        => 'shop/goods/gallery'
            ));

            $this->main->createDatasetField(array(
                'type' 			=> 'separator'
            ));

            //Form description
            $this->main->createDatasetField(array(
                'type' 			=> 'textarea',
                'label' 		=> 'Краткое описание',
                'name' 			=> 'short_description',
                'value' 		=> $this->main->item_data['short_description'],
                'help' 			=> 'Краткое описание',
                'use_editor' 	=> true,
                'typography' 	=> true,
                'rows' 			=> 10
            ));

            //Form description
            $this->main->createDatasetField(array(
                'type' 			=> 'textarea',
                'label' 		=> 'Полное описание',
                'name' 			=> 'description',
                'value' 		=> $this->main->item_data['description'],
                'help' 			=> 'Полное описание',
                'use_editor'    => true,
                'typography' 	=> true,
                'rows' 			=> 20
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

        public function categories(){
            $this->main->vars['list_no_sortable'] = true;

            $this->main->content_list_delete_link       = Utilities::getParamstring('action,id').'&action=delete&id=';
            $this->main->content_list_show_link         = Utilities::getParamstring('action,id').'&action=show&id=';
            $this->main->content_list_hide_link         = Utilities::getParamstring('action,id').'&action=hide&id=';
            $this->main->content_list_edit_link         = '/admin/?option=shop&suboption='.$this->main->module_mode.'&action=edit&id=';
            $this->main->new_item_link                  = '/admin/?option=shop&suboption='.$this->main->module_mode.'&action=create';
            $this->main->multiple_link                  = '/admin/?option=shop&suboption='.$this->main->module_mode.'&action=multiple';
            $this->main->autocomplete_search_link       = '/admin/?ajax=true&option=shop&suboption='.$this->main->module_mode.'&action=autocomplete_search';
            $this->main->content_list_up_link           = Utilities::getParamstring('action,item_id').'&action=move_item&dir=up';
            $this->main->content_list_down_link         = Utilities::getParamstring('action,item_id').'&action=move_item&dir=down';
            $this->main->content_list_table    = $this->current_module_table;

            $this->main->createDatasetParams($this->current_module_table, $this->main->item_data['id']);
            $this->main->createDatasetField(array(
                'type' 			=> 'checkbox',
                'label' 		=> 'Активна',
                'help' 			=> 'Активна',
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
                'label' 		=> 'Наименование',
                'name' 			=> 'name',
                'value' 		=> $this->main->item_data['name'],
                'help' 			=> 'Наименование',
                'default' 		=> 'Категория товаров ',
                'use_index_suffix' => true,
                'required'		=> true,
                'list'          => true
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