<?php
    #error_reporting(E_ALL | E_STRICT);

    session_start();
    date_default_timezone_set('Europe/Moscow');

	$config = array(
		//Global vars
		'current_version'           => '2.24',
		'current_year'              => date('Y'),
		'locale'                    => 'ru_RU',

        //Admin system vars
		'counter'                   => false,
		'session_time'              => 60*30, #seconds

        //From this url admin interface will starts when going to /admin/ dir
        'start_location'            => '/admin/?option=sections',

		//Admin modules
		'admin_modules'             => array(
                                        //array('main',       'modules/module.main.php',      true),
                                        array('structure',  'modules/module.structure.php', true),
                                        array('sections',   'modules/module.sections.php',  true),
                                        //array('shop',       'modules/module.shop.php',      true),
                                        array('templates',  'modules/module.templates.php', true),
                                        array('users',      'modules/module.users.php',     true),
                                        array('config',     'modules/module.config.php',    true),

                                        array('personal',   'modules/module.personal.php',  false)
                                    ),

		//DB vars
		'db_host'                   => 'localhost',
		'db_base'                   => 'gts',
		'db_user'                   => 'root',
		'db_pass'                   => '123'
	);
?>