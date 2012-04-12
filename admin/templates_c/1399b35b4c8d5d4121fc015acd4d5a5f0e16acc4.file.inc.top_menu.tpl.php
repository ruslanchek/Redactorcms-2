<?php /* Smarty version Smarty 3.1.4, created on 2012-04-10 15:50:36
         compiled from "Z:/home/loc/digitalbakery/admin/templates\inc.top_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:284874f71a4a6ca5955-94954443%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1399b35b4c8d5d4121fc015acd4d5a5f0e16acc4' => 
    array (
      0 => 'Z:/home/loc/digitalbakery/admin/templates\\inc.top_menu.tpl',
      1 => 1333733876,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '284874f71a4a6ca5955-94954443',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f71a4a6d3e84',
  'variables' => 
  array (
    'main' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f71a4a6d3e84')) {function content_4f71a4a6d3e84($_smarty_tpl) {?><ul class="main_menu">
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