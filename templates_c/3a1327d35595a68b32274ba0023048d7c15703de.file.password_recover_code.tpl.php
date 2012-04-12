<?php /* Smarty version Smarty 3.1.4, created on 2012-04-09 11:52:22
         compiled from "/Users/ruslan/Documents/sites/digitalbakery/templates/include/mailing/password_recover_code.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17797683514f82953668d8b3-24290866%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a1327d35595a68b32274ba0023048d7c15703de' => 
    array (
      0 => '/Users/ruslan/Documents/sites/digitalbakery/templates/include/mailing/password_recover_code.tpl',
      1 => 1333733964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17797683514f82953668d8b3-24290866',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f8295366e39e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f8295366e39e')) {function content_4f8295366e39e($_smarty_tpl) {?><p>
    Чтобы восстановить свой пароль, перейдите по ссылке:
    <code><a href="<?php echo $_smarty_tpl->tpl_vars['core']->value->mail_data['code_link'];?>
"><?php echo $_smarty_tpl->tpl_vars['core']->value->mail_data['code_link'];?>
</a></code>
</p>

<p>
    <em>Если ссылка не работает, скопируйте и вставьте ее в адресную строку браузера.</em>
</p><?php }} ?>