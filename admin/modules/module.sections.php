<?php
	//Module classes
	require($_SERVER['DOCUMENT_ROOT'].'/admin/class/class.sections.php');
	$sections = new Sections($main, $login);

	//Get and set current mode
	if(!$_GET['suboption']){
		$main->module_mode = 'list';
	}else{
		$main->module_mode = $_GET['suboption'];
	};

	//Show list
	if($main->module_mode == 'list'){
	    $main->title = $main->getText('sections', 'title_sections_list');
        $main->h1 = $main->getText('sections', 'title_sections_list');
        $main->addition_menu = true;
        
        $main->new_item_link = '/admin/?option=sections&suboption='.$main->module_mode.'&action=create';
        
        //Delete section
        if($_GET['action'] == 'delete'){
            if($sections->deleteSection(DB::quote($_GET['id']))){
                header('Location: /admin/?option=sections&suboption=list');
            };
        };
        
        //Create item
        if($_GET['action'] == 'create'){
            $id = $sections->createSection();

            if($id){
                header('Location: /admin/?option=sections&suboption=edit&id='.$id);
            }else{
                header('Location: /admin/?option=sections&suboption=list');
            };
        };
        
        //Check new section name ajaxly
        if($_GET['ajax'] && $_GET['action'] == 'checkname' && $_GET['name']){
            print $sections->checkExistSection(DB::quote($_GET['name']), 'string');
        };
	};
    
    //Edit item
    if($main->module_mode == 'edit'){
        $sections->getItemData(DB::quote($_GET['id']));

        $main->title = $main->getText('sections', 'title_sections_edit');
        $main->h1 = '<a href="/admin/?option=sections&suboption=list">'.$main->getText('sections', 'title_sections_list').'</a> &rarr; <em>'.$main->item_data['name'].'</em>';
        
        //Form save
        if($_POST){
            $avp = '';

            if(isset($_REQUEST['save']) or isset($_REQUEST['ok'])){
                $sections->saveFormFields($_POST);
                
                if(isset($_REQUEST['ok'])){
                    header('Location: /admin/?option='.$main->module_name.$avp);
                };
                
                if(isset($_REQUEST['save'])){
                    header('Location: /admin/?option=sections&suboption=edit&id='.$_GET['id'].$avp);
                };
            }else{
                header('Location: /admin/?option='.$main->module_name.$avp);
            };
        };
        
        //Get fields editor item tools
        if($_GET['ajax'] && $_GET['action'] == 'load_field_item_tools' && $_GET['item_name']){
            $main->ajax_content = 'include';
            $smarty->assign('ajax_include', 'system/fields_editor/'.$_GET['item_name'].'.tpl');
        };

        //Delete field item
        if($_GET['ajax'] && $_GET['action'] == 'delete_file_item' && $_GET['id'] && $_GET['section_id']){
            $sections->deleteFieldItem(DB::quote($_GET['id']), DB::quote($_GET['section_id']));
        };
                
        //Check section name ajaxly
        if($_GET['ajax'] && $_GET['action'] == 'checkname' && $_GET['name'] && $_GET['id']){
            print $sections->checkExistSection(DB::quote($_GET['name']), 'string', DB::quote($_GET['id']));
        };

        //Set submenu
        $main->submenu = array(
            array(
                'name'   => $main->getText('sections', 'title_sections_content_list'),
                'url'    => '/admin/?option=sections&suboption=content&id='.$main->item_data['id']
            ),
            array(
                'name'   => $main->getText('sections', 'title_sections_edit'),
                'active' => true
            )
        );
    };
    
    //List content
    if($main->module_mode == 'content'){
        if($_GET['action'] == 'export'){
            $sections->exportContent($_GET['id']);
            exit;
        };

        if($_GET['action'] == 'import'){
            $sections->importContent($_GET['id']);
            //header('Location:'.Utilities::getParamstring('action'));
        };

        //Set per page cookie
        if(isset($_GET['limit'])){
            $sections->setPerPage(intval($_GET['limit']));
        }else if($_COOKIE['sections_list_per_page_limit']){
            $sections->per_page = intval($_COOKIE['sections_list_per_page_limit']);
        };

        $main->current_per_page = $sections->per_page;

        //Search items
        if(isset($_GET['content_search'])){
            $sections->searchContentItem(DB::quote($_GET['content_search']));
        };
        
        $sections->getItemData(DB::quote($_GET['id']));

        $main->title = $main->getText('sections', 'title_sections_content_list');
        $main->h1 = '<a href="/admin/?option=sections&suboption=list">'.$main->getText('sections', 'title_sections_list').'</a>'.' &rarr; <em>'.$main->item_data['name'].'</em>';

        
        $main->content_list_delete_link     =   Utilities::getParamstring('action,item_id').'&action=delete&item_id=';
        $main->content_list_show_link       =   Utilities::getParamstring('action,item_id').'&action=show&item_id=';
        $main->content_list_hide_link       =   Utilities::getParamstring('action,item_id').'&action=hide&item_id=';
        $main->content_list_edit_link       =   '/admin/?option=sections&suboption=edit_content&id='.$main->item_data['id'].'&item=';
        $main->new_item_link                =   '/admin/?option=sections&suboption=content&id='.$main->item_data['id'].'&action=create';
        $main->content_list_up_link         =   Utilities::getParamstring('action,item_id').'&action=up&item_id=';
        $main->content_list_down_link       =   Utilities::getParamstring('action,item_id').'&action=down&item_id=';
        $main->content_list_table           =   'section_'.$main->item_data['id'];
        $main->export_link                  =   Utilities::getParamstring('action').'action=export';
        $main->import_link                  =   Utilities::getParamstring('action').'action=import';
        $main->content_list_copy_link       =   Utilities::getParamstring('action,item_id').'action=copy&item_id=';

   
        $sections->prepareContentListData();

        //Up content list item
        if($_GET['action'] == 'up' || $_GET['action'] == 'down'){
        	$sections->upndownContentListRow(
                intval($_GET['row_id']),
                intval($_GET['target_id']),
                intval($_GET['row_value']),
                intval($_GET['target_value'])
            );
        };

        if(isset($_GET['action']) && strlen($_GET['action']) > 0){
            switch($_GET['action']){
                case 'copy' : {
                    $id = $sections->copyContentListRow(intval($_GET['item_id']));
                    header('Location: '.$main->content_list_edit_link.$id);
                }; break;

                //Delete content list item
                case 'delete' : {
                    $sections->deleteContentListRow(intval($_GET['item_id']));
                    header('Location: '.Utilities::getParamstring('action,item_id'));
                }; break;

                //Show content list item
                case 'show' : {
                    $sections->showContentListRow(intval($_GET['item_id']));
        	        header('Location: '.Utilities::getParamstring('action,item_id'));
                }; break;

                //Hide content list item
                case 'hide' : {
                    $sections->hideContentListRow(intval($_GET['item_id']));
        	        header('Location: '.Utilities::getParamstring('action,item_id'));
                }; break;

                //Multiple action on the content list items
                case 'multiple' : {
                    print $sections->doMultipleAction($_GET['operation'], DB::quote($_GET['items']));
                }; break;

                case 'switch_state' : {
                    $sections->switchContentListRowState(
                        intval($_GET['id']),
                        intval($_GET['item_id']),
                        DB::quote($_GET['colname']),
                        intval($_GET['state'])
                    );
                }; break;

                //Create item
                case 'create' : {
                    $id = $sections->createContentItem($main->item_data['id']);

                    $avp = '';

                    if($_GET['ajax_viewport'] == 'true'){
                        $avp = '&ajax_viewport=true';
                    };

                    if($id){
                        header('Location: /admin/?option=sections&suboption=edit_content&id='.$main->item_data['id'].'&item='.$id.$avp);
                    }else{
                        header('Location: /admin/?option=sections&suboption='.$main->module_mode.'&id='.$main->item_data['id'].$avp);
                    };
                }; break;
            }
        };
        
        //Get search result
        if($_GET['ajax'] && $_GET['action'] == 'autocomplete_search' && $_GET['q'] && $_GET['id']){
            print $sections->autocompleteSearch(DB::quote($_GET['q']), DB::quote($_GET['id']));
        };

        //Set submenu
        $main->submenu = array(
            array(
                'name'   => $main->getText('sections', 'title_sections_content_list'),
                'active' => true
            ),
            array(
                'name'   => $main->getText('sections', 'title_sections_edit'),
                'url'    => '/admin/?option=sections&suboption=edit&id='.$main->item_data['id']
            )
        );
    };

    //Edit content item
    if($main->module_mode == 'edit_content'){
        $avp = '';

        if($_GET['ajax_viewport'] == 'true'){
            $avp = '&ajax_viewport=true';
        };

        if(isset($_GET['page'])){
            $page = '&page='.$_GET['page'];
        };

    	$sections->getItemData(DB::quote($_GET['id']));
        $main->dataset = $sections->getContentItemData($main->item_data['id'], DB::quote($_GET['item']));

    	$main->title = $main->getText('sections', 'title_sections_content_list_item_edit');
        $main->h1 = '
            <a href="/admin/?option=sections&suboption=list">'.$main->getText('sections', 'title_sections_list').'</a> 
            &rarr;
            <a href="/admin/?option=sections&suboption=content&id='.$main->item_data['id'].$page.'">'.$main->item_data['name'].'</a>
            &rarr; <em>'.$main->dataset['params']['item_params']['name'].'</em>
        ';

        //Form save
        if($_POST){
            if(isset($_REQUEST['save']) or isset($_REQUEST['ok'])){
                $main->dataset['params']['user_id'] = $sections->login->userdata['id'];
                $main->saveItem($main->dataset['params']['item_params']['id'], 'section_'.$main->item_data['id'], $main->dataset, $_POST, false, true);
                
                if(isset($_REQUEST['ok']) && $avp == ''){
                    header('Location: /admin/?option=sections&suboption=content&id='.$main->item_data['id'].$page);
                }else{
                    header('Location: /admin/?option=sections&suboption='.$main->module_mode.'&id='.$main->item_data['id'].'&item='.$main->dataset['params']['item_params']['id'].$page.$avp);
                };
            }else{
                header('Location: /admin/?option=sections&suboption=content&id='.$main->item_data['id']);
            };
        };

        //Set submenu
        $main->submenu = array(
            array(
                'name'   => $main->getText('sections', 'title_sections_content_list'),
                'url'    => '/admin/?option=sections&suboption=content&id='.$main->item_data['id']
            ),
            array(
                'name'   => $main->getText('sections', 'title_sections_edit'),
                'url'    => '/admin/?option=sections&suboption=edit&id='.$main->item_data['id']
            )
        );



        $main->dataset['params']['form_action'] = '/admin/?option=sections&suboption=edit_content&id=' . $main->item_data['id'] . '&item=' . $main->dataset['params']['item_params']['id'] . $avp;
    };

    //Module actions
    switch($_GET['action']){
        //Delete content file
        case 'delete_file' : {
            $sections->deleteFile(intval($_GET['file_id']));
        }; break;

        //Add marker
        case 'add_marker' : {
            print $sections->addMarker(
                DB::quote($_GET['data']),
                intval($_GET['relative_id']),
                intval($_GET['section_id']),
                DB::quote($_GET['form_item'])
            );
        }; break;

        //Delete marker
        case 'delete_marker' : {
            $sections->deleteMarker(
                intval($_GET['id'])
            );
        }; break;

        //Refresh marker
        case 'refresh_marker' : {
            $sections->refreshMarker(
                DB::quote($_GET['data']),
                intval($_GET['id'])
            );
        }; break;

        //Get marker params
        case 'get_marker_params' : {
            print $sections->getMarkerParams(
                intval($_GET['id'])
            );
        }; break;

        //Set marker params
        case 'set_marker_params' : {
            $sections->setMarkerParams(
                DB::quote($_POST['name']),
                DB::quote($_POST['desc']),
                intval($_POST['id'])
            );
        }; break;
    };

	//Add some JS and CSS
    switch($main->module_mode){
        case 'list' : {
            array_push(
                $main->addition_js,
                '/admin/js/form.js',
                '/admin/js/validate.js',
                '/admin/js/sections_actions.js'
            );
        }; break;

        case 'content' : {
            array_push(
                $main->addition_js,
                '/admin/js/form.js',
                '/admin/js/validate.js',
                '/admin/js/sections_actions.js',
                '/admin/js/tablesorter.js',
                '/admin/js/list.js',
                '/admin/js/autocomplete.js'
            );

            array_push(
                $main->addition_css,
                '/admin/css/autocomplete.css'
            );
        }; break;

        case 'edit' : {
            array_push(
                $main->addition_js,
                'http://maps.google.com/maps/api/js?sensor=false',
                '/admin/js/colorpicker.js',
                '/admin/js/validate.js',
                '/admin/js/ui.js',
                '/admin/js/highlight.pack.js',
                '/admin/js/sections_actions.js'
            );

            array_push(
                $main->addition_css,
                '/admin/css/colorpicker.css',
                '/admin/css/highlight.css'
            );
        }; break;

        case 'edit_content' : {
            array_push(
                $main->addition_js,
                'http://maps.google.com/maps/api/js?sensor=false',
                '/admin/js/checkboxes.js',
                '/admin/js/colorpicker.js',
                '/admin/js/calendar.js',
                '/admin/js/uploader.js',
                '/admin/js/mask.js',
                '/admin/js/form.js',
                '/admin/js/ui.js',
                '/admin/js/sections_actions.js',
                '/admin/js/validate.js',
                '/admin/redactor/redactor.js',
                '/admin/js/autocomplete.js',
                '/admin/js/tagsinput.js'
            );

            array_push(
                $main->addition_css,
                '/admin/css/checkboxes.css',
                '/admin/css/colorpicker.css',
                '/admin/css/calendar.css',
                '/admin/css/uploader.css',
                '/admin/redactor/redactor.css',
                '/admin/css/autocomplete.css',
                '/admin/css/tagsinput.css'
            );
        }; break;
    };

	$smarty->assign('sections', $sections);
?>