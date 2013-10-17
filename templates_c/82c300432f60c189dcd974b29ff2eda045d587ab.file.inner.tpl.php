<?php /* Smarty version Smarty 3.1.4, created on 2013-10-16 19:38:58
         compiled from "/Users/ruslan/Sites/gts/templates/inner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:700485209525e88590db419-38292197%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82c300432f60c189dcd974b29ff2eda045d587ab' => 
    array (
      0 => '/Users/ruslan/Sites/gts/templates/inner.tpl',
      1 => 1381937936,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '700485209525e88590db419-38292197',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_525e88591bede',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_525e88591bede')) {function content_525e88591bede($_smarty_tpl) {?><!DOCTYPE html>
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