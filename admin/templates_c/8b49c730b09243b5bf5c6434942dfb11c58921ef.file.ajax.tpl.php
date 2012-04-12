<?php /* Smarty version Smarty 3.1.4, created on 2012-03-24 10:00:02
         compiled from "/Users/ruslan/Documents/sites/pincher/admin/templates/system/ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7437444014f6d70f2dc44b0-45311500%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b49c730b09243b5bf5c6434942dfb11c58921ef' => 
    array (
      0 => '/Users/ruslan/Documents/sites/pincher/admin/templates/system/ajax.tpl',
      1 => 1332571838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7437444014f6d70f2dc44b0-45311500',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f6d70f2e1ade',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f6d70f2e1ade')) {function content_4f6d70f2e1ade($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['main']->value->ajax_content=='include'){?>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['ajax_include']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('new'=>$_GET['new']), 0);?>

<?php }else{ ?>
    <?php echo $_smarty_tpl->tpl_vars['main']->value->ajax_content;?>

<?php }?>
<?php }} ?>