<?php
	class Users extends ModuleExtender{
        public 
        $main,
        $current_module_table,
        $per_page = 10;

        private
        $default_mode_url = '/admin/?option=users&suboption=system_users';

        function __construct(&$main) {
            $this->main = $main;
            parent::__construct();

            //Get and set current mode
            if(!$_GET['suboption'] && !$_GET['ajax']){
                header('Location: '.$this->default_mode_url);
            };

            $this->main->module_mode = $_GET['suboption'];

            switch($this->main->module_mode){
                case 'system_users' : $this->current_module_table = 'users'; break;
                case 'groups'       : $this->current_module_table = 'users_groups'; break;
                case 'public_users' : $this->current_module_table = 'public_users'; break;
            };

            //Module settings
            if($_GET['id']){
                $this->main->item_data = $this->getItemData($_GET['id']);
            };
        }

        public function sendPassword(){
            switch($_GET['suboption']){
                case 'system_users' : {
                    $from_name = 'Редактор CMS на сайте '.$this->main->domain;
                    $subject = 'Ваш пароль для входа в систему управления на сайте '.$this->main->domain.' был изменен';
                    $from_mail = 'system@'.$this->main->domain;
                    $content = '
                        Ваш пароль для входа в систему управления был изменен, не забудьте свой новый пароль: <code>'.$_GET['password'].'</code>.
                    ';
                }; break;

                case 'public_users' : {
                    $from_name = $this->main->domain;
                    $subject = 'Ваш пароль на сайте '.$this->main->domain.' был изменен';
                    $from_mail = 'system@'.$this->main->domain;
                    $content = '
                        Ваш пароль для входа на сайт был изменен, не забудьте свой новый пароль: <code>'.$_GET['password'].'</code>.
                    ';
                }; break;
            };

            Utilities::sendMail(
                $from_name,
                $from_mail,
                $_GET['email'],
                $subject,
                false,
                $content
            );

            die();
        }

        public function regeneratePassword($id){
            switch($_GET['suboption']){
                case 'system_users' : {
                    $table = 'users';
                }; break;

                case 'public_users' : {
                    $table = 'public_users';
                }; break;
            };

            $password = Utilities::getUniqueCode();

            $query = "
                UPDATE `".DB::quote($table)."`
                SET `password` = '".DB::quote(md5(md5($password)))."'
                WHERE `id` = ".intval($id)."
            ";

            $this->main->db->query($query);

            print $password;

            die();
        }

        public function systemUsers(){
            $this->main->vars['list_no_sortable'] = true;
            
            $this->main->content_list_delete_link       = Utilities::getParamstring('action,id').'&action=delete&id=';
            $this->main->content_list_show_link         = Utilities::getParamstring('action,id').'&action=show&id=';
            $this->main->content_list_hide_link         = Utilities::getParamstring('action,id').'&action=hide&id=';
            $this->main->content_list_edit_link         = '/admin/?option=users&suboption='.$this->main->module_mode.'&action=edit&id=';
            $this->main->new_item_link                  = '/admin/?option=users&suboption='.$this->main->module_mode.'&action=create';
            $this->main->multiple_link                  = '/admin/?option=users&suboption='.$this->main->module_mode.'&action=multiple';
            $this->main->autocomplete_search_link       = '/admin/?ajax=true&option=users&suboption='.$this->main->module_mode.'&action=autocomplete_search';
            $this->main->content_list_table    = $this->current_module_table;

            $this->main->createDatasetParams($this->current_module_table, $this->main->item_data['id']);
            $this->main->createDatasetField(array(
                'type' 			=> 'checkbox',
                'label' 		=> $this->main->getText('users', 'publish_label'),
                'help' 			=> $this->main->getText('users', 'publish_help'),
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
                'label' 		=> $this->main->getText('users', 'name_label'),
                'name' 			=> 'name',
                'value' 		=> $this->main->item_data['name'],
                'help' 			=> $this->main->getText('users', 'name_help'),
                'default' 		=> $this->main->getText('users', 'item_name').' ',
                'use_index_suffix' => true,
                'required'		=> true,
                'list'          => true
            ));

            $this->main->createDatasetField(array(
                'type' 			=> 'text',
                'label' 		=> $this->main->getText('users', 'login_label'),
                'name' 			=> 'login',
                'value' 		=> $this->main->item_data['login'],
                'help' 			=> $this->main->getText('users', 'login_help'),
                'default' 		=> 'user_',
                'use_index_suffix' => true,
                'required'		=> true,
                'unique'        => true,
                'list'          => true
            ));

            $this->main->createDatasetField(array(
                'type' 			=> 'text',
                'label' 		=> $this->main->getText('users', 'email_label'),
                'name' 			=> 'email',
                'value' 		=> $this->main->item_data['email'],
                'help' 			=> $this->main->getText('users', 'email_help'),
                'default' 		=> false,
                'required'		=> true,
                'unique'        => true,
                'email' 		=> true,
                'list'          => true
            ));

            $this->main->createDatasetField(array(
                'type' 			=> 'select',
                'label' 		=> $this->main->getText('users', 'group_label'),
                'name' 			=> 'group',
                'value' 		=> $this->main->item_data['group'],
                'help' 			=> $this->main->getText('users', 'group_help'),
                'default' 		=> 1,
                'list'          => true,
                'options' 		=> $this->main->parseOptionsFromTable('users_groups'),
                'options_source'=> 1,
                'options_table' => 'users_groups'
            ));

            $this->main->createDatasetField(array(
                'type' 			=> 'calendar',
                'label' 		=> $this->main->getText('users', 'last_label'),
                'name' 			=> 'last',
                'value' 		=> $this->main->item_data['last'],
                'help' 			=> $this->main->getText('users', 'last_help'),
                'default' 		=> date('Y-m-d H:i:s'),
                'list'          => true,
                'no_edit'       => true
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

        public function groups(){
            $this->main->vars['list_no_sortable'] = true;
            $this->main->vars['list_no_publish'] = true;
            
            $this->main->content_list_delete_link = Utilities::getParamstring('action,id').'&action=delete&id=';
            $this->main->content_list_show_link   = Utilities::getParamstring('action,id').'&action=show&id=';
            $this->main->content_list_hide_link   = Utilities::getParamstring('action,id').'&action=hide&id=';
            $this->main->content_list_edit_link   = '/admin/?option=users&suboption='.$this->main->module_mode.'&action=edit&id=';
            $this->main->new_item_link            = '/admin/?option=users&suboption='.$this->main->module_mode.'&action=create';
            $this->main->multiple_link            = '/admin/?option=users&suboption='.$this->main->module_mode.'&action=multiple';
            $this->main->autocomplete_search_link = '/admin/?ajax=true&option=users&suboption='.$this->main->module_mode.'&action=autocomplete_search';

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
                'label' 		=> $this->main->getText('groups', 'name_label'),
                'name' 			=> 'name',
                'value' 		=> $this->main->item_data['name'],
                'help' 			=> $this->main->getText('groups', 'name_help'),
                'default' 		=> $this->main->getText('groups', 'item_name').' ',
                'use_index_suffix' => true,
                'required'		=> true,
                'list'          => false,
                'meta_mode'     => true
            ));

            $this->main->createDatasetField(array(
                'type' 			=> 'text',
                'label' 		=> $this->main->getText('groups', 'auth_code_label'),
                'name' 			=> 'auth_code',
                'value' 		=> $this->main->item_data['login'],
                'default' 		=> '1',
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

        public function publicUsers(){
            $this->main->vars['list_no_sortable'] = true;

            $this->main->content_list_delete_link       = $this->main->getParamstring('action,id').'&action=delete&id=';
            $this->main->content_list_show_link         = $this->main->getParamstring('action,id').'&action=show&id=';
            $this->main->content_list_hide_link         = $this->main->getParamstring('action,id').'&action=hide&id=';
            $this->main->content_list_edit_link         = '/admin/?option=users&suboption='.$this->main->module_mode.'&action=edit&id=';
            $this->main->new_item_link                  = '/admin/?option=users&suboption='.$this->main->module_mode.'&action=create';
            $this->main->multiple_link                  = '/admin/?option=users&suboption='.$this->main->module_mode.'&action=multiple';
            $this->main->autocomplete_search_link       = '/admin/?ajax=true&option=users&suboption='.$this->main->module_mode.'&action=autocomplete_search';
            $this->main->content_list_table    = $this->current_module_table;

            $this->main->createDatasetParams($this->current_module_table, $this->main->item_data['id']);
            $this->main->createDatasetField(array(
                'type' 			=> 'checkbox',
                'label' 		=> $this->main->getText('users', 'publish_label'),
                'help' 			=> $this->main->getText('users', 'publish_help'),
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
                'label' 		=> $this->main->getText('users', 'login_label'),
                'name' 			=> 'login',
                'value' 		=> $this->main->item_data['login'],
                'help' 			=> $this->main->getText('users', 'login_help'),
                'default' 		=> 'user_',
                'use_index_suffix' => true,
                'required'		=> true,
                'unique'        => true,
                'list'          => true
            ));

            $this->main->createDatasetField(array(
                'type' 			=> 'text',
                'label' 		=> $this->main->getText('users', 'email_label'),
                'name' 			=> 'email',
                'value' 		=> $this->main->item_data['email'],
                'help' 			=> $this->main->getText('users', 'email_help'),
                'default' 		=> false,
                'required'		=> true,
                'unique'        => true,
                'email' 		=> true,
                'list'          => true
            ));

            $this->main->createDatasetField(array(
                'type' 			=> 'calendar',
                'label' 		=> $this->main->getText('users', 'last_label'),
                'name' 			=> 'last_login',
                'value' 		=> $this->main->item_data['last_login'],
                'help' 			=> $this->main->getText('users', 'last_help'),
                'default' 		=> date('Y-m-d H:i:s'),
                'list'          => true,
                'no_edit'       => true
            ));

            $this->main->createDatasetField(array(
                'type' 			=> 'separator'
            ));

            $this->main->createDatasetField(array(
                'type' 			=> 'text',
                'label' 		=> $this->main->getText('users', 'name_label'),
                'name' 			=> 'name',
                'value' 		=> $this->main->item_data['name'],
                'help' 			=> $this->main->getText('users', 'name_help'),
                'default' 		=> $this->main->getText('users', 'item_name').' ',
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