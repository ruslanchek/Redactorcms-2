<?php /* Smarty version Smarty 3.1.4, created on 2013-12-19 23:49:10
         compiled from "/Users/ruslan/Sites/redactorcms2/templates/404.tpl" */ ?>
<?php /*%%SmartyHeaderCode:72933349152b34db65a75d2-99740257%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd045ed4997c361bfe81f3e466f7e0cfbd40bd3e5' => 
    array (
      0 => '/Users/ruslan/Sites/redactorcms2/templates/404.tpl',
      1 => 1381971321,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72933349152b34db65a75d2-99740257',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52b34db66a3e9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b34db66a3e9')) {function content_52b34db66a3e9($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <?php echo $_smarty_tpl->getSubTemplate ("include/common/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</head>
<body>
<div class="wrapper">
    <header class="header">
        <?php echo $_smarty_tpl->getSubTemplate ("include/common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </header>

    <div class="content">
        <div class="units-row">
            <div class="unit-20">
                &nbsp;
            </div>

            <div class="unit-80">
                <h1><?php echo $_smarty_tpl->tpl_vars['core']->value->page['h1'];?>
</h1>

                <p><?php echo $_smarty_tpl->tpl_vars['core']->value->page['title'];?>
</p>

                &mdash; <a href="/">Перейти на главную</a><br>
                &mdash; <a href="/sitemap">Карта сайта</a>
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