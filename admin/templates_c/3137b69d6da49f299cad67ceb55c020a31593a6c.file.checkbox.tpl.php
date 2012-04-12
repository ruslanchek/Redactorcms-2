<?php /* Smarty version Smarty 3.1.4, created on 2012-04-06 23:01:54
         compiled from "/Users/ruslan/Documents/sites/digitalbakery/admin/templates/system/form_fields/checkbox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12141815034f7ce3ec63ae40-48909843%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3137b69d6da49f299cad67ceb55c020a31593a6c' => 
    array (
      0 => '/Users/ruslan/Documents/sites/digitalbakery/admin/templates/system/form_fields/checkbox.tpl',
      1 => 1333733877,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12141815034f7ce3ec63ae40-48909843',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f7ce3ec671ff',
  'variables' => 
  array (
    'item' => 0,
    'index' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7ce3ec671ff')) {function content_4f7ce3ec671ff($_smarty_tpl) {?><div class="cb_item_block" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
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