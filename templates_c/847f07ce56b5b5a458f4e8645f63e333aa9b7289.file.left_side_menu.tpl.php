<?php /* Smarty version Smarty 3.1.4, created on 2012-04-10 12:34:46
         compiled from "Z:/home/loc/digitalbakery/templates\include\common\left_side_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:68954f7b21494dbe15-60047861%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '847f07ce56b5b5a458f4e8645f63e333aa9b7289' => 
    array (
      0 => 'Z:/home/loc/digitalbakery/templates\\include\\common\\left_side_menu.tpl',
      1 => 1333733964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68954f7b21494dbe15-60047861',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f7b214951821',
  'variables' => 
  array (
    'core' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7b214951821')) {function content_4f7b214951821($_smarty_tpl) {?>
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