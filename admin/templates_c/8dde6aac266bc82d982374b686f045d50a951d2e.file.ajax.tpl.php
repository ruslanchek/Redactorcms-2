<?php /* Smarty version Smarty 3.1.4, created on 2012-03-25 21:54:08
         compiled from "/var/www/fortyfour/data/www/pincher.fortyfour.ru/admin/templates/system/ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13508885644f6f5bc0c33958-06627837%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8dde6aac266bc82d982374b686f045d50a951d2e' => 
    array (
      0 => '/var/www/fortyfour/data/www/pincher.fortyfour.ru/admin/templates/system/ajax.tpl',
      1 => 1332574179,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13508885644f6f5bc0c33958-06627837',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f6f5bc0cd0a1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f6f5bc0cd0a1')) {function content_4f6f5bc0cd0a1($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['main']->value->ajax_content=='include'){?>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['ajax_include']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('new'=>$_GET['new']), 0);?>

<?php }else{ ?>
    <?php echo $_smarty_tpl->tpl_vars['main']->value->ajax_content;?>

<?php }?>
<?php }} ?>