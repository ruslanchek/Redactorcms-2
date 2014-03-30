<?php /* Smarty version Smarty 3.1.4, created on 2014-01-29 23:16:20
         compiled from "/home/sdnadmin/site_new/templates/articles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85675561352e95384b0e923-34430597%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8ad35aa381dbe4a1f1b4ffc3f081529bdde491e' => 
    array (
      0 => '/home/sdnadmin/site_new/templates/articles.tpl',
      1 => 1391021834,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85675561352e95384b0e923-34430597',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e95384b59c6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e95384b59c6')) {function content_52e95384b59c6($_smarty_tpl) {?><!DOCTYPE html>
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

        <h1>Полезная информация</h1>
    </div>

    <div class="inner-content">
        <h1><?php echo $_smarty_tpl->tpl_vars['core']->value->page['item']['name'];?>
</h1>
		<?php echo $_smarty_tpl->tpl_vars['core']->value->page['content'];?>

    </div>
</div>

<footer class="footer">
    <?php echo $_smarty_tpl->getSubTemplate ("include/common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</footer>
</body>
</html><?php }} ?>