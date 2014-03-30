<?php /* Smarty version Smarty 3.1.4, created on 2014-02-11 19:09:31
         compiled from "/home/sdnadmin/site_new/templates/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:123007560852e9518d4f0887-65917049%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ece842c3645f832b6b291ffcbb11a1e2e71357c' => 
    array (
      0 => '/home/sdnadmin/site_new/templates/main.tpl',
      1 => 1392131364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123007560852e9518d4f0887-65917049',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e9518d5867c',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e9518d5867c')) {function content_52e9518d5867c($_smarty_tpl) {?><!DOCTYPE html>
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