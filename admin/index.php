<?php
    // TODO : Проверить, как работает FILE, FILELIST и GALLERY в списке объектов

    //Time counter START
	$mtime = microtime(); 
	$mtime = explode(" ",$mtime); 
	$mtime = $mtime[1] + $mtime[0]; 
	$tstart = $mtime;
	
	//Load config
	require($_SERVER['DOCUMENT_ROOT'].'/config.php');
	
    //Utilities
    require($_SERVER['DOCUMENT_ROOT'].'/shared/class.utilities.php');
    
	//Smarty inits
	require($_SERVER['DOCUMENT_ROOT'].'/smarty/Smarty.class.php');
	$smarty = new Smarty;

	$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'].'/admin/templates/');
    $smarty->setCompileDir($_SERVER['DOCUMENT_ROOT'].'/admin/templates_c/');
    $smarty->setConfigDir($_SERVER['DOCUMENT_ROOT'].'/admin/configs/');
    $smarty->setCacheDir($_SERVER['DOCUMENT_ROOT'].'/admin/cache/');

	$smarty->force_compile = false;
	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->cache_lifetime = 120;
	
	//Database class
	require($_SERVER['DOCUMENT_ROOT'].'/shared/class.database.php');
	$db = new DB(
        $config['db_base'],
        $config['db_host'],
        $config['db_user'],
        $config['db_pass']
    );

    //Load images class
    include($_SERVER['DOCUMENT_ROOT'].'/admin/class/class.images.php');
	
	//Main class
	require($_SERVER['DOCUMENT_ROOT'].'/admin/class/class.main.php');
	$main = new Main($config, $db);
    
    //Upload
    require($_SERVER['DOCUMENT_ROOT'].'/admin/class/class.upload.php');
    $upload = new Upload();
	
	//Login class
	require($_SERVER['DOCUMENT_ROOT'].'/admin/class/class.login.php');
	$login = new Login($main);
	
	//Export main class to template
	$smarty->assign('main', $main);
	$smarty->assign('login', $login);
	
	//Initialize variables
	if(isset($_GET['action']) && $_GET['action'] == 'exit'){
		$login->exitUser();

	}else{
    	if($login->active){
			//Modules class
			require($_SERVER['DOCUMENT_ROOT'].'/admin/class/class.modules.php');
			$modules = new Modules($main->config['admin_modules']);
		
            if($_GET['ajax'] == 'true' && !$_GET['option']){
                switch($_GET['action']){
                    case 'search_tag'           : print $main->searchTag(DB::quote($_GET['q'])); break;
                    case 'check_presence'       : print $main->checkExistRow($_POST['table'], $_POST['col'], $_POST['value'], $_POST['id']); break;
                    case 'swithcer'             : print $main->switchItemParam(); break;
                    case 'delete_image'         : $main->deleteImage(); break;
                    case 'delete_file'          : $main->deleteFile(); break;
                    case 'apply_gallery_sort'   : $main->applyGallerySort(); break;
                    case 'save_fileinfo'        : $main->saveFileInfo(); break;
                    case 'get_fileinfo'         : $main->getFileInfo(); break;
                };
            }else{
                switch($_GET['action']){
                    case 'upload' : {
                        if($_GET['upload_method'] == 'qq'){
                            require($_SERVER['DOCUMENT_ROOT'].'/admin/class/class.uploadfile.php');
                        }else{
                            $upload->upload(
                                $_FILES,
                                $login->active,
                                $_GET['type']
                            );
                        };
                    }; break;

                    case 'typo' : {
                        $html = stripslashes(urldecode($_POST['redactor']));
                        
                        require($_SERVER['DOCUMENT_ROOT'].'/admin/class/class.typograph.php');
                        $typo = new Typographus('UTF-8');
	                    print $typo->process($html);
                    }; break;

                    case 'swithcer' : print $main->switchItemParam(); break;

                    default : {
                        //Show module
                        if($module = $modules->showModule($_GET['option'])){
                            $main->module_name = $module[0];
                            require($module[1]);
                        }elseif(!$_GET['option']){
                            header('Location: '.$main->config['start_location']);
                        }else{
                            die('Access denied!');
                        };
                    };
                };
            };

		}else{
			require($_SERVER['DOCUMENT_ROOT'].'/admin/login.php');
		};
	};
    
	//Smarty template
	if(!$_GET['ajax'] && $_GET['action'] != 'upload' && $_GET['action'] != 'typo'){
		$smarty->display($main->template);
			
		//Time counter END
		$mtime = microtime();
		$mtime = explode(" ",$mtime); 
		$mtime = $mtime[1] + $mtime[0]; 
		$tend = $mtime; 
		$totaltime = ($tend - $tstart);
		if($main->config['counter']){
			print("<div style='opacity: 0.6; padding: 5px; background: white; position: fixed; top: 0; right: 0; font-size: 11px; font-family: arial'>".$totaltime."</div>"); 
		};
	}else{
	    $smarty->display('system/ajax.tpl');
	};
?>
