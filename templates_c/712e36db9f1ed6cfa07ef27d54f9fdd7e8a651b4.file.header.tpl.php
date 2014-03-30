<?php /* Smarty version Smarty 3.1.4, created on 2014-02-04 22:56:51
         compiled from "/home/sdnadmin/site_new/templates/include/common/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:56370146252e9518d5e69e7-12217117%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '712e36db9f1ed6cfa07ef27d54f9fdd7e8a651b4' => 
    array (
      0 => '/home/sdnadmin/site_new/templates/include/common/header.tpl',
      1 => 1391540209,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56370146252e9518d5e69e7-12217117',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e9518d622e9',
  'variables' => 
  array (
    'mainpage' => 0,
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e9518d622e9')) {function content_52e9518d622e9($_smarty_tpl) {?><?php if (!$_smarty_tpl->tpl_vars['mainpage']->value){?>
    <a href="/" class="logo">SDN</a>
<?php }else{ ?>
    <a href="/" class="logo">SDN</a>
<?php }?>

<div class="hello">
    Модульный дата-центр SDN в Санкт-Петербурге
    <div class="bottom">Новый уровень сервиса</div>
</div>

<div class="contact">
    <div class="phones">
        <div class="phone"><?php echo $_smarty_tpl->tpl_vars['core']->value->getConstant('common','main_phone');?>
</div>
        <div class="phone"><?php echo $_smarty_tpl->tpl_vars['core']->value->getConstant('common','addtional_phone');?>
</div>
    </div>

    <a href="#" class="link call-me-opener">Заказать обратный звонок</a>
    <a href="#" class="link feedback-opener">Написать письмо</a>

    <a href="#" class="gray-block-button"><span>Личный кабинет</span></a>
</div>

<nav class="main">
    <?php echo $_smarty_tpl->getSubTemplate ("include/common/main-menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <a class="right-side-button" href="/contacts/visit">Заявка на посещение</a>
</nav><?php }} ?>