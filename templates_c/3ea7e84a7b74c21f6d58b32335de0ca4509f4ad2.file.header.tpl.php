<?php /* Smarty version Smarty 3.1.4, created on 2013-10-17 05:00:34
         compiled from "/Users/ruslan/Sites/redactorcms2/templates/include/common/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:139683096652544c2fefd193-16047375%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ea7e84a7b74c21f6d58b32335de0ca4509f4ad2' => 
    array (
      0 => '/Users/ruslan/Sites/redactorcms2/templates/include/common/header.tpl',
      1 => 1381937558,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139683096652544c2fefd193-16047375',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52544c2ff2289',
  'variables' => 
  array (
    'mainpage' => 0,
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52544c2ff2289')) {function content_52544c2ff2289($_smarty_tpl) {?><?php if (!$_smarty_tpl->tpl_vars['mainpage']->value){?>
    <a class="logo" href="/" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['core']->value->getConstant('common','brand_name'), ENT_QUOTES, 'UTF-8', true);?>
"></a>
<?php }else{ ?>
    <span class="logo" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['core']->value->getConstant('common','brand_name'), ENT_QUOTES, 'UTF-8', true);?>
"></span>
<?php }?>

<div class="phone"><?php echo $_smarty_tpl->tpl_vars['core']->value->getConstant('common','main_phone');?>
</div>
<a class="callback-button btn btn-yellow" href="#">Обратный звонок</a>

<?php echo $_smarty_tpl->getSubTemplate ("include/common/main-menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="valutes">
    <span class="item"><strong>USD</strong> <?php echo $_smarty_tpl->tpl_vars['core']->value->getConstant('valutes','usd');?>
</span>
    <span class="item"><strong>EUR</strong> <?php echo $_smarty_tpl->tpl_vars['core']->value->getConstant('valutes','eur');?>
</span>
</div><?php }} ?>