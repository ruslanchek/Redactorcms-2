<?php /* Smarty version Smarty 3.1.4, created on 2014-01-30 02:00:54
         compiled from "/home/sdnadmin/site_new/admin/templates/inc.top_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:101243319252e97a16849fd5-52635883%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '463ea8a780c675bb35c386421c01e9808c6bcb5d' => 
    array (
      0 => '/home/sdnadmin/site_new/admin/templates/inc.top_menu.tpl',
      1 => 1391021811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '101243319252e97a16849fd5-52635883',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e97a168d35e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e97a168d35e')) {function content_52e97a168d35e($_smarty_tpl) {?><ul class="main_menu">
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['main']->value->config['admin_modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <?php if ($_smarty_tpl->tpl_vars['item']->value[2]){?>
            <?php if ($_smarty_tpl->tpl_vars['main']->value->module_name==$_smarty_tpl->tpl_vars['item']->value[0]){?>
                <li>
                    <span class="ml_sprite <?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
"></span>
                    <span class="menu_text_active"><span><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('modules_menu',$_smarty_tpl->tpl_vars['item']->value[0]);?>
</span></span>
                </li>
            <?php }else{ ?>
                <li>
                    <a class="ml_link" href="/admin/?option=<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
">
                        <span class="ml_sprite <?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
"></span>
                        <span class="menu_text_link"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('modules_menu',$_smarty_tpl->tpl_vars['item']->value[0]);?>
</span>
                    </a>
                </li>
            <?php }?>
        <?php }?>
    <?php } ?>
</ul>

<div class="menu_shade"></div>

<?php if ($_smarty_tpl->tpl_vars['main']->value->submenu){?>
<ul class="main_menu_sublevel overall_padding">
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['main']->value->submenu; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <?php if ($_smarty_tpl->tpl_vars['item']->value['active']){?>
            <li class="active_sml"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</li>
        <?php }else{ ?>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></li>
        <?php }?>
    <?php } ?>
</ul>
<?php }?><?php }} ?>