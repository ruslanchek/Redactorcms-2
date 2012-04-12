<?php /* Smarty version Smarty 3.1.4, created on 2012-04-10 13:05:55
         compiled from "Z:/home/loc/digitalbakery/templates\modules\register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:94724f83f0b0bf6843-81291056%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ba1719deb2775c394a2067b5fc5f6108ad1fc0a' => 
    array (
      0 => 'Z:/home/loc/digitalbakery/templates\\modules\\register.tpl',
      1 => 1334048747,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94724f83f0b0bf6843-81291056',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f83f0b0c7a6b',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f83f0b0c7a6b')) {function content_4f83f0b0c7a6b($_smarty_tpl) {?><h1 class="uppercase">Регистрация</h1>

<?php if ($_smarty_tpl->tpl_vars['core']->value->page['form']['message']){?>
    <div class="form_message"><div class="<?php if ($_smarty_tpl->tpl_vars['core']->value->page['form']['status']){?>ok<?php }else{ ?>error<?php }?>"><?php echo $_smarty_tpl->tpl_vars['core']->value->page['form']['message'];?>
</div></div>
<?php }?>

<div class="form">
    <div class="form_menu uppercase">
        <a href="/auth/">Авторизация</a>
        <b>Регистрация</b>
        <a href="/auth/remember_pass/">Напомнить пароль</a>
    </div>

    <form class="regular_form" action="?action=go" method="POST">
        <table>
            <tr>
                <th><label for="form_email">Электронная почта</label></th>
                <td><input type="text" name="email" id="form_email" class="text req" value="<?php echo $_POST['email'];?>
" /></td>
            </tr>
            <tr>
                <th>
                    <label for="form_phone">Код с картинки</label>
                </th>
                <td><input type="text" name="phone" id="form_phone" class="text req" />
                    <div class="captcha">
                        <a href="javascript:void(0)" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random()">Обновить картинку</a><br>
                        <img id="captcha" src="/securimage/securimage_show.php" width="150" height="50">
                    </div>
                </td>
            </tr>
            <tr>
                <th><input type="submit" class="submit" value="Зарегистрироваться" /></th>
                <td>
                    <div class="required">
                        — поля, обязательные для заполнения
                    </div>
                </td>
            </tr>
        </table>
    </form>
</div><?php }} ?>