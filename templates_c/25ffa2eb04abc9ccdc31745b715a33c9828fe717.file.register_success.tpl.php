<?php /* Smarty version Smarty 3.1.4, created on 2012-04-09 14:20:05
         compiled from "/Users/ruslan/Documents/sites/digitalbakery/templates/include/mailing/register_success.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13877374734f82b7d58f0079-12007071%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25ffa2eb04abc9ccdc31745b715a33c9828fe717' => 
    array (
      0 => '/Users/ruslan/Documents/sites/digitalbakery/templates/include/mailing/register_success.tpl',
      1 => 1333733964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13877374734f82b7d58f0079-12007071',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f82b7d59793a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f82b7d59793a')) {function content_4f82b7d59793a($_smarty_tpl) {?><p>Вы успешно зарегистрировались на сайте <?php echo $_smarty_tpl->tpl_vars['core']->value->mail_data['domain'];?>
!</p>
Ваш логин: <code><?php echo $_smarty_tpl->tpl_vars['core']->value->mail_data['login'];?>
</code><br>
Ваш пароль: <code><?php echo $_smarty_tpl->tpl_vars['core']->value->mail_data['password'];?>
</code><?php }} ?>