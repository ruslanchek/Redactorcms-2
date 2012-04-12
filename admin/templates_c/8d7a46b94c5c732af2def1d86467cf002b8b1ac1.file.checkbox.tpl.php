<?php /* Smarty version Smarty 3.1.4, created on 2012-03-26 15:31:22
         compiled from "/Users/ruslan/Documents/sites/pincher/admin/templates/system/fields_editor/checkbox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12126844154f70538a85d854-33444995%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d7a46b94c5c732af2def1d86467cf002b8b1ac1' => 
    array (
      0 => '/Users/ruslan/Documents/sites/pincher/admin/templates/system/fields_editor/checkbox.tpl',
      1 => 1332571839,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12126844154f70538a85d854-33444995',
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
  'unifunc' => 'content_4f70538aa1fee',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f70538aa1fee')) {function content_4f70538aa1fee($_smarty_tpl) {?><?php if (!$_smarty_tpl->tpl_vars['default']->value){?>
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
			            <input class="textfield" type="text" value="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_checkbox');?>
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
    				<select name="default**__**<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>" id="default_<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>">
						<option value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['default']==0){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_edit_item_default_off');?>
</option>
						<option value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['default']==1){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_edit_item_default_on');?>
</option>
					</select>
    			</td>
    		</tr>
    		
    		<tr>
    			<td class="label_col">
    				<label for="list_<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_edit_item_list');?>
</label>
    			</td>
    			<td class="content_col">
    				<input type="checkbox" value="1" name="list**__**<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>" <?php if ($_smarty_tpl->tpl_vars['item']->value['list']=='1'){?>checked="checked"<?php }?> id="list_<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>" />
    			</td>
    		</tr>
    		
    	</table>

        <input type="hidden" value="checkbox" name="type**__**<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>" />
        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sort'];?>
" name="sort**__**<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>" rel="sort" />
        
        <div class="cl"></div>
	</fieldset>
</div><?php }} ?>