<?php /* Smarty version Smarty 3.1.4, created on 2012-04-05 21:34:18
         compiled from "/var/www/fortyfour/data/www/digitalbakery.fortyfour.ru/admin/templates/system/ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9502475014f7dd79aaddc96-72637320%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b61574271a6f37b52006f2e3d44dcec3b77fa761' => 
    array (
      0 => '/var/www/fortyfour/data/www/digitalbakery.fortyfour.ru/admin/templates/system/ajax.tpl',
      1 => 1333584922,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9502475014f7dd79aaddc96-72637320',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f7dd79ab4b86',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7dd79ab4b86')) {function content_4f7dd79ab4b86($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['main']->value->ajax_content=='include'){?>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['ajax_include']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('new'=>$_GET['new']), 0);?>

<?php }else{ ?>
    <?php echo $_smarty_tpl->tpl_vars['main']->value->ajax_content;?>

<?php }?>
<?php }} ?>