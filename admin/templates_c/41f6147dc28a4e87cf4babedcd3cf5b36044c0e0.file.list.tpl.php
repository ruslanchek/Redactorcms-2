<?php /* Smarty version Smarty 3.1.4, created on 2011-12-10 12:44:41
         compiled from "Z:/home/loc/redactorcms/admin/templates\system\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:201234ee32a09b50198-97215411%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41f6147dc28a4e87cf4babedcd3cf5b36044c0e0' => 
    array (
      0 => 'Z:/home/loc/redactorcms/admin/templates\\system\\list.tpl',
      1 => 1323510128,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201234ee32a09b50198-97215411',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
    'cols_count' => 0,
    'col' => 0,
    'item' => 0,
    'sections' => 0,
    'file' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4ee32a0a2d194',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ee32a0a2d194')) {function content_4ee32a0a2d194($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date')) include 'Z:\home\loc\redactorcms\smarty\plugins\modifier.date.php';
if (!is_callable('smarty_modifier_pluralform')) include 'Z:\home\loc\redactorcms\smarty\plugins\modifier.pluralform.php';
?><?php $_smarty_tpl->tpl_vars['cols_count'] = new Smarty_variable(6, null, 0);?>

<div class="list_table">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="<?php echo $_smarty_tpl->tpl_vars['main']->value->module_name;?>
_table" rel="<?php echo $_smarty_tpl->tpl_vars['main']->value->item_data['id'];?>
">
        <?php if ($_smarty_tpl->tpl_vars['main']->value->content_list){?>
        <thead>
            <tr>
                <th width="1%" align="center">
                    <input type="checkbox" class="checkbox" id="list_checkbox_master" autocomplete="off" />
                </th>

                <th width="1%" align="center">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['main']->value->getListSortingLink('id',true);?>
"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','colname_id');?>
</a>
                    <?php echo $_smarty_tpl->tpl_vars['main']->value->getListSortingArrow('id');?>

                </th>

                <th align="left">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['main']->value->getListSortingLink('name',true);?>
"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','colname_name');?>
</a>
                    <?php echo $_smarty_tpl->tpl_vars['main']->value->getListSortingArrow('name');?>

                </th>

                <?php  $_smarty_tpl->tpl_vars['col'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['col']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['main']->value->list_items; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['col']->key => $_smarty_tpl->tpl_vars['col']->value){
$_smarty_tpl->tpl_vars['col']->_loop = true;
?>
                    <?php $_smarty_tpl->tpl_vars['cols_count'] = new Smarty_variable($_smarty_tpl->tpl_vars['cols_count']->value+1, null, 0);?>
                    <th align="left">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['main']->value->getListSortingLink($_smarty_tpl->tpl_vars['col']->value['col_name']);?>
"><?php echo $_smarty_tpl->tpl_vars['col']->value['name'];?>
</a>
                        <?php echo $_smarty_tpl->tpl_vars['main']->value->getListSortingArrow($_smarty_tpl->tpl_vars['col']->value['col_name']);?>

                    </th>
                <?php } ?>

                <?php if (!$_smarty_tpl->tpl_vars['main']->value->vars['list_no_sortable']){?>
                <th width="1%" align="center">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['main']->value->getListSortingLink('sort',true);?>
"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','colname_sort');?>
</a>
                    <?php echo $_smarty_tpl->tpl_vars['main']->value->getListSortingArrow('sort');?>

                </th>
                <?php }?>

                <?php if (!$_smarty_tpl->tpl_vars['main']->value->vars['list_no_publish']){?>
                <th width="1%" align="left">
                    <span class="sort_arr_with_icon">
                        <?php echo $_smarty_tpl->tpl_vars['main']->value->getListSortingArrow('publish');?>

                    </span>
                    <a class="icon_action icon_hide_instance" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','show_item_help');?>
/<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','hide_item_help');?>
" href="<?php echo $_smarty_tpl->tpl_vars['main']->value->getListSortingLink('publish',true);?>
"></a>
                </th>
                <?php }?>

                <th width="1%"></th>
            </tr>
        </thead>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['main']->value->content_list){?>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['main']->value->content_list; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                <tr<?php if ($_smarty_tpl->tpl_vars['item']->value['publish']=='0'){?> class="unactive"<?php }?> iid="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                    <td align="center">
                        <input publish="<?php if ($_smarty_tpl->tpl_vars['item']->value['publish']=='1'){?>1<?php }else{ ?>0<?php }?>" iid="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="checkbox" name="item[<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
]" class="checkbox" autocomplete="off" />
                    </td>
                    <td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
                    <td align="left">
                        <a title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','edit_item_help');?>
" href="<?php echo $_smarty_tpl->tpl_vars['main']->value->content_list_edit_link;?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php if ($_GET['page']){?>&page=<?php echo $_GET['page'];?>
<?php }?>"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
                    </td>

                    <?php  $_smarty_tpl->tpl_vars['col'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['col']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['main']->value->list_items; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['col']->key => $_smarty_tpl->tpl_vars['col']->value){
$_smarty_tpl->tpl_vars['col']->_loop = true;
?>
                    <td>
                        <?php if ($_smarty_tpl->tpl_vars['col']->value['type']=='select'&&$_smarty_tpl->tpl_vars['col']->value['options_source']=='1'){?>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']]){?>
                                <?php echo $_smarty_tpl->tpl_vars['main']->value->getLisOptionNameById($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']],$_smarty_tpl->tpl_vars['col']->value['options_table']);?>

                            <?php }else{ ?>
                                <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','zero_selection');?>

                            <?php }?>

                        <?php }elseif($_smarty_tpl->tpl_vars['col']->value['type']=='select'&&$_smarty_tpl->tpl_vars['col']->value['options_source']=='0'){?>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']]){?>
                                <?php echo $_smarty_tpl->tpl_vars['main']->value->getLisOptionNameByArrayGiven($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']],$_smarty_tpl->tpl_vars['col']->value['options_custom']);?>

                            <?php }else{ ?>
                                <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','zero_selection');?>

                            <?php }?>

                        <?php }elseif($_smarty_tpl->tpl_vars['col']->value['type']=='multiselect'&&$_smarty_tpl->tpl_vars['col']->value['options_source']=='0'){?>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']]){?>
                                <?php echo $_smarty_tpl->tpl_vars['main']->value->getLisOptionsNamesByArrayGiven($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']],$_smarty_tpl->tpl_vars['col']->value['options_custom']);?>

                            <?php }else{ ?>
                                <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','zero_selection');?>

                            <?php }?>

                        <?php }elseif($_smarty_tpl->tpl_vars['col']->value['type']=='select'){?>
                            <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','zero_selection');?>


                        <?php }elseif($_smarty_tpl->tpl_vars['col']->value['type']=='color_picker'){?>
                            <span class="color_list_item" style="background-color: #<?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']];?>
;" title="#<?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']];?>
"></span>

                        <?php }elseif($_smarty_tpl->tpl_vars['col']->value['type']=='calendar'){?>
                            <span class="nowrap"><?php echo smarty_modifier_date($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']],'datetime');?>
</span>

                        <?php }elseif($_smarty_tpl->tpl_vars['col']->value['type']=='param'){?>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']]){?>
                                <?php if ($_smarty_tpl->tpl_vars['col']->value['prefix']){?><span class="prefix"><?php echo $_smarty_tpl->tpl_vars['col']->value['prefix'];?>
</span>&nbsp;<?php }?><span class="param"><?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']];?>
</span><?php if ($_smarty_tpl->tpl_vars['col']->value['suffix']){?>&nbsp;<span class="suffix"><?php echo $_smarty_tpl->tpl_vars['col']->value['suffix'];?>
</span><?php }?>
                            <?php }else{ ?>
                                <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','zero_selection');?>

                            <?php }?>

                        <?php }elseif($_smarty_tpl->tpl_vars['col']->value['type']=='multifile'){?>
                            <span class="nowrap">
                                <?php if ($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']]>0){?>
                                    <?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']];?>

                                    <?php echo smarty_modifier_pluralform($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']],array($_smarty_tpl->tpl_vars['main']->value->getText('list','files_plural_1'),$_smarty_tpl->tpl_vars['main']->value->getText('list','files_plural_3'),$_smarty_tpl->tpl_vars['main']->value->getText('list','files_plural_5')));?>

                                <?php }else{ ?>
                                    <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','zero_selection');?>

                                <?php }?>
                            </span>

                        <?php }elseif($_smarty_tpl->tpl_vars['col']->value['type']=='gallery'){?>
                            <span class="nowrap">
                                <?php if ($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']]>0){?>
                                    <?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']];?>

                                    <?php echo smarty_modifier_pluralform($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']],array($_smarty_tpl->tpl_vars['main']->value->getText('list','images_plural_1'),$_smarty_tpl->tpl_vars['main']->value->getText('list','images_plural_3'),$_smarty_tpl->tpl_vars['main']->value->getText('list','images_plural_5')));?>

                                <?php }else{ ?>
                                    <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','zero_selection');?>

                                <?php }?>
                            </span>

                        <?php }elseif($_smarty_tpl->tpl_vars['col']->value['type']=='file'){?>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']]>0){?>
                                <?php $_smarty_tpl->tpl_vars["file"] = new Smarty_variable($_smarty_tpl->tpl_vars['sections']->value->getRowFile($_smarty_tpl->tpl_vars['item']->value['id'],$_smarty_tpl->tpl_vars['main']->value->item_data['id'],$_smarty_tpl->tpl_vars['col']->value['col_name']), null, 0);?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['file']->value['path'];?>
<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
.<?php echo $_smarty_tpl->tpl_vars['file']->value['extension'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
.<?php echo $_smarty_tpl->tpl_vars['file']->value['extension'];?>
</a>
                            <?php }else{ ?>
                                <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','zero_selection');?>

                            <?php }?>
                            
                        <?php }elseif($_smarty_tpl->tpl_vars['col']->value['type']=='image'){?>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']]>0){?>
                                <?php $_smarty_tpl->tpl_vars["file"] = new Smarty_variable($_smarty_tpl->tpl_vars['main']->value->getRowImage($_smarty_tpl->tpl_vars['item']->value['id'],$_smarty_tpl->tpl_vars['main']->value->dataset['params']['table'],$_smarty_tpl->tpl_vars['col']->value['col_name']), null, 0);?>

                                <a class="list_image_holder" href="<?php echo $_smarty_tpl->tpl_vars['file']->value['path'];?>
<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
.<?php echo $_smarty_tpl->tpl_vars['file']->value['extension'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['file']->value['path'];?>
._thumb_list_<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
.<?php echo $_smarty_tpl->tpl_vars['file']->value['extension'];?>
" /></a>
                            <?php }else{ ?>
                                <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','zero_selection');?>

                            <?php }?>

                        <?php }elseif($_smarty_tpl->tpl_vars['col']->value['type']=='checkbox'){?>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']]==1){?>
                                <a mode="1" class="switcher switcher_on" href="javascript:void(0)" onclick="list.switchItemState($(this), '<?php echo $_smarty_tpl->tpl_vars['main']->value->content_list_table;?>
', '<?php echo $_smarty_tpl->tpl_vars['col']->value['col_name'];?>
', '<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
')"></a>
                            <?php }else{ ?>
                                <a mode="0" class="switcher switcher_off" href="javascript:void(0)" onclick="list.switchItemState($(this), '<?php echo $_smarty_tpl->tpl_vars['main']->value->content_list_table;?>
', '<?php echo $_smarty_tpl->tpl_vars['col']->value['col_name'];?>
', '<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
')"></a>
                            <?php }?>

                        <?php }elseif($_smarty_tpl->tpl_vars['col']->value['type']=='text'){?>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']]){?>
                                <?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']];?>

                            <?php }else{ ?>
                                <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','zero_selection');?>

                            <?php }?>

                        <?php }elseif($_smarty_tpl->tpl_vars['col']->value['type']=='url'){?>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']]){?>
                                <?php if ($_smarty_tpl->tpl_vars['col']->value['mode']==1){?>
                                    <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']];?>
</a>
                                <?php }else{ ?>
                                    <?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']];?>

                                <?php }?>
                            <?php }else{ ?>
                                <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','zero_selection');?>

                            <?php }?>
            
                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['col']->value['col_name']];?>


                        <?php }?>
                    </td>
                    <?php } ?>

                    <?php if (!$_smarty_tpl->tpl_vars['main']->value->vars['list_no_sortable']){?>
                    <td>
                        <div class="sorting">
                            <input iid="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sort'];?>
" maxlength="4" tabindex="<?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
" />
                            <div class="upndown">
                                <a class="icon_action icon_move_up_instance" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','up_help');?>
" href="javascript:void(0)" onclick="list.upItem('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['main']->value->content_list_up_link;?>
<?php echo $_smarty_tpl->tpl_vars['main']->value->item_data['id'];?>
')"></a>
                                <a class="icon_action icon_move_down_instance" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','down_help');?>
" href="javascript:void(0)" onclick="list.downItem('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['main']->value->content_list_up_link;?>
<?php echo $_smarty_tpl->tpl_vars['main']->value->item_data['id'];?>
')"></a>
                            </div>
                        </div>
                    </td>
                    <?php }?>

                    <?php if (!$_smarty_tpl->tpl_vars['main']->value->vars['list_no_publish']){?>
                    <td>
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['publish']=='0'){?>
                            <a class="icon_action icon_show_instance" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','show_item_help');?>
" href="<?php echo $_smarty_tpl->tpl_vars['main']->value->content_list_show_link;?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"></a>
                        <?php }else{ ?>
                            <a class="icon_action icon_hide_instance" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','hide_item_help');?>
" href="<?php echo $_smarty_tpl->tpl_vars['main']->value->content_list_hide_link;?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"></a>
                        <?php }?>
                    </td>
                    <?php }?>

                    <td>
                        <a class="icon_action icon_delete_instance" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','delete_item_help');?>
" href="javascript:void(0)" onclick="confirmMessage('<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','confirm_delete_text');?>
', '<?php echo $_smarty_tpl->tpl_vars['main']->value->content_list_delete_link;?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
')"></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        <?php }else{ ?>
        <tbody>
            <tr class="unactive empty">
                <td>&nbsp;</td>
                <td align="center" colspan="<?php echo $_smarty_tpl->tpl_vars['cols_count']->value-2;?>
"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','empty_list');?>
</td>
                <td>&nbsp;</td>
            </tr>
        </tbody>
        <?php }?>
    </table>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("system/pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">list.init('<?php echo $_smarty_tpl->tpl_vars['main']->value->item_data['id'];?>
')</script>

<?php }} ?>