<?php /* Smarty version Smarty 3.1.4, created on 2012-04-06 23:01:54
         compiled from "/Users/ruslan/Documents/sites/digitalbakery/admin/templates/system/form_fields/text.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4268438184f7ce3ec6f6ad0-81767023%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c02d34f0decb8782b3ea0b7546e6c3131d734ca3' => 
    array (
      0 => '/Users/ruslan/Documents/sites/digitalbakery/admin/templates/system/form_fields/text.tpl',
      1 => 1333733877,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4268438184f7ce3ec6f6ad0-81767023',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f7ce3ec825ea',
  'variables' => 
  array (
    'item' => 0,
    'index' => 0,
    'main' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7ce3ec825ea')) {function content_4f7ce3ec825ea($_smarty_tpl) {?><div class="item_block">
    <label class="label" for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</label>
    <input class="text<?php if ($_smarty_tpl->tpl_vars['item']->value['email']){?> email<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['number']){?> number<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['required']){?> required<?php }?>" type="text" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['value'], ENT_QUOTES, 'UTF-8', true);?>
" tabindex="<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
" />
</div>

<?php if ($_smarty_tpl->tpl_vars['item']->value['unique']){?>
<script type="text/javascript">
    $(document).ready(function(){
        checkUniqueField('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
', '<?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['table'];?>
');
    });
</script>
<?php }?><?php }} ?>