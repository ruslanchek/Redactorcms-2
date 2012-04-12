<?php
	//Module settings
	$main->module_name = 'login';
	$main->title = $main->getText('login', 'title_authorization');
	$main->template = "login.tpl";
	$main->module_mode = 'auth';
	
	if($_GET['action'] == 'login'){
		$login->login();
	};
?>