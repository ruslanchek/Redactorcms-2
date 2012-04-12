<?php
	//Module classes
    require($_SERVER['DOCUMENT_ROOT'].'/admin/class/class.module_extender.php');
	require($_SERVER['DOCUMENT_ROOT'].'/admin/class/class.templates.php');
	$module = new Templates($main);

    if($_GET['ajax'] == 'true' && $_GET['action'] == 'generate_new_password'){
        $module->regeneratePassword($_GET['id']);
    };

    if($_GET['ajax'] == 'true' && $_GET['action'] == 'send_password'){
        $module->sendPassword();
    };

	if($main->module_mode == 'templates'){
        $module->templates();

        //Page settings
        if($_GET['action'] == 'edit'){
            $main->title = 'Шаблоны страниц';
            $main->h1 = '<a href="/admin/?option=templates&suboption=templates">Шаблоны страниц</a> &rarr; '.$main->item_data['name'];
        }else{
            $main->title = 'Шаблоны страниц';
            $main->h1 = 'Шаблоны страниц';
        };
	};

    array_push(
        $main->addition_js,
        '/admin/js/users.js'
    );

    $smarty->assign('module', $module);
?>