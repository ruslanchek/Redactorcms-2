<?php /* Smarty version Smarty 3.1.4, created on 2013-10-17 04:51:57
         compiled from "/Users/ruslan/Sites/gts/templates/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1731721936525e8469e49361-34852121%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a748a0d59641c4627fd20155ef6e2a21ac196029' => 
    array (
      0 => '/Users/ruslan/Sites/gts/templates/main.tpl',
      1 => 1381971116,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1731721936525e8469e49361-34852121',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_525e846a0499b',
  'variables' => 
  array (
    'core' => 0,
    'item' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_525e846a0499b')) {function content_525e846a0499b($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/Users/ruslan/Sites/gts/smarty/plugins/modifier.truncate.php';
?><!DOCTYPE html>
<html>
<head>
    <?php echo $_smarty_tpl->getSubTemplate ("include/common/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</head>
<body>
<div class="wrapper">
<header class="header header-mainpage">
    <?php echo $_smarty_tpl->getSubTemplate ("include/common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('mainpage'=>true), 0);?>


    <div class="search">
        <form action="/search">
            <input type="text" name="sq" placeholder="Поиск"/>
            <input class="btn" type="submit" value="Найти"/>
        </form>
    </div>
</header>

<?php echo $_smarty_tpl->getSubTemplate ("include/common/slider.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="content">
<div class="units-row">
<div class="unit-80">
<h2 class="uppercase">Каталог</h2>

<div class="units-row-end">
<div class="unit-20">
    <ul class="catalog-map">
        <li>
            <a href="#1">Контроль движения</a>

            <ul>
                <li><a href="#2">Амортизаторы</a></li>
                <li><a href="#">Тормоза</a></li>
            </ul>
        </li>

        <li>
            <a href="#1">Оборудование для обеспечения микроклимата</a>

            <ul>
                <li><a href="#2">Обогреватели</a></li>
                <li><a href="#">Системы охлождения</a></li>
                <li><a href="#">Вентиляция</a></li>
                <li><a href="#">Системы охлождения</a></li>
            </ul>
        </li>

        <li>
            <a href="#1">Оптическая и лазерная техника</a>
        </li>

        <li>
            <a href="#1">Подъемно-транспортное оборудование</a>
        </li>

        <li>
            <a href="#1">Крепеж и зажимные устройства</a>

            <ul>
                <li><a href="#2">Мертически крепеж</a></li>
                <li><a href="#">Зажимы</a></li>
                <li><a href="#">Вентиляция</a></li>
            </ul>
        </li>

        <li>
            <a href="#1">Приводная техника</a>

            <ul>
                <li><a href="#2">Подшипники</a></li>
                <li><a href="#">Редукторы</a></li>
                <li><a href="#">Приводы</a></li>
                <li><a href="#">Валы</a></li>
                <li><a href="#">Муфты</a></li>
                <li><a href="#">Оси</a></li>
            </ul>
        </li>
    </ul>
</div>

<div class="unit-20">
    <ul class="catalog-map">
        <li>
            <a href="#1">Контроль движения</a>

            <ul>
                <li><a href="#2">Амортизаторы</a></li>
                <li><a href="#">Тормоза</a></li>
            </ul>
        </li>

        <li>
            <a href="#1">Оборудование для обеспечения микроклимата</a>

            <ul>
                <li><a href="#2">Обогреватели</a></li>
                <li>
                    <a href="#">Системы охлождения</a>
                    <ul>
                        <li><a href="#2">Амортизаторы</a></li>
                        <li><a href="#">Тормоза</a></li>
                    </ul>
                </li>
                <li><a href="#">Вентиляция</a></li>
                <li><a href="#">Системы охлождения</a></li>
            </ul>
        </li>

        <li>
            <a href="#1">Оптическая и лазерная техника</a>
        </li>

        <li>
            <a href="#1">Подъемно-транспортное оборудование</a>
        </li>

        <li>
            <a href="#1">Крепеж и зажимные устройства</a>

            <ul>
                <li><a href="#2">Мертически крепеж</a></li>
                <li><a href="#">Зажимы</a></li>
                <li><a href="#">Вентиляция</a></li>
            </ul>
        </li>

        <li>
            <a href="#1">Приводная техника</a>

            <ul>
                <li><a href="#2">Подшипники</a></li>
                <li><a href="#">Редукторы</a></li>
                <li><a href="#">Приводы</a></li>
                <li><a href="#">Валы</a></li>
                <li><a href="#">Муфты</a></li>
                <li><a href="#">Оси</a></li>
            </ul>
        </li>
    </ul>
</div>

<div class="unit-20">
    <ul class="catalog-map">
        <li>
            <a href="#1">Контроль движения</a>

            <ul>
                <li><a href="#2">Амортизаторы</a></li>
                <li><a href="#">Тормоза</a></li>
            </ul>
        </li>

        <li>
            <a href="#1">Оборудование для обеспечения микроклимата</a>

            <ul>
                <li><a href="#2">Обогреватели</a></li>
                <li><a href="#">Системы охлождения</a></li>
                <li><a href="#">Вентиляция</a></li>
                <li><a href="#">Системы охлождения</a></li>
            </ul>
        </li>

        <li>
            <a href="#1">Оптическая и лазерная техника</a>
        </li>

        <li>
            <a href="#1">Подъемно-транспортное оборудование</a>
        </li>

        <li>
            <a href="#1">Крепеж и зажимные устройства</a>

            <ul>
                <li><a href="#2">Мертически крепеж</a></li>
                <li><a href="#">Зажимы</a></li>
                <li><a href="#">Вентиляция</a></li>
            </ul>
        </li>

        <li>
            <a href="#1">Приводная техника</a>

            <ul>
                <li><a href="#2">Подшипники</a></li>
                <li><a href="#">Редукторы</a></li>
                <li><a href="#">Приводы</a></li>
                <li><a href="#">Валы</a></li>
                <li><a href="#">Муфты</a></li>
                <li><a href="#">Оси</a></li>
            </ul>
        </li>
    </ul>
</div>

<div class="unit-20">
    <ul class="catalog-map">
        <li>
            <a href="#1">Контроль движения</a>

            <ul>
                <li><a href="#2">Амортизаторы</a></li>
                <li><a href="#">Тормоза</a></li>
            </ul>
        </li>

        <li>
            <a href="#1">Оборудование для обеспечения микроклимата</a>

            <ul>
                <li><a href="#2">Обогреватели</a></li>
                <li><a href="#">Системы охлождения</a></li>
                <li><a href="#">Вентиляция</a></li>
                <li><a href="#">Системы охлождения</a></li>
            </ul>
        </li>

        <li>
            <a href="#1">Оптическая и лазерная техника</a>
        </li>

        <li>
            <a href="#1">Подъемно-транспортное оборудование</a>
        </li>

        <li>
            <a href="#1">Крепеж и зажимные устройства</a>

            <ul>
                <li><a href="#2">Мертически крепеж</a></li>
                <li><a href="#">Зажимы</a></li>
                <li><a href="#">Вентиляция</a></li>
            </ul>
        </li>

        <li>
            <a href="#1">Приводная техника</a>

            <ul>
                <li><a href="#2">Подшипники</a></li>
                <li><a href="#">Редукторы</a></li>
                <li><a href="#">Приводы</a></li>
                <li><a href="#">Валы</a></li>
                <li><a href="#">Муфты</a></li>
                <li><a href="#">Оси</a></li>
            </ul>
        </li>
    </ul>
</div>
</div>

<hr>

<h2 class="uppercase">Производители</h2>

<div class="catalog-cell-items cci-makers">
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->getMakersShort(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <?php $_smarty_tpl->tpl_vars['image'] = new Smarty_variable($_smarty_tpl->tpl_vars['core']->value->getItemSingleImage('section_22',$_smarty_tpl->tpl_vars['item']->value['id'],'col_158'), null, 0);?>
        <div class="catalog-cell-item">
            <a href="#">
                <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['path'], ENT_QUOTES, 'UTF-8', true);?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
_sq.<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['extension'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"/>

                <h3><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</h3>
                <span class="info">
                    <div class="name"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</div>
                    <div class="country"><?php echo $_smarty_tpl->tpl_vars['item']->value['country'];?>
</div>
                    <div class="desc"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['announce'],130,"...",false);?>
</div>
                </span>
            </a>
        </div>
    <?php } ?>

    <div class="clear"></div>
</div>

<br>

<div class="text-centered">
    <a class="btn" href="/makers">Все производители</a>
</div>

<br>
<br>
</div>

<div class="unit-20">
    <?php echo $_smarty_tpl->getSubTemplate ("include/common/order.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <?php echo $_smarty_tpl->getSubTemplate ("include/common/news-shortlist.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
</div>
</div>

<footer class="footer">
    <?php echo $_smarty_tpl->getSubTemplate ("include/common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</footer>
</div>

<?php echo $_smarty_tpl->tpl_vars['core']->value->getConstant('scripts','body_code');?>


</body>
</html><?php }} ?>