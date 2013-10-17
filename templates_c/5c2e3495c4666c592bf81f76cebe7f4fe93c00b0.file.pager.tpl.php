<?php /* Smarty version Smarty 3.1.4, created on 2013-10-16 18:11:26
         compiled from "/Users/ruslan/Sites/gts/templates/include/common/pager.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1913136996525e8dd3773111-20165487%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c2e3495c4666c592bf81f76cebe7f4fe93c00b0' => 
    array (
      0 => '/Users/ruslan/Sites/gts/templates/include/common/pager.tpl',
      1 => 1381932685,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1913136996525e8dd3773111-20165487',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_525e8dd383204',
  'variables' => 
  array (
    'pager' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_525e8dd383204')) {function content_525e8dd383204($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['pager']->value['total_pages']>1){?>
<nav class="nav-pager">
    <?php if ($_smarty_tpl->tpl_vars['pager']->value['prev_page']){?><a href="<?php echo Utilities::getParamstring('page');?>
page=<?php echo $_smarty_tpl->tpl_vars['pager']->value['prev_page'];?>
">Предыдущая</a><?php }?>

    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pager']->value['pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <?php if ($_smarty_tpl->tpl_vars['item']->value['current']&&$_smarty_tpl->tpl_vars['item']->value['page']){?>
            <b><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</b>
        <?php }elseif($_smarty_tpl->tpl_vars['item']->value['page']){?>
            <a href="<?php echo Utilities::getParamstring('page');?>
page=<?php echo $_smarty_tpl->tpl_vars['item']->value['page'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
        <?php }else{ ?>
            <span><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</span>
        <?php }?>
    <?php } ?>

    <?php if ($_smarty_tpl->tpl_vars['pager']->value['next_page']){?><a href="<?php echo Utilities::getParamstring('page');?>
page=<?php echo $_smarty_tpl->tpl_vars['pager']->value['next_page'];?>
">Следующая</a><?php }?>

    <div class="clear"></div>
</nav>
<?php }?><?php }} ?>