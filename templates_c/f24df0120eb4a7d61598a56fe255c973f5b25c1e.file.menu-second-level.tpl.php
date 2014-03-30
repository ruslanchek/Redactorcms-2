<?php /* Smarty version Smarty 3.1.4, created on 2014-01-29 23:16:13
         compiled from "/home/sdnadmin/site_new/templates/include/common/menu-second-level.tpl" */ ?>
<?php /*%%SmartyHeaderCode:80349418152e9537d14b277-39163612%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f24df0120eb4a7d61598a56fe255c973f5b25c1e' => 
    array (
      0 => '/home/sdnadmin/site_new/templates/include/common/menu-second-level.tpl',
      1 => 1391021834,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80349418152e9537d14b277-39163612',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pid' => 0,
    'core' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e9537d18686',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e9537d18686')) {function content_52e9537d18686($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->getInlineMenu(3,$_smarty_tpl->tpl_vars['pid']->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['path'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['core']->value->page['id']||$_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['core']->value->page['pid']){?>class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
<?php } ?><?php }} ?>