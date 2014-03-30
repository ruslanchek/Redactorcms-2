<?php /* Smarty version Smarty 3.1.4, created on 2014-01-31 13:18:31
         compiled from "/home/sdnadmin/site_new/templates/_service_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5476759152eb6a671880f8-37308866%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73f3268ed8fbf84d7188f27f6e807018f2315993' => 
    array (
      0 => '/home/sdnadmin/site_new/templates/_service_page.tpl',
      1 => 1391021834,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5476759152eb6a671880f8-37308866',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52eb6a671ef4d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52eb6a671ef4d')) {function content_52eb6a671ef4d($_smarty_tpl) {?><!DOCTYPE html>
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
                    <a href="/search" <?php if ($_smarty_tpl->tpl_vars['core']->value->page['id']==50){?>class="active"<?php }?>>Поиск по сайту</a>
                    <a href="/sitemap" <?php if ($_smarty_tpl->tpl_vars['core']->value->page['id']==70){?>class="active"<?php }?>>Карта сайта</a>
                </nav>
            </div>

            <div class="unit-75">
                <?php echo $_smarty_tpl->tpl_vars['core']->value->page['content'];?>

            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <?php echo $_smarty_tpl->getSubTemplate ("include/common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</footer>
</body>
</html><?php }} ?>