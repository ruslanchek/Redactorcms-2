<?php /* Smarty version Smarty 3.1.4, created on 2012-10-10 15:27:49
         compiled from "/home/sporthimki/www/admin/templates/system/form_fields/catalog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:160452009850755bb5cc6435-64444454%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '786b0aa304c9ab65893cdee30d7bff2dfa461df3' => 
    array (
      0 => '/home/sporthimki/www/admin/templates/system/form_fields/catalog.tpl',
      1 => 1348490267,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '160452009850755bb5cc6435-64444454',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_50755bb5d31fb',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50755bb5d31fb')) {function content_50755bb5d31fb($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_urlencode_my')) include '/home/sporthimki/www/smarty/plugins/modifier.urlencode_my.php';
?><div class="item_block">
    <label class="label" for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</label>
    <input type="hidden" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" value="<?php echo smarty_modifier_urlencode_my($_smarty_tpl->tpl_vars['item']->value['value']);?>
" />

    <div><a class="add_param_button" href="javascript:void(0)" onclick="catalog.addParam('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
')">Добавить +</a></div>

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