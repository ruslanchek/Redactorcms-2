<?php /* Smarty version Smarty 3.1.4, created on 2012-04-05 21:45:46
         compiled from "/var/www/fortyfour/data/www/digitalbakery.fortyfour.ru/admin/templates/modules/sections.edit_fields.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20346595004f7dda4a2c8c52-86575517%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c47e2b52d179a5c118e9c4e27d8f33f36abb56a4' => 
    array (
      0 => '/var/www/fortyfour/data/www/digitalbakery.fortyfour.ru/admin/templates/modules/sections.edit_fields.tpl',
      1 => 1333584922,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20346595004f7dda4a2c8c52-86575517',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
    'sections' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f7dda4aee0cb',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7dda4aee0cb')) {function content_4f7dda4aee0cb($_smarty_tpl) {?><div class="form">
    <form action="/admin/?option=sections&suboption=edit&id=<?php echo $_smarty_tpl->tpl_vars['main']->value->item_data['id'];?>
" method="POST" enctype="application/x-www-form-urlencoded" id="form" autocomplete="off">
        <div class="item_block">
            <label class="label" for="section_name" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','section_name_label_help');?>
"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','section_name_label_text');?>
</label>
            <input class="text required" type="text" id="section_name" name="section_name" value="<?php echo $_smarty_tpl->tpl_vars['main']->value->item_data['name'];?>
" tabindex="1" />
        </div>

		<script type="text/javascript">
			var errors = new Array();

		    errors['form_error_required'] 					= "<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections_list','add_item_empty_exist');?>
";
		    errors['form_error_new_section_name_remote'] 	= "<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections_list','add_item_exist');?>
";

		    <?php if ($_smarty_tpl->tpl_vars['main']->value->item_data['id']){?>
				var item_id = <?php echo $_smarty_tpl->tpl_vars['main']->value->item_data['id'];?>
;
			<?php }?>

		    
		    $.validator.setDefaults({
		        submitHandler: function() {
		            document.getElementById('form').submit();
		        }
		    });

		    jQuery.extend(jQuery.validator.messages, {
		        required: errors['form_error_required'],
		        remote: errors['form_error_new_section_name_remote']
		    });

			$(function(){
				$('#form').validate({
	                rules: {
	                    section_name: {
	                        remote: {
	                            url: "/admin/?option=sections&suboption=edit&ajax=true&action=checkname&id="+item_id,
	                            type: "GET",
	                            data: {
	                                name: function(){
	                                    return $('#section_name').val();
	                                }
	                            }
	                        }
	                    }
	                }
	            });
			});
			
		</script>

        <ul class="form_editor_items" id="sortable">
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sections']->value->getEditorFieldsList($_smarty_tpl->tpl_vars['main']->value->item_data['id']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['item']->key;
?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='checkbox'){?>
                    <li <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>class="item_embed"<?php }?>  id="field_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" colname="col_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" rel="checkbox">
                        <img class="form_tools_icons form_tools_icons_switch" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_checkbox');?>
" />
						<span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</span>

                        <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/checkbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('default'=>true), 0);?>

                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/checkbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                        <?php }?>
                    </li>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='text'){?>
                    <li <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>class="item_embed"<?php }?>  id="field_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" colname="col_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" rel="text">
                        <img class="form_tools_icons form_tools_icons_textfield" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_textfield');?>
" />
                        <span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</span>

                        <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/textfield.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('default'=>true), 0);?>

                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/textfield.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                        <?php }?>
                    </li>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='url'){?>
                    <li <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>class="item_embed"<?php }?>  id="field_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" colname="col_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" rel="url">
                        <img class="form_tools_icons form_tools_icons_url" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_url');?>
" />
                        <span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</span>

                        <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/url.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('default'=>true), 0);?>

                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/url.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                        <?php }?>
                    </li>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='tags'){?>
                    <li <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>class="item_embed"<?php }?>  id="field_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" colname="col_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" rel="text">
                        <img class="form_tools_icons form_tools_icons_tags" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_tools_icons_tags');?>
" />
                        <span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</span>

                        <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/tags.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('default'=>true), 0);?>

                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/tags.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                        <?php }?>
                    </li>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='slider'){?>
                    <li <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>class="item_embed"<?php }?>  id="field_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" colname="col_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" rel="slider">
                        <img class="form_tools_icons form_tools_icons_slider" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_tools_icons_slider');?>
" />
                        <span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</span>

                        <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/slider.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('default'=>true), 0);?>

                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/slider.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                        <?php }?>
                    </li>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='param'){?>
                    <li <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>class="item_embed"<?php }?>  id="field_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" colname="col_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" rel="param">
                    	<img class="form_tools_icons form_tools_icons_param" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_param');?>
" />
						<span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</span>

                    	<?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/param.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('default'=>true), 0);?>

                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/param.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                        <?php }?>
                    </li>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='textarea'){?>
                    <li <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>class="item_embed"<?php }?>  id="field_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" colname="col_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" rel="textarea">
                        <img class="form_tools_icons form_tools_icons_text_area" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_textarea');?>
" />
						<span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</span>

                        <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/textarea.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('default'=>true), 0);?>

                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/textarea.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                        <?php }?>
                    </li>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='select'){?>
                    <li <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>class="item_embed"<?php }?>  id="field_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" colname="col_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" rel="select">
                        <img class="form_tools_icons form_tools_icons_select" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_select');?>
" />
						<span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</span>

                        <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/select.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('default'=>true), 0);?>

                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/select.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                        <?php }?>
                    </li>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='multiselect'){?>
                    <li <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>class="item_embed"<?php }?>  id="field_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" colname="col_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" rel="multiselect">
                        <img class="form_tools_icons form_tools_icons_multiselect" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_multiselect');?>
" />
						<span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</span>

                        <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/multiselect.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('default'=>true), 0);?>

                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/multiselect.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                        <?php }?>
                    </li>
                <?php }?>

				<?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='color_picker'){?>
                    <li <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>class="item_embed"<?php }?>  id="field_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" colname="col_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" rel="color_picker">
                        <img class="form_tools_icons form_tools_icons_color_picker" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_color_picker');?>
" />
						<span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</span>

                        <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/color_picker.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('default'=>true), 0);?>

                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/color_picker.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                        <?php }?>
                    </li>
                <?php }?>

				<?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='calendar'){?>
                    <li <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>class="item_embed"<?php }?>  id="field_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" colname="col_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" rel="calendar">
                        <img class="form_tools_icons form_tools_icons_calendar" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_calendar');?>
" />
						<span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</span>

                        <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/calendar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('default'=>true), 0);?>

                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/calendar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                        <?php }?>
                    </li>
                <?php }?>

				<?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='file'){?>
                    <li <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>class="item_embed"<?php }?>  id="field_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" colname="col_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" rel="file">
                    	<img class="form_tools_icons form_tools_icons_file" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_file');?>
" />
						<span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</span>

                    	<?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/file.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('default'=>true), 0);?>

                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/file.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                        <?php }?>
                    </li>
                <?php }?>

				<?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='multifile'){?>
                    <li <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>class="item_embed"<?php }?>  id="field_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" colname="col_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" rel="multifile">
                    	<img class="form_tools_icons form_tools_icons_multifile" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_multifile');?>
" />
						<span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</span>

                    	<?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/file.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('default'=>true), 0);?>

                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/file.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                        <?php }?>
                    </li>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='image'){?>
                    <li <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>class="item_embed"<?php }?>  id="field_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" colname="col_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" rel="image">
                    	<img class="form_tools_icons form_tools_icons_image" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_image');?>
" />
						<span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</span>

                    	<?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('default'=>true), 0);?>

                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                        <?php }?>
                    </li>
                <?php }?>

				<?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='gallery'){?>
                    <li <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>class="item_embed"<?php }?>  id="field_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" colname="col_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" rel="gallery">
                    	<img class="form_tools_icons form_tools_icons_gallery" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_gallery');?>
" />
						<span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</span>

                    	<?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/gallery.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('default'=>true), 0);?>

                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/gallery.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                        <?php }?>
                    </li>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='map'){?>
                    <li <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>class="item_embed"<?php }?>  id="field_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" colname="col_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" rel="map">
                    	<img class="form_tools_icons form_tools_icons_map" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_map');?>
" />
						<span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</span>

                    	<?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/map.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('default'=>true), 0);?>

                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/map.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                        <?php }?>
                    </li>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='separator'){?>
                    <li <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>class="item_embed"<?php }?>  id="field_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" colname="col_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" rel="separator">
                        <img class="form_tools_icons form_tools_icons_splitter" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_splitter');?>
" />
						<span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</span>

                        <?php if ($_smarty_tpl->tpl_vars['item']->value['embed']=='1'){?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/splitter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('default'=>true), 0);?>

                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->getSubTemplate ("system/fields_editor/splitter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                        <?php }?>
                    </li>
                <?php }?>
            <?php } ?>
        </ul>

        <div class="buttons">
            <input class="button" type="submit" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_button_append_title');?>
" name="ok" value="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_button_append_text');?>
" />
            <input class="button" type="submit" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_button_save_title');?>
" name="save" value="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_button_save_text');?>
" />
        </div>
    </form>
</div><?php }} ?>