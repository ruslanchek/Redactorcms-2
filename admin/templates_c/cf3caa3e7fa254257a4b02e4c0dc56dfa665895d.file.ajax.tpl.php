<?php /* Smarty version Smarty 3.1.4, created on 2011-12-10 17:41:28
         compiled from "Z:/home/loc/cugino/admin/templates\system\ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:153284ee36f9861a4c0-27000842%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf3caa3e7fa254257a4b02e4c0dc56dfa665895d' => 
    array (
      0 => 'Z:/home/loc/cugino/admin/templates\\system\\ajax.tpl',
      1 => 1322914709,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153284ee36f9861a4c0-27000842',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4ee36f98689c4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ee36f98689c4')) {function content_4ee36f98689c4($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['main']->value->ajax_content=='include'){?>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['ajax_include']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('new'=>$_GET['new']), 0);?>

<?php }else{ ?>
    <?php echo $_smarty_tpl->tpl_vars['main']->value->ajax_content;?>

<?php }?>
<?php }} ?>