<?php
	//Module classes
	require($_SERVER['DOCUMENT_ROOT'].'/admin/class/class.config.php');
	$module = new Config($main);

    if($_GET['action'] == 'save_params'){
        $module->saveParams();
    };

    $main->title = 'Константы';
    $main->h1 = 'Константы';


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