<?php /* Smarty version Smarty 3.1.4, created on 2014-02-04 22:59:24
         compiled from "/home/sdnadmin/site_new/templates/inner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:166478488352f1388c367dc7-61309880%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4969b3d5a9ee952ca8a504712d6114a49d176be' => 
    array (
      0 => '/home/sdnadmin/site_new/templates/inner.tpl',
      1 => 1391021834,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166478488352f1388c367dc7-61309880',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52f1388c3df6d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f1388c3df6d')) {function content_52f1388c3df6d($_smarty_tpl) {?><!DOCTYPE html>
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
        <?php echo $_smarty_tpl->tpl_vars['core']->value->page['content'];?>

    </div>
</div>

<footer class="footer">
    <?php echo $_smarty_tpl->getSubTemplate ("include/common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</footer>
</body>
</html><?php }} ?>