<?php /* Smarty version Smarty 3.1.4, created on 2012-04-05 21:45:48
         compiled from "/var/www/fortyfour/data/www/digitalbakery.fortyfour.ru/admin/templates/system/fields_editor/map.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3044177294f7dda4cc52498-14684361%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b159086d3621de27e1b861f078934e966e2e5bc' => 
    array (
      0 => '/var/www/fortyfour/data/www/digitalbakery.fortyfour.ru/admin/templates/system/fields_editor/map.tpl',
      1 => 1333584926,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3044177294f7dda4cc52498-14684361',
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
  'unifunc' => 'content_4f7dda4d18a14',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7dda4d18a14')) {function content_4f7dda4d18a14($_smarty_tpl) {?><?php if (!$_smarty_tpl->tpl_vars['default']->value){?>
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
    <input class="map_relation" type="hidden" rel="<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>">
    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['default'];?>
" name="default**__**<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>" id="default_<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>" />
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
			            <input class="textfield" type="text" value="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_map');?>
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
<?php }?>"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_edit_item_map_defaults');?>
</label>
    			</td>
    			<td class="content_col">
                    <div class="white_holder map_holder">
                        <div class="map" id="map_<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>"></div>
                        <div class="map_tools">
                        <label>
                            <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('gmaps','latitude');?>

                            <input autocomplete="off" type="text" id="map_lat_<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>">
                        </label>

                        <label>
                            <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('gmaps','longitude');?>

                            <input autocomplete="off" type="text" id="map_lng_<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>">
                        </label>

                        <label>
                            <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('gmaps','zoom');?>

                            <input autocomplete="off" type="text" id="map_zoom_<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>">
                        </label>

                        <input class="button" type="button" value="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('common','refresh');?>
" onclick="gmaps.refreshData('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
')">
                    </div>
                    </div>
                    <script type="text/javascript">
                        gmaps.init('<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>');
                    </script>
    			</td>
    		</tr>    		
    	</table>

        <input type="hidden" value="map" name="type**__**<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>" />
        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sort'];?>
" name="sort**__**<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>" rel="sort" />
    </fieldset>
</div><?php }} ?>