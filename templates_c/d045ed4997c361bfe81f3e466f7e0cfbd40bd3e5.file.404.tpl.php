<?php /* Smarty version Smarty 3.1.4, created on 2014-03-06 22:26:00
         compiled from "/Users/ruslan/Sites/redactorcms2/templates/404.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18545302325318bdb8984008-13333919%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd045ed4997c361bfe81f3e466f7e0cfbd40bd3e5' => 
    array (
      0 => '/Users/ruslan/Sites/redactorcms2/templates/404.tpl',
      1 => 1394129862,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18545302325318bdb8984008-13333919',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_5318bdb8a7701',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5318bdb8a7701')) {function content_5318bdb8a7701($_smarty_tpl) {?><!DOCTYPE html>
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