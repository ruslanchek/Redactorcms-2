<?php /* Smarty version Smarty 3.1.4, created on 2012-04-05 04:18:58
         compiled from "/var/www/fortyfour/data/www/digitalbakery.fortyfour.ru/templates/include/common/left_side_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13649928244f797478aafca3-65012846%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8d74a90bc0023517be7e691fb8deb1bfe439c20' => 
    array (
      0 => '/var/www/fortyfour/data/www/digitalbakery.fortyfour.ru/templates/include/common/left_side_menu.tpl',
      1 => 1333555939,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13649928244f797478aafca3-65012846',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f797478af90d',
  'variables' => 
  array (
    'core' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f797478af90d')) {function content_4f797478af90d($_smarty_tpl) {?>
<ul id="left_menu">
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->getInlineMenu(3,1); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <li class="hoog_font">
            <?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['core']->value->page['id']){?>
                <b><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</b>
            <?php }else{ ?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['path'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
            <?php }?>
        </li>
    <?php } ?>
</ul><?php }} ?>