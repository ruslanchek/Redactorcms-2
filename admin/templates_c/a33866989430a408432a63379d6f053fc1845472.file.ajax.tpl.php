<?php /* Smarty version Smarty 3.1.4, created on 2012-04-06 22:56:44
         compiled from "/Users/ruslan/Documents/sites/digitalbakery/admin/templates/system/ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2762708514f74bbdfc140e4-64887861%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a33866989430a408432a63379d6f053fc1845472' => 
    array (
      0 => '/Users/ruslan/Documents/sites/digitalbakery/admin/templates/system/ajax.tpl',
      1 => 1333733876,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2762708514f74bbdfc140e4-64887861',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f74bbdfc6daa',
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f74bbdfc6daa')) {function content_4f74bbdfc6daa($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['main']->value->ajax_content=='include'){?>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['ajax_include']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('new'=>$_GET['new']), 0);?>

<?php }else{ ?>
    <?php echo $_smarty_tpl->tpl_vars['main']->value->ajax_content;?>

<?php }?>
<?php }} ?>