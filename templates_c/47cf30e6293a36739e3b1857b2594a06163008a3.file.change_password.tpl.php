<?php /* Smarty version Smarty 3.1.4, created on 2012-04-09 13:44:39
         compiled from "/Users/ruslan/Documents/sites/digitalbakery/templates/modules/change_password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17481075654f82af871bf2f2-68090781%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47cf30e6293a36739e3b1857b2594a06163008a3' => 
    array (
      0 => '/Users/ruslan/Documents/sites/digitalbakery/templates/modules/change_password.tpl',
      1 => 1333733965,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17481075654f82af871bf2f2-68090781',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f82af872a57e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f82af872a57e')) {function content_4f82af872a57e($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['core']->value->page['form']['message']){?>
    Status: <?php if ($_smarty_tpl->tpl_vars['core']->value->page['form']['status']){?>OK<?php }else{ ?>ERROR<?php }?>; Message: <?php echo $_smarty_tpl->tpl_vars['core']->value->page['form']['message'];?>

<?php }?>

<form action="?action=go" method="POST">
    <p>
        <label>
           Старый пароль<br>
            <input type="password" name="old_password" />
        </label>
    </p>

    <p>
        <label>
            Новый пароль<br>
            <input type="password" name="new_password" />
        </label>
    </p>

    <p>
        <label>
            Еще раз<br>
            <input type="password" name="new_password_again" />
        </label>
    </p>

    <input type="submit" value="Сохранить" />
</form><?php }} ?>