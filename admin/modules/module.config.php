<?php
	//Module classes
	require($_SERVER['DOCUMENT_ROOT'].'/admin/class/class.config.php');
	$module = new Config($main);

    if($main->module_mode == 'constants'){
        if($_GET['action'] == 'save_params'){
            $module->saveParams();
        };

        $main->submenu = array(
            array(
                'name'      => 'Основная настройка',
                'url'       => '/admin/?option=config'
            ),
            array(
                'name'      => 'Константы',
                'active'    => true
            )
        );

        $main->title = 'Константы';
        $main->h1 = 'Константы';


	}elseif(!$main->module_mode){
        $main->submenu = array(
            array(
                'name'      => 'Основная настройка',
                'active'    => true
            ),
            array(
                'name'      => 'Константы',
                'url'       => '/admin/?option=config&suboption=constants'
            )
        );

        $main->title = 'Основная настройка';
        $main->h1 = 'Основная настройка';
    };

    array_push(
        $main->addition_js,
        '/admin/js/checkboxes.js',
        '/admin/js/config.js'
    );

    array_push(
        $main->addition_css,
        '/admin/css/checkboxes.css'
    );

    $smarty->assign('module', $module);
?>