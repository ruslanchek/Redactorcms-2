<?php /* Smarty version Smarty 3.1.4, created on 2014-01-30 02:01:05
         compiled from "/home/sdnadmin/site_new/admin/templates/system/form_fields/catalog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:80128273652e97a2192da28-72574395%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afa9b8adb1a6cf20901da29e270d511927766bc6' => 
    array (
      0 => '/home/sdnadmin/site_new/admin/templates/system/form_fields/catalog.tpl',
      1 => 1391021811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80128273652e97a2192da28-72574395',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e97a219871e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e97a219871e')) {function content_52e97a219871e($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_urlencode_my')) include '/home/sdnadmin/site_new/smarty/plugins/modifier.urlencode_my.php';
?><div class="item_block">
    <label class="label" for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</label>
    <input type="hidden" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" value="<?php echo smarty_modifier_urlencode_my($_smarty_tpl->tpl_vars['item']->value['value']);?>
" />

    <div>
        <a class="paste_params_button" href="javascript:void(0)" onclick="catalog.pasteParams('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
')">Экспорт</a>
        <a class="copy_params_button" href="javascript:void(0)" onclick="catalog.copyParams('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
')">Импорт</a>
        <a class="add_param_button" href="javascript:void(0)" onclick="catalog.addParam('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
')">Добавить +</a>
    </div>

    <div class="form_items_list_container white_holder related_list" id="catalog_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
        <table cellpadding="0" cellspacing="0" border="0">
            <tr class="thead">
                <th width="1%">№</th>
                <th width="39%">Параметр</th>
                <th width="60%">Значение</th>
                <th></th>
                <th></th>
            </tr>
        </table>
    </div>

    <script type="text/javascript">
        catalog.init('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
');
    </script>
</div><?php }} ?>