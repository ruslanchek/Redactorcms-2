<?php /* Smarty version Smarty 3.1.4, created on 2014-02-03 11:47:30
         compiled from "/home/sdnadmin/site_new/templates/include/common/footer-menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:798326252e9518da2bf11-35749345%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2fc175bcd0a87f8f50cb42f10f4e741533082731' => 
    array (
      0 => '/home/sdnadmin/site_new/templates/include/common/footer-menu.tpl',
      1 => 1391413346,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '798326252e9518da2bf11-35749345',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e9518db1448',
  'variables' => 
  array (
    'core' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e9518db1448')) {function content_52e9518db1448($_smarty_tpl) {?><div class="unit-20">
    <nav class="nav-footer">
        <a href="/about">О компании</a>

        <nav class="sub">
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->getInlineMenu(3,87); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['path'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['core']->value->page['id']||$_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['core']->value->page['pid']){?>class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
        <?php } ?>
        </nav>
    </nav>

    <nav class="nav-footer">
        <a href="/about">Документы</a>

        <nav class="sub">
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->getInlineMenu(3,83); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['path'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['core']->value->page['id']||$_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['core']->value->page['pid']){?>class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
            <?php } ?>
        </nav>
    </nav>
</div>

<div class="unit-20">
    <nav class="nav-footer">
        <a href="/services">Услуги</a>

        <nav class="sub">
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->getInlineMenu(3,85); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['path'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['core']->value->page['id']||$_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['core']->value->page['pid']){?>class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
        <?php } ?>
        </nav>
    </nav>
</div>

<div class="unit-20">
    <nav class="nav-footer">
        <a href="/datacenter">Дата-центр</a>

        <nav class="sub">
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->getInlineMenu(3,86); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['path'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['core']->value->page['id']||$_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['core']->value->page['pid']){?>class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
            <?php } ?>
        </nav>
    </nav>

    <nav class="nav-footer">
        <a href="/market-press">Маркет-пресс</a>

        <nav class="sub">
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->getInlineMenu(3,17); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['path'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['core']->value->page['id']||$_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['core']->value->page['pid']){?>class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
            <?php } ?>
        </nav>
    </nav>

    <nav class="nav-footer">
        <a href="/contacts">Контакты</a>
    </nav>
</div>
<?php }} ?>