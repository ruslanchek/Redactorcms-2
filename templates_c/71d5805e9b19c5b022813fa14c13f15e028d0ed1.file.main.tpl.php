<?php /* Smarty version Smarty 3.1.4, created on 2014-07-09 18:57:24
         compiled from "/Users/ruslan/Sites/redactorcms2/templates/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21102413875318bdb04bc878-25183250%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71d5805e9b19c5b022813fa14c13f15e028d0ed1' => 
    array (
      0 => '/Users/ruslan/Sites/redactorcms2/templates/main.tpl',
      1 => 1404917680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21102413875318bdb04bc878-25183250',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_5318bdb059a49',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5318bdb059a49')) {function content_5318bdb059a49($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <?php echo $_smarty_tpl->getSubTemplate ("include/common/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</head>

<body>
<div class="limiter">
    <header class="header">
        <?php echo $_smarty_tpl->getSubTemplate ("include/common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('mainpage'=>true), 0);?>

    </header>

    <?php echo $_smarty_tpl->getSubTemplate ("include/common/slider.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <?php echo $_smarty_tpl->getSubTemplate ("include/common/flex-blocks.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>

<div class="limiter">
    <div class="banner-visit">
        <a href="#" class="button button-blue visit-opener">Записаться на экскурсию в модульный дата-центр SDN</a>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("include/common/tariffs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("include/common/news-shortlist.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<footer class="footer">
    <?php echo $_smarty_tpl->getSubTemplate ("include/common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</footer>
</body>
</html><?php }} ?>