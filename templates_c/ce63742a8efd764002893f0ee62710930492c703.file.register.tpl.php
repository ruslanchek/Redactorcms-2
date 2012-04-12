<?php /* Smarty version Smarty 3.1.4, created on 2012-04-09 14:19:40
         compiled from "/Users/ruslan/Documents/sites/digitalbakery/templates/modules/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11166631724f82b7492517a5-05603966%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce63742a8efd764002893f0ee62710930492c703' => 
    array (
      0 => '/Users/ruslan/Documents/sites/digitalbakery/templates/modules/register.tpl',
      1 => 1333966778,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11166631724f82b7492517a5-05603966',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f82b7493e870',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f82b7493e870')) {function content_4f82b7493e870($_smarty_tpl) {?><h1 class="uppercase">Регистрация</h1>

<?php if ($_smarty_tpl->tpl_vars['core']->value->page['form']['message']){?>
    Status: <?php if ($_smarty_tpl->tpl_vars['core']->value->page['form']['status']){?>OK<?php }else{ ?>ERROR<?php }?>; Message: <?php echo $_smarty_tpl->tpl_vars['core']->value->page['form']['message'];?>

<?php }?>

<form action="?action=go" method="POST">
    <p>
        <label>
            Email<br>
            <input type="text" name="email" value="<?php echo $_POST['email'];?>
" />
        </label>
    </p>

    <p>
        <label>
            Код с картинки
            <div class="captcha">
                <a href="javascript:void(0)" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random()">Обновить картинку</a><br>
                <img id="captcha" src="/securimage/securimage_show.php?0.15141636761836708" width="216" height="80">
            </div>

            <input type="text" name="captcha_code" />
        </label>
    </p>

    <input type="submit" value="Зарегистрироваться" />
</form><?php }} ?>