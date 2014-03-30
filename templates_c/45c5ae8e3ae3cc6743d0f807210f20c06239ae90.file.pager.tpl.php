<?php /* Smarty version Smarty 3.1.4, created on 2014-01-29 23:16:20
         compiled from "/home/sdnadmin/site_new/templates/include/common/pager.tpl" */ ?>
<?php /*%%SmartyHeaderCode:96190241152e95384a81a01-77490871%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45c5ae8e3ae3cc6743d0f807210f20c06239ae90' => 
    array (
      0 => '/home/sdnadmin/site_new/templates/include/common/pager.tpl',
      1 => 1391021834,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96190241152e95384a81a01-77490871',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pager' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e95384afc4d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e95384afc4d')) {function content_52e95384afc4d($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['pager']->value['total_pages']>1){?>
<nav class="pagination">
    <?php if ($_smarty_tpl->tpl_vars['pager']->value['prev_page']){?><a href="<?php echo Utilities::getParamstring('page');?>
page=<?php echo $_smarty_tpl->tpl_vars['pager']->value['prev_page'];?>
">Предыдущая</a><?php }?>

    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pager']->value['pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <?php if ($_smarty_tpl->tpl_vars['item']->value['current']&&$_smarty_tpl->tpl_vars['item']->value['page']){?>
            <a class="active" href="<?php echo Utilities::getParamstring('page');?>
page=<?php echo $_smarty_tpl->tpl_vars['item']->value['page'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
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