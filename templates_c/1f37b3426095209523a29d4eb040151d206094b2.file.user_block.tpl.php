<?php /* Smarty version Smarty 3.1.4, created on 2012-04-09 22:29:21
         compiled from "/Users/ruslan/Documents/sites/digitalbakery/templates/include/common/user_block.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19250433184f78d11679c973-45148531%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f37b3426095209523a29d4eb040151d206094b2' => 
    array (
      0 => '/Users/ruslan/Documents/sites/digitalbakery/templates/include/common/user_block.tpl',
      1 => 1333996158,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19250433184f78d11679c973-45148531',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f78d1167a332',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f78d1167a332')) {function content_4f78d1167a332($_smarty_tpl) {?>

<div class="top_inner site_width_limiter menu_spacing">
<?php if ($_smarty_tpl->tpl_vars['core']->value->login->user_status['status']){?>
    <a class="personal_button" href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['core']->value->login->user_status['userdata']['name'];?>
</a>
    <div class="user_menu" style="display: none;">
        <a href="/personal/">Настройка</a>
        <a href="/personal/change_pass/">Сменить пароль</a>
        <a href="javascript:void(0)" onclick="if(confirm('Выйти?')){document.location.href='<?php echo $_smarty_tpl->tpl_vars['core']->value->uri;?>
?action=exit'}">Выход</a>
    </div>
<?php }else{ ?>
    <a class="login_button" href="javascript:void(0)">Личный кабинет</a>
<?php }?>
</div><?php }} ?>