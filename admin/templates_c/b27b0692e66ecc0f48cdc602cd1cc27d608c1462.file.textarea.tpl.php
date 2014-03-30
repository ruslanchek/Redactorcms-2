<?php /* Smarty version Smarty 3.1.4, created on 2014-02-05 15:41:37
         compiled from "/home/sdnadmin/site_new/admin/templates/system/fields_editor/textarea.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28709544052f2237192ee47-83057960%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b27b0692e66ecc0f48cdc602cd1cc27d608c1462' => 
    array (
      0 => '/home/sdnadmin/site_new/admin/templates/system/fields_editor/textarea.tpl',
      1 => 1391021811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28709544052f2237192ee47-83057960',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'default' => 0,
    'new' => 0,
    'item' => 0,
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52f22371acf6c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f22371acf6c')) {function content_52f22371acf6c($_smarty_tpl) {?><?php if (!$_smarty_tpl->tpl_vars['default']->value){?>
<a href="javascript:void(0)" class="icon_action icon_delete_instance" onclick="fieldsEditor.deleteField('<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>', '<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_delete_field_confirm');?>
', <?php if ($_smarty_tpl->tpl_vars['new']->value){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['main']->value->item_data['id'];?>
<?php }?>)" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_delete_field');?>
"></a>

<a href="javascript:void(0)" onclick="fieldsEditor.openCloseItemTools($(this))" class="expand_collapse expand" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_expand_collapse');?>
"></a>
<?php }?>

<div class="collapsable_fieldlist_item_tools">
	<fieldset>
		
		<table cellpadding="0" cellspacing="0" border="0" class="item_tools_table">
    		
    		<tr>
    			<td class="label_col">
    				<label for="label_<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_edit_item_label');?>
</label>
    			</td>
    			<td class="content_col">
    				<?php if ($_smarty_tpl->tpl_vars['new']->value){?>
			            <input class="textfield" type="text" value="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_textarea');?>
" name="label**__**<?php echo $_smarty_tpl->tpl_vars['new']->value;?>
" id="label_new_<?php echo $_smarty_tpl->tpl_vars['item']->value['new'];?>
" />
			        <?php }else{ ?>
			            <input class="textfield" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
" name="label**__**<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" id="label_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" />
			        <?php }?>
    			</td>
    		</tr>
    		
    		<tr>
    			<td class="label_col">
    				<label for="description_<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_edit_item_description');?>
</label>
    			</td>
    			<td class="content_col">
    				<input class="textfield" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
" name="description**__**<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>" id="description_<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>" />
    			</td>
    		</tr>
    		
    		<tr>
    			<td class="label_col">
    				<label for="default_<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_edit_item_default');?>
</label>
    			</td>
    			<td class="content_col">
    				<textarea name="default**__**<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>" id="default_<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>"><?php echo $_smarty_tpl->tpl_vars['item']->value['default'];?>
</textarea>
    			</td>
    		</tr>

            <input type="hidden" value="" name="rows**__**<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>" id="rows_<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>">
    		
    		<tr>
    			<td class="label_col">
    				<label for="use_editor_<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_edit_item_use_editor');?>
</label>
    			</td>
    			<td class="content_col">
    				<input type="checkbox" value="1" name="use_editor**__**<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>" <?php if ($_smarty_tpl->tpl_vars['item']->value['use_editor']=='1'){?>checked="checked"<?php }?> id="use_editor_<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>" />
    			</td>
    		</tr>

    	</table>

        <input type="hidden" value="textarea" name="type**__**<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>" />
        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sort'];?>
" name="sort**__**<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>" rel="sort" />
        
        <div class="cl"></div>
	</fieldset>
</div><?php }} ?>