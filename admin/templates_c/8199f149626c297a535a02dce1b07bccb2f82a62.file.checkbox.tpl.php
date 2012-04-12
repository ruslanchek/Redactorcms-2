<?php /* Smarty version Smarty 3.1.4, created on 2012-04-03 20:34:06
         compiled from "Z:/home/loc/digitalbakery/admin/templates\system\form_fields\checkbox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159194f7b267e198908-03236811%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8199f149626c297a535a02dce1b07bccb2f82a62' => 
    array (
      0 => 'Z:/home/loc/digitalbakery/admin/templates\\system\\form_fields\\checkbox.tpl',
      1 => 1333470843,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159194f7b267e198908-03236811',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
    'index' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f7b267e1d88b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7b267e1d88b')) {function content_4f7b267e1d88b($_smarty_tpl) {?><div class="cb_item_block" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
">
    <div class="cb_left">
        <label for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</label>
    </div>
    <div class="cb_right">
        <input class="checkbox iphone_checkbox" type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['value']=="1"){?>checked="checked"<?php }?> tabindex="<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
" />
    </div>
    <div class="clear"></div>
</div><?php }} ?>