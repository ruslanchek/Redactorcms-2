<?php /* Smarty version Smarty 3.1.4, created on 2012-04-10 18:28:04
         compiled from "Z:/home/loc/digitalbakery/templates\include\common\user_block.tpl" */ ?>
<?php /*%%SmartyHeaderCode:131594f7b3082a69616-56082095%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e0b2215078df41005f2cf873688bd34e3f2a31c' => 
    array (
      0 => 'Z:/home/loc/digitalbakery/templates\\include\\common\\user_block.tpl',
      1 => 1334068069,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131594f7b3082a69616-56082095',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f7b3082a7011',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7b3082a7011')) {function content_4f7b3082a7011($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['core']->value->login->user_status['status']){?>
    <a class="personal_button" href="javascript:void(0)"><span class="userpic"><img src="<?php echo $_smarty_tpl->tpl_vars['core']->value->getAvatar(25);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['core']->value->login->user_status['userdata']['name'];?>
"></span><?php echo $_smarty_tpl->tpl_vars['core']->value->login->user_status['userdata']['name'];?>
</a>
    <div class="user_menu" style="display: none;">
        <a href="/personal/">Настройка</a>
        <a href="/personal/change_pass/">Сменить пароль</a>
        <a href="javascript:void(0)" onclick="if(confirm('Выйти?')){document.location.href='<?php echo $_smarty_tpl->tpl_vars['core']->value->uri;?>
?action=exit'}">Выход</a>
    </div>
<?php }else{ ?>
    <a class="login_button" href="javascript:void(0)">Личный кабинет</a>
<?php }?><?php }} ?>