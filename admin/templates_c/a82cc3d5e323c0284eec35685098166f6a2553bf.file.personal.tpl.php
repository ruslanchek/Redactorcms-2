<?php /* Smarty version Smarty 3.1.4, created on 2012-03-19 21:04:51
         compiled from "Z:/home/loc/susl/admin/templates\modules\personal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:134604f676733bb70d9-89433385%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a82cc3d5e323c0284eec35685098166f6a2553bf' => 
    array (
      0 => 'Z:/home/loc/susl/admin/templates\\modules\\personal.tpl',
      1 => 1332157838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134604f676733bb70d9-89433385',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f676733c35ba',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f676733c35ba')) {function content_4f676733c35ba($_smarty_tpl) {?><h1><?php echo $_smarty_tpl->tpl_vars['main']->value->h1;?>
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