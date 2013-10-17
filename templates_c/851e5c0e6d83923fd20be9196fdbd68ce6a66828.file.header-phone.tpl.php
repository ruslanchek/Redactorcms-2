<?php /* Smarty version Smarty 3.1.4, created on 2013-10-16 16:19:54
         compiled from "/Users/ruslan/Sites/gts/templates/include/common/header-phone.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1890904766525e846a0bec93-12793126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '851e5c0e6d83923fd20be9196fdbd68ce6a66828' => 
    array (
      0 => '/Users/ruslan/Sites/gts/templates/include/common/header-phone.tpl',
      1 => 1379944938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1890904766525e846a0bec93-12793126',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_525e846a0e65e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_525e846a0e65e')) {function content_525e846a0e65e($_smarty_tpl) {?><div class="phone">
    <span class="number"><?php echo $_smarty_tpl->tpl_vars['core']->value->getConstant('common','main_phone');?>
</span>
    <span class="desc"><?php echo $_smarty_tpl->tpl_vars['core']->value->getConstant('common','main_phone_suffix');?>
</span>
</div><?php }} ?>