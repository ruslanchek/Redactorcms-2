<?php
	//Module classes
    require($_SERVER['DOCUMENT_ROOT'].'/admin/class/class.module_extender.php');
	require($_SERVER['DOCUMENT_ROOT'].'/admin/class/class.shop.php');
	$module = new Shop($main);


	if($main->module_mode == 'goods'){
        $module->goods();

        //Set submenu
        $main->submenu = array(
            array(
                'name'   => 'Товары',
                'active' => true
            ),
            array(
                'name'   => 'Категории товаров',
                'url'    => '/admin/?option=shop&suboption=categories'
            ),
            array(
                'name'   => 'Параметры',
                'url' => '/admin/?option=shop&suboption=parameters'
            )
        );

        //Page settings
        if($_GET['action'] == 'edit'){
            $main->title = 'Товары';
            $main->h1 = '<a href="/admin/?option=shop&suboption=goods">Товары</a> &rarr; '.$main->item_data['name'];
        }else{
            $main->title = 'Товары';
            $main->h1 = 'Товары';
        };
	};

    if($main->module_mode == 'categories'){
        $module->categories();

        //Set submenu
        $main->submenu = array(
            array(
                'name'   => 'Товары',
                'url'    => '/admin/?option=shop&suboption=goods'
            ),
            array(
                'name'   => 'Категории товаров',
                'active'    => true
            ),
            array(
                'name'   => 'Параметры',
                'url' => '/admin/?option=shop&suboption=parameters'
            )
        );

        //Page settings
        if($_GET['action'] == 'edit'){
            $main->title = 'Категории товаров';
            $main->h1 = '<a href="/admin/?option=shop&suboption=categories">Категории товаров</a> &rarr; '.$main->item_data['name'];
        }else{
            $main->title = 'Категории товаров';
            $main->h1 = 'Категории товаров';
        };
	};

    if($main->module_mode == 'parameters'){
        //$module->parameters();

        //Set submenu
        $main->submenu = array(
            array(
                'name'   => 'Товары',
                'url'    => '/admin/?option=shop&suboption=goods'
            ),
            array(
                'name'   => 'Категории товаров',
                'url'    => '/admin/?option=shop&suboption=categories'
            ),
            array(
                'name'   => 'Параметры',
                'active' => true
            )
        );

        //Page settings
        if($_GET['action'] == 'edit'){
            $main->title = 'Параметры';
            $main->h1 = '<a href="/admin/?option=shop&suboption=parameters">Параметры</a> &rarr; '.$main->item_data['name'];
        }else{
            $main->title = 'Параметры';
            $main->h1 = 'Параметры';
        };
	};

    array_push(
        $main->addition_js,
        '/admin/js/shop.js'
    );

    $smarty->assign('module', $module);
?>