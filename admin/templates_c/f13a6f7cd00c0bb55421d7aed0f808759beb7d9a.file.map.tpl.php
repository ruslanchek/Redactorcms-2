<?php /* Smarty version Smarty 3.1.4, created on 2012-04-06 23:01:54
         compiled from "/Users/ruslan/Documents/sites/digitalbakery/admin/templates/system/form_fields/map.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15739892234f7ce3ecc28e50-48076406%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f13a6f7cd00c0bb55421d7aed0f808759beb7d9a' => 
    array (
      0 => '/Users/ruslan/Documents/sites/digitalbakery/admin/templates/system/form_fields/map.tpl',
      1 => 1333733877,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15739892234f7ce3ecc28e50-48076406',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f7ce3ecddb14',
  'variables' => 
  array (
    'main' => 0,
    'item' => 0,
    'sections' => 0,
    'markers' => 0,
    'i' => 0,
    'marker' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7ce3ecddb14')) {function content_4f7ce3ecddb14($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["markers"] = new Smarty_variable($_smarty_tpl->tpl_vars['sections']->value->getMarkers($_smarty_tpl->tpl_vars['main']->value->item_data['id'],$_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['id'],$_smarty_tpl->tpl_vars['item']->value['name']), null, 0);?>
<div class="item_block">
    <label class="label" for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</label>
    <input type="hidden" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['value'];?>
" />
    <div class="white_holder map_holder">
        <div class="map" id="map_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"></div>
        <div class="map_tools">
            <label>
                <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('gmaps','latitude');?>

                <input type="text" id="map_lat_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
            </label>

            <label>
                <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('gmaps','longitude');?>

                <input type="text" id="map_lng_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
            </label>

            <label>
                <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('gmaps','zoom');?>

                <input type="text" id="map_zoom_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
            </label>

            <input class="button" type="button" value="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('common','refresh');?>
" onclick="gmaps_edit.refreshData('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
')">

            <div class="add_marker">
                <a class="dashed" href="javascript:void(0)" onclick="gmaps_edit.newMarker('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
', '<?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['main']->value->item_data['id'];?>
')"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('gmaps','add_marker');?>
</a>
            </div>
        </div>
        <div class="cl"></div>

        <script type="text/javascript">
            gmaps_edit.init('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
');
            <?php  $_smarty_tpl->tpl_vars['marker'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['marker']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['markers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['marker']->key => $_smarty_tpl->tpl_vars['marker']->value){
$_smarty_tpl->tpl_vars['marker']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['marker']->key;
?>
                gmaps_edit.addMarker('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
', '<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['marker']->value['data'][0];?>
', '<?php echo $_smarty_tpl->tpl_vars['marker']->value['data'][1];?>
', '<?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
', '<?php echo $_smarty_tpl->tpl_vars['marker']->value['id'];?>
');
            <?php } ?>
        </script>

        <div class="related_list markers_list" rel="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" <?php if (!$_smarty_tpl->tpl_vars['markers']->value){?>style="display: none"<?php }?>>
            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <thead>
                    <tr>
                        <th width="1%"></th>
                        <th width="1%"></th>
                        <th width="1%"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('gmaps','latitude');?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('gmaps','longitude');?>
</th>
                        <th width="1%"></th>
                        <th width="1%"></th>
                    </tr>
                </thead>
                <tbody class="marker_stack" rel="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
                    <?php  $_smarty_tpl->tpl_vars['marker'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['marker']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['markers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['marker']->key => $_smarty_tpl->tpl_vars['marker']->value){
$_smarty_tpl->tpl_vars['marker']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['marker']->key;
?>
                    <tr class="marker_row" rel="<?php echo $_smarty_tpl->tpl_vars['marker']->value['id'];?>
">
                        <td align="center">
                            <?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>

                        </td>
                        <td>
                            <a class="icon_action icon_marker_instance" href="javascript:void(0)" onclick="gmaps_edit.focusMarker('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
', '<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
')"></a>
                        </td>
                        <td>
                            <span class="marker_lat nowrap" rel="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['marker']->value['data'][0];?>
</span>
                        </td>
                        <td>
                            <span class="marker_lng nowrap" rel="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['marker']->value['data'][1];?>
</span>
                        </td>
                        <td>
                            <a href="javascript:void(0)" class="icon_action icon_edit_instance" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('common','edit');?>
" onclick="gmaps_edit.editMarker('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
', '<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['marker']->value['id'];?>
')"></a>
                        </td>
                        <td>
                            <a href="javascript:void(0)" class="icon_action icon_delete_instance" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('common','delete');?>
" onclick="gmaps_edit.deleteMarker('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
', '<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['marker']->value['id'];?>
')"></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div><?php }} ?>