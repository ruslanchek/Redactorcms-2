<?php /* Smarty version Smarty 3.1.4, created on 2014-02-11 19:13:25
         compiled from "/home/sdnadmin/site_new/templates/404.tpl" */ ?>
<?php /*%%SmartyHeaderCode:143212134952e953b1ceb6c0-90727504%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7ef91a674332bbdb602b0468304e4a4a6bb44a7' => 
    array (
      0 => '/home/sdnadmin/site_new/templates/404.tpl',
      1 => 1392131597,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143212134952e953b1ceb6c0-90727504',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e953b1d7a31',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e953b1d7a31')) {function content_52e953b1d7a31($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <?php echo $_smarty_tpl->getSubTemplate ("include/common/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</head>

<body>
<div class="limiter">
    <header class="header">
        <?php echo $_smarty_tpl->getSubTemplate ("include/common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('mainpage'=>false), 0);?>

    </header>

    <div class="page-banner pb-<?php echo rand(1,5);?>
">
        <?php echo $_smarty_tpl->getSubTemplate ("include/common/breadcrumbs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <h1><?php echo $_smarty_tpl->tpl_vars['core']->value->page['h1'];?>
</h1>
    </div>

    <div class="inner-content">
        <div class="units-row-end">
            <div class="unit-25">
                <nav class="nav-side">
                    <a href="/">Главная страница</a>
                    <a href="/search">Поиск по сайту</a>
                    <a href="/sitemap">Карта сайта</a>
                </nav>
            </div>

            <div class="unit-75">
                Запрашиваемая вами страница не найдена. Возможно ее удалили, или же вы перешли по некорректной ссылке.
            </div>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("include/common/news-shortlist.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<footer class="footer">
    <?php echo $_smarty_tpl->getSubTemplate ("include/common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</footer>
</body>
</html><?php }} ?>