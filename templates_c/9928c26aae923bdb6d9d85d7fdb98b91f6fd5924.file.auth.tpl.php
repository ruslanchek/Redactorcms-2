<?php /* Smarty version Smarty 3.1.4, created on 2012-04-10 13:16:36
         compiled from "Z:/home/loc/digitalbakery/templates\modules\auth.tpl" */ ?>
<?php /*%%SmartyHeaderCode:287904f83f6b2e65256-85123523%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9928c26aae923bdb6d9d85d7fdb98b91f6fd5924' => 
    array (
      0 => 'Z:/home/loc/digitalbakery/templates\\modules\\auth.tpl',
      1 => 1334049383,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '287904f83f6b2e65256-85123523',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f83f6b2ef30b',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f83f6b2ef30b')) {function content_4f83f6b2ef30b($_smarty_tpl) {?><h1 class="uppercase">Авторизация</h1>

<?php if ($_smarty_tpl->tpl_vars['core']->value->page['form']['message']){?>
    <div class="form_message"><div class="<?php if ($_smarty_tpl->tpl_vars['core']->value->page['form']['status']){?>ok<?php }else{ ?>error<?php }?>"><?php echo $_smarty_tpl->tpl_vars['core']->value->page['form']['message'];?>
</div></div>
<?php }?>

<div class="form">
    <div class="form_menu uppercase">
        <b>Авторизация</b>
        <a href="/auth/register/">Регистрация</a>
        <a href="/auth/remember_pass/">Напомнить пароль</a>
    </div>

    <form class="regular_form" action="?action=go" method="POST">

        <table>
            <tr>
                <th><label for="form_login">Электронная почта или логин</label></th>
                <td><input type="text" name="login" id="form_login" class="text req" value="<?php echo $_POST['login'];?>
" /></td>
            </tr>
            <tr>
                <th><label for="form_password">Пароль</label></th>
                <td><input type="password" name="password" id="form_password" class="text req" value="<?php echo $_POST['email'];?>
" /></td>
            </tr>
            <tr>
                <th colspan="2"><input type="submit" class="submit" value="Зарегистрироваться" /></th>
            </tr>
        </table>
    </form>
</div><?php }} ?>