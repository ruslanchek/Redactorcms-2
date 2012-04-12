<?php /* Smarty version Smarty 3.1.4, created on 2012-04-07 00:16:04
         compiled from "/Users/ruslan/Documents/sites/digitalbakery/admin/templates/system/form_fields/file.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1075568284f7f4f04597934-96597838%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9259099b565230934ddfe7966610e0d16f9a113' => 
    array (
      0 => '/Users/ruslan/Documents/sites/digitalbakery/admin/templates/system/form_fields/file.tpl',
      1 => 1333733877,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1075568284f7f4f04597934-96597838',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
    'main' => 0,
    'extension' => 0,
    'filelist' => 0,
    'file' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f7f4f047e313',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7f4f047e313')) {function content_4f7f4f047e313($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date')) include '/Users/ruslan/Documents/sites/digitalbakery/smarty/plugins/modifier.date.php';
if (!is_callable('smarty_modifier_filesize')) include '/Users/ruslan/Documents/sites/digitalbakery/smarty/plugins/modifier.filesize.php';
?><?php $_smarty_tpl->tpl_vars["filelist"] = new Smarty_variable($_smarty_tpl->tpl_vars['main']->value->getFilesList(0,$_smarty_tpl->tpl_vars['item']->value['name'],$_smarty_tpl->tpl_vars['main']->value->dataset['params']['table'],$_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['id']), null, 0);?>

<div class="item_block">
     <label class="label" for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
">
        <?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>

        <em>
            <?php  $_smarty_tpl->tpl_vars['extension'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['extension']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['extensions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['extension']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['extension']->iteration=0;
 $_smarty_tpl->tpl_vars['extension']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['extension']->key => $_smarty_tpl->tpl_vars['extension']->value){
$_smarty_tpl->tpl_vars['extension']->_loop = true;
 $_smarty_tpl->tpl_vars['extension']->iteration++;
 $_smarty_tpl->tpl_vars['extension']->index++;
 $_smarty_tpl->tpl_vars['extension']->first = $_smarty_tpl->tpl_vars['extension']->index === 0;
 $_smarty_tpl->tpl_vars['extension']->last = $_smarty_tpl->tpl_vars['extension']->iteration === $_smarty_tpl->tpl_vars['extension']->total;
?>
                <?php if ($_smarty_tpl->tpl_vars['extension']->first){?>(<?php }?><?php echo $_smarty_tpl->tpl_vars['extension']->value['value'];?>
<?php if (!$_smarty_tpl->tpl_vars['extension']->last){?>, <?php }else{ ?>)<?php }?>
            <?php } ?>
        </em>
    </label>

    <div class="cl"></div>

    <div class="upload_tools" <?php if ($_smarty_tpl->tpl_vars['filelist']->value){?>style="display: none;"<?php }?>>
        <div id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"></div>
        <div class="cl"></div>

        <script type="text/javascript">
            createUploader(
                '<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
',
                '<?php echo $_smarty_tpl->tpl_vars['item']->value['folder'];?>
',
                '0',
                <?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['id'];?>
,
                '<?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['table'];?>
',
                [<?php  $_smarty_tpl->tpl_vars['extension'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['extension']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['extensions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['extension']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['extension']->iteration=0;
 $_smarty_tpl->tpl_vars['extension']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['extension']->key => $_smarty_tpl->tpl_vars['extension']->value){
$_smarty_tpl->tpl_vars['extension']->_loop = true;
 $_smarty_tpl->tpl_vars['extension']->iteration++;
 $_smarty_tpl->tpl_vars['extension']->index++;
 $_smarty_tpl->tpl_vars['extension']->first = $_smarty_tpl->tpl_vars['extension']->index === 0;
 $_smarty_tpl->tpl_vars['extension']->last = $_smarty_tpl->tpl_vars['extension']->iteration === $_smarty_tpl->tpl_vars['extension']->total;
?>'<?php echo $_smarty_tpl->tpl_vars['extension']->value['value'];?>
'<?php if (!$_smarty_tpl->tpl_vars['extension']->last){?>,<?php }?><?php } ?>],
                false
            );
        </script>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['filelist']->value){?>
    <div class="form_items_list_container white_holder related_list" id="file_list_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
        <table cellpadding="0" cellspacing="0" border="0">
            <tr>
                <th width="1%"></th>
                <th width="60%"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','files_header_file');?>
</th>
                <th width="37%"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','files_header_date');?>
</th>
                <th width="1%"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','files_header_size');?>
</th>
                <th width="1%"></th>
            </tr>
            <?php  $_smarty_tpl->tpl_vars['file'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['file']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['filelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['file']->key => $_smarty_tpl->tpl_vars['file']->value){
$_smarty_tpl->tpl_vars['file']->_loop = true;
?>
            <tr>
                <td width="1%">
                    <a class="icon_action icon_file_instance" href="<?php echo $_smarty_tpl->tpl_vars['file']->value['path'];?>
<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
<?php if ($_smarty_tpl->tpl_vars['file']->value['extension']){?>.<?php echo $_smarty_tpl->tpl_vars['file']->value['extension'];?>
<?php }?>" target="_blank"></a>
                </td>
                <td>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['file']->value['path'];?>
<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
<?php if ($_smarty_tpl->tpl_vars['file']->value['extension']){?>.<?php echo $_smarty_tpl->tpl_vars['file']->value['extension'];?>
<?php }?>" target="_blank"><?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
</a>.<?php echo $_smarty_tpl->tpl_vars['file']->value['extension'];?>

                </td>
                <td width="1%" class="nowrap">
                    <?php echo smarty_modifier_date($_smarty_tpl->tpl_vars['file']->value['date'],"datetime");?>

                </td>
                <td width="1%" class="nowrap">
                    <?php echo smarty_modifier_filesize($_smarty_tpl->tpl_vars['file']->value['size']);?>

                </td>
                <td width="1%">
                    <a title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_button_delete_file');?>
" onclick="deleteFile('<?php echo $_smarty_tpl->tpl_vars['file']->value['id'];?>
', $(this), 'file_list_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
');" href="javascript:void(0)" class="icon_action icon_delete_instance"></a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <script type="text/javascript">
        initUploadedTable('file_list_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
');
    </script>
    <?php }?>
</div><?php }} ?>