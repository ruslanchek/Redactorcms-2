<?php
	//Module classes
    require($_SERVER['DOCUMENT_ROOT'].'/admin/class/class.module_extender.php');
	require($_SERVER['DOCUMENT_ROOT'].'/admin/class/class.users.php');
	$module = new Users($main);

    if($_GET['ajax'] == 'true' && $_GET['action'] == 'generate_new_password'){
        switch($_GET['suboption']){
            case 'system_users' : {
                $table = 'users';
            }; break;

            case 'public_users' : {
                $table = 'public_users';
            }; break;
        };

        print $module->regeneratePassword($_GET['id'], $table);
        die();
    };

    if($_GET['ajax'] == 'true' && $_GET['action'] == 'send_password'){
        $module->sendPassword();
    };

	if($main->module_mode == 'system_users'){
        $module->systemUsers();

        //Set submenu
        $main->submenu = array(
            array(
                'name'   => $main->getText('users', 'system_users_list'),
                'active' => true
            ),
            array(
                'name'   => $main->getText('users', 'public_users_list'),
                'url'    => '/admin/?option=users&suboption=public_users'
            ),
            array(
                'name'   => $main->getText('users', 'groups_list'),
                'url'    => '/admin/?option=users&suboption=groups'
            )
        );

        //Page settings
        if($_GET['action'] == 'edit'){
            $main->title = $main->getText('users', 'system_users_list');
            $main->h1 = '<a href="/admin/?option=users&suboption=system_users">'.$main->getText('users', 'system_users_list').'</a> &rarr; '.$main->item_data['name'];
        }else{
            $main->title = $main->getText('users', 'system_users_list');
            $main->h1 = $main->getText('users', 'system_users_list');
        };
	};

    if($main->module_mode == 'public_users'){
        $module->publicUsers();

        //Set submenu
        $main->submenu = array(
            array(
                'name'   => $main->getText('users', 'system_users_list'),
                'url'    => '/admin/?option=users&suboption=system_users'
            ),
            array(
                'name'   => $main->getText('users', 'public_users_list'),
                'active'  => true
            ),
            array(
                'name'   => $main->getText('users', 'groups_list'),
                'url'    => '/admin/?option=users&suboption=groups'
            )
        );

        //Page settings
        if($_GET['action'] == 'edit'){
            $main->title = $main->getText('users', 'public_users_list');
            $main->h1 = '<a href="/admin/?option=users&suboption=public_users">'.$main->getText('users', 'public_users_list').'</a> &rarr; '.$main->item_data['name'];
        }else{
            $main->title = $main->getText('users', 'public_users_list');
            $main->h1 = $main->getText('users', 'public_users_list');
        };
	};

    if($main->module_mode == 'groups'){
        $module->groups();

        //Set submenu
        $main->submenu = array(
            array(
                'name'   => $main->getText('users', 'system_users_list'),
                'url'    => '/admin/?option=users&suboption=system_users'
            ),
            array(
                'name'   => $main->getText('users', 'public_users_list'),
                'url'    => '/admin/?option=users&suboption=public_users'
            ),
            array(
                'name'   => $main->getText('users', 'groups_list'),
                'active' => true
            )
        );

        //Page settings
        if($_GET['action'] == 'edit'){
            $main->title = $main->getText('users', 'groups_list');
            $main->h1 = '<a href="/admin/?option=users&suboption=groups">'.$main->getText('users', 'groups_list').'</a> &rarr; '.$main->item_data['name'];
        }else{
            $main->title = $main->getText('users', 'groups_list');
            $main->h1 = $main->getText('users', 'groups_list');
        };
	};


    array_push(
        $main->addition_js,
        '/admin/js/users.js'
    );

    $smarty->assign('module', $module);
?>