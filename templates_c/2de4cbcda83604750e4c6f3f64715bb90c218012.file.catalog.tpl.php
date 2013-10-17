<?php /* Smarty version Smarty 3.1.4, created on 2013-10-16 18:19:56
         compiled from "/Users/ruslan/Sites/gts/templates/catalog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1526364255525ea08ca12fa1-15111906%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2de4cbcda83604750e4c6f3f64715bb90c218012' => 
    array (
      0 => '/Users/ruslan/Sites/gts/templates/catalog.tpl',
      1 => 1381930362,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1526364255525ea08ca12fa1-15111906',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_525ea08caf27c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_525ea08caf27c')) {function content_525ea08caf27c($_smarty_tpl) {?><!DOCTYPE html>
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
            <div class="unit-80">
                <?php echo $_smarty_tpl->getSubTemplate ("include/common/breadcrumbs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


                <h1><?php echo $_smarty_tpl->tpl_vars['core']->value->page['h1'];?>
</h1>

                <?php echo $_smarty_tpl->tpl_vars['core']->value->page['content'];?>

            </div>

            <div class="unit-20">

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