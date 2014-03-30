<?php /* Smarty version Smarty 3.1.4, created on 2014-02-01 13:29:03
         compiled from "/home/sdnadmin/site_new/admin/templates/system/ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:40387763552ecbe5f371777-31871382%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5f3c560777d92e9a01debd907ded8751b2065e6' => 
    array (
      0 => '/home/sdnadmin/site_new/admin/templates/system/ajax.tpl',
      1 => 1391021811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40387763552ecbe5f371777-31871382',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52ecbe5f3e571',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ecbe5f3e571')) {function content_52ecbe5f3e571($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['main']->value->ajax_content=='include'){?>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['ajax_include']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('new'=>$_GET['new']), 0);?>

<?php }else{ ?>
    <?php echo $_smarty_tpl->tpl_vars['main']->value->ajax_content;?>

<?php }?>
<?php }} ?>