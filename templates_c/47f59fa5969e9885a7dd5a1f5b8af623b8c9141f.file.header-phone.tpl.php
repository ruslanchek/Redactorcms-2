<?php /* Smarty version Smarty 3.1.4, created on 2013-10-02 19:23:15
         compiled from "/Users/ruslan/Sites/redactorcms2/templates/include/common/header-phone.tpl" */ ?>
<?php /*%%SmartyHeaderCode:463929692524c3a6377da96-07233527%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47f59fa5969e9885a7dd5a1f5b8af623b8c9141f' => 
    array (
      0 => '/Users/ruslan/Sites/redactorcms2/templates/include/common/header-phone.tpl',
      1 => 1379944938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '463929692524c3a6377da96-07233527',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_524c3a637a71f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_524c3a637a71f')) {function content_524c3a637a71f($_smarty_tpl) {?><div class="phone">
    <span class="number"><?php echo $_smarty_tpl->tpl_vars['core']->value->getConstant('common','main_phone');?>
</span>
    <span class="desc"><?php echo $_smarty_tpl->tpl_vars['core']->value->getConstant('common','main_phone_suffix');?>
</span>
</div><?php }} ?>