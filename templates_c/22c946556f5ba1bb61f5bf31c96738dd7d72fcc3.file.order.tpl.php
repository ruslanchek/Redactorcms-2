<?php /* Smarty version Smarty 3.1.4, created on 2013-10-16 17:09:22
         compiled from "/Users/ruslan/Sites/gts/templates/include/common/order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1069802603525e9002be58a1-35934172%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22c946556f5ba1bb61f5bf31c96738dd7d72fcc3' => 
    array (
      0 => '/Users/ruslan/Sites/gts/templates/include/common/order.tpl',
      1 => 1381928915,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1069802603525e9002be58a1-35934172',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_525e9002bf9f1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_525e9002bf9f1')) {function content_525e9002bf9f1($_smarty_tpl) {?><div class="order-block">
    <h2 class="uppercase">Сделать заказ</h2>

    <form action="#">
        <input type="text" placeholder="Производитель, маркировка"/>
        <input type="text" placeholder="Ваше имя"/>
        <input type="text" placeholder="Организация"/>
        <input type="text" placeholder="Телефон / e-mail"/>

        <input type="submit" class="btn btn-yellow" value="Заказать"/>
    </form>
</div><?php }} ?>