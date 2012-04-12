<?php /* Smarty version Smarty 3.1.4, created on 2011-12-10 12:44:53
         compiled from "Z:/home/loc/redactorcms/admin/templates\system\ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:55334ee32a15282880-99256092%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa8b87f4c212b7409c573aa8a535c5d75b55d3dc' => 
    array (
      0 => 'Z:/home/loc/redactorcms/admin/templates\\system\\ajax.tpl',
      1 => 1322914709,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55334ee32a15282880-99256092',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4ee32a152f5ea',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ee32a152f5ea')) {function content_4ee32a152f5ea($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['main']->value->ajax_content=='include'){?>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['ajax_include']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('new'=>$_GET['new']), 0);?>

<?php }else{ ?>
    <?php echo $_smarty_tpl->tpl_vars['main']->value->ajax_content;?>

<?php }?>
<?php }} ?>