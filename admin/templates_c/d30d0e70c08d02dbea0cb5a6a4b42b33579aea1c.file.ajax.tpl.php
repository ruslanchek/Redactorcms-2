<?php /* Smarty version Smarty 3.1.4, created on 2012-03-19 15:57:58
         compiled from "Z:/home/loc/susl/admin/templates\system\ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:268984f671f46486fa8-93284668%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd30d0e70c08d02dbea0cb5a6a4b42b33579aea1c' => 
    array (
      0 => 'Z:/home/loc/susl/admin/templates\\system\\ajax.tpl',
      1 => 1332157838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '268984f671f46486fa8-93284668',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f671f464f0ff',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f671f464f0ff')) {function content_4f671f464f0ff($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['main']->value->ajax_content=='include'){?>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['ajax_include']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('new'=>$_GET['new']), 0);?>

<?php }else{ ?>
    <?php echo $_smarty_tpl->tpl_vars['main']->value->ajax_content;?>

<?php }?>
<?php }} ?>