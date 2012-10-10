<?php /* Smarty version Smarty 3.1.4, created on 2012-10-09 14:19:13
         compiled from "/home/sporthimki/www/admin/templates/system/ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10038971675073fa21abfa85-84408885%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eeb18a920f4b06f09c2224dffd0d7eb08136d360' => 
    array (
      0 => '/home/sporthimki/www/admin/templates/system/ajax.tpl',
      1 => 1348490267,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10038971675073fa21abfa85-84408885',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_5073fa21b8941',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5073fa21b8941')) {function content_5073fa21b8941($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['main']->value->ajax_content=='include'){?>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['ajax_include']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('new'=>$_GET['new']), 0);?>

<?php }else{ ?>
    <?php echo $_smarty_tpl->tpl_vars['main']->value->ajax_content;?>

<?php }?>
<?php }} ?>