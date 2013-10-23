<?php
	//Module classes
	require($_SERVER['DOCUMENT_ROOT'].'/admin/class/class.structure.php');
	$structure = new Structure($main);

    //Module settings
	$main->title = $main->getText('structure', 'title_structure_list');
	$main->h1 = $main->getText('structure', 'title_structure_list');
	$main->module_mode = 'tree';

	//Get and set current mode
	if($_GET['suboption']){
		$main->module_mode = $_GET['suboption'];
    };

    if($main->module_mode == 'edit'){
        $main->item_data['id'] = $_GET['id'];

        //Set submenu
        $main->submenu = array(
            array(
                'name'   => $main->getText('structure', 'title_site_structure'),
                'active' => true
            ),
            array(
                'name'   => $main->getText('menu', 'title_menu'),
                'url'    => '/admin/?option=structure&suboption=menu'
            )
        );

        $structure->getItemData(DB::quote($_GET['id']));

        $main->title = $main->getText('structure', 'title_structure_edit');
        $main->h1 = '<a href="/admin/?option='.$main->module_name.'&suboption=tree">'.$main->getText('structure', 'title_structure_list').'</a>';

        foreach($structure->getBreadCrumbs($main->item_data['id']) as $item){
            if($item['current']){
                $main->h1 .= ' &rarr; '.$item['name'];
            }else{
                $main->h1 .= ' &rarr; <a href="/admin/?option=structure&suboption=edit&id='.$item['id'].'">'.$item['name'].'</a>';
            };
        };

        //Form options
        $main->dataset['params']['enctype'] = 'application/x-www-form-urlencoded';
        $main->dataset['params']['method'] = 'POST';
        $main->dataset['params']['table'] = 'structure_data';
        $main->dataset['params']['validate'] = true;

        //Form checkbox
        $main->dataset['data'][0] = array(
            'type' 			=> 'checkbox',
            'label' 		=> $main->getText('structure', 'form_publish_label'),
            'name' 			=> 'publish',
            'value' 		=> $main->item_data['publish'],
            'help' 			=> $main->getText('structure', 'form_publish_help')
        );

        //Form checkbox
        /*$main->dataset['data'][1] = array(
            'type' 			=> 'checkbox',
            'label' 		=> 'Закрытая страница',
            'name' 			=> 'private',
            'value' 		=> $main->item_data['private'],
            'help' 			=> 'Закрытая страница'
        );*/

        //Form separator
        $main->dataset['data'][2] = array(
            'type' 			=> 'separator',
            'name' 			=> 'main_separator',
            'label' 		=> $main->getText('structure', 'form_main_separator_label')
        );

        //Form name
        $main->dataset['data'][3] = array(
            'type' 			=> 'text',
            'label' 		=> $main->getText('structure', 'form_name_label'),
            'name' 			=> 'name',
            'value' 		=> $main->item_data['name'],
            'help' 			=> $main->getText('structure', 'form_name_help'),
            'default' 		=> $main->getText('structure', 'item_name').' '.$main->item_data['id'],
            'required'		=> true,
            'urlconversion' => false,
            'email' 		=> false
        );

        //Form url
        if($main->item_data['id'] != 1 && $main->item_data['path'] != '/' && $main->item_data['part'] != ''){
            if($main->item_data['id'] > 0){
                $main->dataset['data'][4] = array(
                    'type' 			=> 'text',
                    'label' 		=> $main->getText('structure', 'form_path_label'),
                    'name' 			=> 'part',
                    'value' 		=> $main->item_data['part'],
                    'help' 			=> $main->getText('structure', 'form_path_help'),
                    'default' 		=> $main->item_data['id'],
                    'required'		=> true,
                    'urlconversion' => true,
                    'email' 		=> false
                );
            };
        };

        //Form separator
        $main->dataset['data'][5] = array(
            'type' 			=> 'separator',
            'name' 			=> 'modules_separator',
            'label' 		=> $main->getText('structure', 'form_modules_separator_label')
        );

        //Form mode
        $main->dataset['data'][6] = array(
            'type' 			=> 'select',
            'label' 		=> $main->getText('structure', 'form_menu_label'),
            'name' 			=> 'menu',
            'value' 		=> $main->item_data['menu'],
            'help' 			=> $main->getText('structure', 'form_menu_help'),
            'options' 		=> $main->parseOptionsFromTable('menus')
        );

        //Form mode
        $main->dataset['data'][7] = array(
            'type' 			=> 'select',
            'label' 		=> 'Шаблон',
            'name' 			=> 'template',
            'value' 		=> $main->item_data['template'],
            'help' 			=> 'Шаблон',
            'options' 		=> $main->parseOptionsFromTable('templates')
        );

        //Form separator
        $main->dataset['data'][8] = array(
            'type' 			=> 'separator',
            'name' 			=> 'seo_separator',
            'label' 		=> $main->getText('structure', 'form_seo_separator_label')
        );

        //Form mode
        $main->dataset['data'][9] = array(
            'type' 			=> 'select',
            'label' 		=> 'Модуль',
            'name' 			=> 'mode',
            'master'        => array(
                                1 => 'page_id',
                                3 => 'news_id'
                            ),
            'value' 		=> $main->item_data['mode'],
            'help' 			=> 'Модуль',
            'default'       => 1,
            'options' 		=> array(
                                    array(
                                        'key' => 1,
                                        'value' => 'Cтраница'
                                    ),
                                    array(
                                        'key' => 2,
                                        'value' => 'Все новости'
                                    ),
                                    array(
                                        'key' => 3,
                                        'value' => 'Новость'
                                    ),
                                    array(
                                        'key' => 10,
                                        'value' => 'Поиск'
                                    ),
                                    array(
                                        'key' => 11,
                                        'value' => 'Карта сайта'
                                    )
                               )
        );

        // TODO: Сделать как-то, чтобы page_id, news_id и пр были просто одним универсальным полем content_id

        $main->dataset['data'][10] = array(
            'meta'          => 'page_id',
            'type' 			=> 'select',
            'label' 		=> 'Страница',
            'name' 			=> 'content_id',
            'slave_of'      => 'mode',
            'value' 		=> $main->item_data['content_id'],
            'help' 			=> 'Страница',
            'section_id'    => 3,
            'options' 		=> $main->parseOptionsFromTable('section_3'),
            'link'          => '/admin/?option=sections&suboption=edit_content&id=3&item=',
            'create_link'   => '/admin/?option=sections&suboption=content&action=create&id=3&structure_link_id=' . $_GET['id'] . '&structure_link_col_id=content_id'
        );

        $main->dataset['data'][11] = array(
            'meta'          => 'news_id',
            'type' 			=> 'select',
            'label' 		=> 'Новость',
            'name' 			=> 'content_id',
            'slave_of'      => 'mode',
            'value' 		=> $main->item_data['content_id'],
            'help' 			=> 'Новость',
            'section_id'    => 19,
            'options' 		=> $main->parseOptionsFromTable('section_19'),
            'link'          => '/admin/?option=sections&suboption=edit_content&id=19&item=',
            'create_link'   => '/admin/?option=sections&suboption=content&action=create&id=19&structure_link_id=' . $_GET['id'] . '&structure_link_col_id=content_id'
        );

        //Form separator
        $main->dataset['data'][12] = array(
            'type' 			=> 'separator',
            'name' 			=> 'seo_separator',
            'label' 		=> $main->getText('structure', 'form_seo_separator_label')
        );

        //Form title
        $main->dataset['data'][13] = array(
            'type' 			=> 'text',
            'label' 		=> $main->getText('structure', 'form_title_label'),
            'name' 			=> 'title',
            'value' 		=> $main->item_data['title'],
            'help' 			=> $main->getText('structure', 'form_title_help'),
            'default' 		=> false,
            'required'		=> false,
            'urlconversion' => false,
            'email' 		=> false
        );

        //Form description
        $main->dataset['data'][14] = array(
            'type' 			=> 'textarea',
            'label' 		=> $main->getText('structure', 'form_description_label'),
            'name' 			=> 'description',
            'value' 		=> $main->item_data['description'],
            'help' 			=> $main->getText('structure', 'form_description_help'),
            'use_editor'    => false,
            'typography' 	=> false,
            'rows' 			=> 3
        );

        //Form description
        $main->dataset['data'][15] = array(
            'type' 			=> 'textarea',
            'label' 		=> $main->getText('structure', 'form_keywords_label'),
            'name' 			=> 'keywords',
            'value' 		=> $main->item_data['keywords'],
            'help' 			=> $main->getText('structure', 'form_keywords_help'),
            'use_editor'    => false,
            'typography' 	=> false,
            'rows' 			=> 3
        );

        //Form save
        if($_POST){
            if(isset($_REQUEST['save']) or isset($_REQUEST['ok'])){
                $structure->updateNode(DB::quote($_GET['id']), $main->saveItem(DB::quote($_GET['id']), 'structure_data', $main->dataset, $_POST, true));

                if(isset($_REQUEST['ok'])){
                    header('Location: /admin/?option='.$main->module_name);
                };

                if(isset($_REQUEST['save'])){
                    header('Location: /admin/?option='.$main->module_name.'&suboption=edit&id='.$_GET['id']);
                };

            }else{
                header('Location: /admin/?option='.$main->module_name);
            };
        };
    };

    if($main->module_mode == 'tree' || $main->module_mode){
        //Set submenu
        $main->submenu = array(
            array(
                'name'   => $main->getText('structure', 'title_site_structure'),
                'active' => true
            ),
            array(
                'name'   => $main->getText('menu', 'title_menu'),
                'url'    => '/admin/?option=structure&suboption=menu'
            )
        );
    };

    if($main->module_mode == 'menu'){
        //Module classes
        require($_SERVER['DOCUMENT_ROOT'].'/admin/class/class.module_extender.php');
        require($_SERVER['DOCUMENT_ROOT'].'/admin/class/class.menu.php');
        $module = new Menu($main);

        $module->menu();

        //Page settings
        if($_GET['action'] == 'edit'){
            $main->title = $main->getText('menu', 'title_menu');
            $main->h1 = '<a href="/admin/?option=structure&suboption=menu">'.$main->getText('menu', 'title_menu').'</a> &rarr; '.$main->item_data['name'];
        }else{
            $main->title = $main->getText('menu', 'title_menu');
            $main->h1 = $main->getText('menu', 'title_menu');
        };

        //Set submenu
        $main->submenu = array(
            array(
                'name'   => $main->getText('structure', 'title_site_structure'),
                'url'    => '/admin/?option=structure&suboption=tree'
            ),
            array(
                'name'   => $main->getText('menu', 'title_menu'),
                'active' => true
            )
        );
    };

	//Operate items for AJAX
	if($_GET['ajax'] && $_GET['action']){
        if($_GET['action'] == 'checkurl'){
            print $structure->checkPartAJAX($main->item_data['id'], $main->item_data['pid'], DB::quote($_GET['part']));
        }else{
            $structure->operateNode(DB::quote($_GET['id']), $_GET['action'], DB::quote($_GET['pid']), DB::quote($_GET['data']));
        };

        $smarty->assign('module', $module);
	};

    switch($main->module_mode){
        //Add some JS and CSS
        case 'tree' : {
            array_push(
                $main->addition_js,
                '/admin/js/treeview.js'
            );
            array_push(
                $main->addition_css,
                '/admin/css/tree.css'
            );
        }; break;

        case 'edit' : {
            array_push(
                $main->addition_js,
                '/admin/js/checkboxes.js',
                '/admin/js/form.js',
                '/admin/redactor/redactor.js',
                '/admin/js/validate.js'
            );

            array_push(
                $main->addition_css,
                '/admin/css/checkboxes.css',
                '/admin/redactor/redactor.css'
            );
        }; break;
    };

	$smarty->assign('structure', $structure);
?>