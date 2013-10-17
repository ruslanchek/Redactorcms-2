<?php /* Smarty version Smarty 3.1.4, created on 2013-10-17 04:55:06
         compiled from "/Users/ruslan/Sites/gts/templates/404.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1361589234525e846a8f9f53-85574774%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c18006049757828a212b5f15fa334c253ae561f' => 
    array (
      0 => '/Users/ruslan/Sites/gts/templates/404.tpl',
      1 => 1381971304,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1361589234525e846a8f9f53-85574774',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_525e846aa01a9',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_525e846aa01a9')) {function content_525e846aa01a9($_smarty_tpl) {?><!DOCTYPE html>
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

                &mdash; <a href="/">Вернуться на главную</a><br>
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