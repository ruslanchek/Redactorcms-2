<?php
	//Module classes
	require($_SERVER['DOCUMENT_ROOT'].'/admin/class/class.personal.php');
	$personal = new Personal($main, $login);

	//Get and set current mode
	if($_GET['suboption']){
		$main->module_mode = $_GET['suboption'];
			
		if($main->module_mode == 'settings'){
			$main->title = $main->getText('personal', 'title_edit_profile');
			$main->h1 = $main->title;
			$personal->getItemData($login->userdata['id']);
			
			//Form options
			$main->dataset['params']['enctype'] = 'application/x-www-form-urlencoded';
			$main->dataset['params']['method'] = 'POST';
			$main->dataset['params']['validate'] = true;
			$main->dataset['params']["no_ok_button"] = true;
				
			//Form name
			$main->dataset['data'][1] = array(
				'type' 			=> 'text',
				'label' 		=> $main->getText('personal', 'form_name_label'),
				'name' 			=> 'name',
				'value' 		=> $main->item_data['name'],
				'help' 			=> $main->getText('personal', 'form_name_help'),
				'default' 		=> $main->item_data['name'],
				'required'		=> true,
				'urlconversion' => false,
				'email'			=> false
			);
						
			//Form email
			$main->dataset['data'][4] = array(
				'type' 			=> 'text',
				'label' 		=> $main->getText('personal', 'form_email_label'),
				'name' 			=> 'email',
				'value' 		=> $main->item_data['email'],
				'help' 			=> $main->getText('personal', 'form_email_help'),
				'default' 		=> $main->item_data['email'],
				'required'		=> true,
				'urlconversion' => false,
				'email' 		=> true
			);
			
			//Form save
			if($_POST){
				if(isset($_REQUEST['save']) or isset($_REQUEST['ok'])){
					$main->saveItem($login->userdata['id'], $personal->table, $main->dataset, $_POST);
					
					if(isset($_REQUEST['ok'])){
						header('Location: /admin/');
					};
					
					if(isset($_REQUEST['save'])){
						header('Location: '.$_SERVER['HTTP_REFERER']);
					};
				}else{
					header('Location: '.$_SERVER['HTTP_REFERER']);
				};
			};
		};
		
		if($main->module_mode == 'password_change'){
			$main->title = $main->getText('personal', 'title_change_password');
			$main->h1 = $main->title;
			$personal->getItemData($login->userdata['id']);
			
			//Form options
			$main->dataset['params']['enctype'] = 'application/x-www-form-urlencoded';
			$main->dataset['params']['method'] = 'POST';
			$main->dataset['params']['validate'] = true;
			$main->dataset['params']["no_ok_button"] = true;

			//Form old pass
			$main->dataset['data'][0] = array(
				'type' 			=> 'password',
				'label' 		=> $main->getText('personal', 'form_old_password_label'),
				'name' 			=> 'old_password',
				'value' 		=> false,
				'help' 			=> $main->getText('personal', 'form_old_password_help'),
				'default' 		=> true,
				'required'		=> true
			);
			
			//Form separator
			$main->dataset['data'][1] = array(
				'type' 			=> 'separator',
				'name' 			=> 'newspassword_separator',
				'label' 		=> $main->getText('personal', 'form_old_password_help')
			);
						
			//Form new pass
			$main->dataset['data'][2] = array(
				'type' 			=> 'password',
				'label' 		=> $main->getText('personal', 'form_new_password_label'),
				'name' 			=> 'new_password',
				'value' 		=> false,
				'help' 			=> $main->getText('personal', 'form_new_password_help'),
				'default' 		=> $main->item_data['password'],
				'required'		=> true
			);
			
			//Form new pass again
			$main->dataset['data'][3] = array(
				'type' 			=> 'password',
				'label' 		=> $main->getText('personal', 'form_new_password_again_label'),
				'name' 			=> 'new_password_again',
				'value' 		=> false,
				'help' 			=> $main->getText('personal', 'form_new_password_again_help'),
				'default' 		=> $main->item_data['password'],
				'required'		=> true
			);
			
			//Form save
			if($_POST){
				if(isset($_REQUEST['save'])){
					$personal->changePassword($_POST);
				}else{
					header('Location: /admin/?option='.$main->module_name.'&suboption=password_change');
				};
			};
			
			//Check password ajaxly
			if($_GET['ajax'] == 'true' && $_GET['action'] == 'checkpassword' && $_GET['password']){
				print $personal->checkPassword(DB::quote($_GET['password']), 'string');
			};
		};
	};
	
    //Add some JS and CSS
	array_push(
	   $main->addition_js, 
	   '/admin/js/form.js',
	   '/admin/js/validate.js'
	);
    
	$smarty->assign('personal', $personal);
?>