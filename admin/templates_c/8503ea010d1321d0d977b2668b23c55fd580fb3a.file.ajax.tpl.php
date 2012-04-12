<?php /* Smarty version Smarty 3.1.4, created on 2012-03-19 23:43:10
         compiled from "/var/www/fortyfour/data/www/stroymaster.fortyfour.ru/admin/templates/system/ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11896036814f678c4e9d1de0-36249610%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8503ea010d1321d0d977b2668b23c55fd580fb3a' => 
    array (
      0 => '/var/www/fortyfour/data/www/stroymaster.fortyfour.ru/admin/templates/system/ajax.tpl',
      1 => 1332177690,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11896036814f678c4e9d1de0-36249610',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f678c4ea4dba',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f678c4ea4dba')) {function content_4f678c4ea4dba($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['main']->value->ajax_content=='include'){?>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['ajax_include']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('new'=>$_GET['new']), 0);?>

<?php }else{ ?>
    <?php echo $_smarty_tpl->tpl_vars['main']->value->ajax_content;?>

<?php }?>
<?php }} ?>