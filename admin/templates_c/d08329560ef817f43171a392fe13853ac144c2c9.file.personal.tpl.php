<?php /* Smarty version Smarty 3.1.4, created on 2012-03-26 17:56:20
         compiled from "/var/www/fortyfour/data/www/pincher.fortyfour.ru/admin/templates/modules/personal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6615210154f707584c74d23-70354378%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd08329560ef817f43171a392fe13853ac144c2c9' => 
    array (
      0 => '/var/www/fortyfour/data/www/pincher.fortyfour.ru/admin/templates/modules/personal.tpl',
      1 => 1332571837,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6615210154f707584c74d23-70354378',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f707584d0d33',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f707584d0d33')) {function content_4f707584d0d33($_smarty_tpl) {?><h1><?php echo $_smarty_tpl->tpl_vars['main']->value->h1;?>
</h1>

<div class="left_col">
    <?php if ($_smarty_tpl->tpl_vars['main']->value->module_mode=='settings'){?>
        <?php echo $_smarty_tpl->getSubTemplate ("modules/personal.settings.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['main']->value->module_mode=='password_change'){?>
        <?php echo $_smarty_tpl->getSubTemplate ("modules/personal.password_change.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php }?>
</div>

<div class="right_col">
    <?php echo $_smarty_tpl->getSubTemplate ("modules/personal.tools.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>

<div class="cl"></div><?php }} ?>