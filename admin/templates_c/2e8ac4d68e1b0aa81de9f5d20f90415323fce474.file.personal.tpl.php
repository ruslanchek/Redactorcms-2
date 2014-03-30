<?php /* Smarty version Smarty 3.1.4, created on 2014-02-04 15:38:45
         compiled from "/home/sdnadmin/site_new/admin/templates/modules/personal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2364414252f0d145bd2c36-55338569%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e8ac4d68e1b0aa81de9f5d20f90415323fce474' => 
    array (
      0 => '/home/sdnadmin/site_new/admin/templates/modules/personal.tpl',
      1 => 1391021811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2364414252f0d145bd2c36-55338569',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52f0d145c54c2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f0d145c54c2')) {function content_52f0d145c54c2($_smarty_tpl) {?><h1><?php echo $_smarty_tpl->tpl_vars['main']->value->h1;?>
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