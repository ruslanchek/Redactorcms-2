<?php /* Smarty version Smarty 3.1.4, created on 2012-03-31 13:53:43
         compiled from "Z:/home/loc/digitalbakery/admin/templates\system\ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:44124f71a4c8cc9b73-87690327%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a341f1aafc28ed2645bb66801547a760e81e1bd' => 
    array (
      0 => 'Z:/home/loc/digitalbakery/admin/templates\\system\\ajax.tpl',
      1 => 1332846888,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '44124f71a4c8cc9b73-87690327',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f71a4c8d293f',
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f71a4c8d293f')) {function content_4f71a4c8d293f($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['main']->value->ajax_content=='include'){?>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['ajax_include']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('new'=>$_GET['new']), 0);?>

<?php }else{ ?>
    <?php echo $_smarty_tpl->tpl_vars['main']->value->ajax_content;?>

<?php }?>
<?php }} ?>