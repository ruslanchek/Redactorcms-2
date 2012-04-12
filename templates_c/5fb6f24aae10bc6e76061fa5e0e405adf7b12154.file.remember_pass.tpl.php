<?php /* Smarty version Smarty 3.1.4, created on 2012-04-10 13:06:34
         compiled from "Z:/home/loc/digitalbakery/templates\modules\remember_pass.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16554f83f6b8305ae7-74280721%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fb6f24aae10bc6e76061fa5e0e405adf7b12154' => 
    array (
      0 => 'Z:/home/loc/digitalbakery/templates\\modules\\remember_pass.tpl',
      1 => 1334048780,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16554f83f6b8305ae7-74280721',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f83f6b838ca6',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f83f6b838ca6')) {function content_4f83f6b838ca6($_smarty_tpl) {?><h1 class="uppercase">Восстановление пароля</h1>

<?php if ($_smarty_tpl->tpl_vars['core']->value->page['form']['message']){?>
    <div class="form_message"><div class="<?php if ($_smarty_tpl->tpl_vars['core']->value->page['form']['status']){?>ok<?php }else{ ?>error<?php }?>"><?php echo $_smarty_tpl->tpl_vars['core']->value->page['form']['message'];?>
</div></div>
<?php }?>

<div class="form">
    <div class="form_menu uppercase">
        <a href="/auth/">Авторизация</a>
        <a href="/auth/register/">Регистрация</a>
        <b>Напомнить пароль</b>
    </div>

    <form class="regular_form" action="?action=go" method="POST">
        <table>
            <tr>
                <th><label for="form_email">Электронная почта или логин</label></th>
                <td><input type="text" name="email" id="form_email" class="text req" value="<?php echo $_POST['email'];?>
" /></td>
            </tr>
            <tr>
                <th colspan="2"><input type="submit" class="submit" value="Выслать пароль" /></th>
            </tr>
        </table>
    </form>
</div><?php }} ?>