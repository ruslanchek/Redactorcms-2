<?php /* Smarty version Smarty 3.1.4, created on 2012-04-05 21:34:06
         compiled from "/var/www/fortyfour/data/www/digitalbakery.fortyfour.ru/admin/templates/system/form_fields/checkbox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5395118464f7dd78e438782-28779393%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '651a90e85b3bc43274014077f67920c31db4e22b' => 
    array (
      0 => '/var/www/fortyfour/data/www/digitalbakery.fortyfour.ru/admin/templates/system/form_fields/checkbox.tpl',
      1 => 1333584927,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5395118464f7dd78e438782-28779393',
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
  'unifunc' => 'content_4f7dd78e4bafa',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7dd78e4bafa')) {function content_4f7dd78e4bafa($_smarty_tpl) {?><div class="cb_item_block" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
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