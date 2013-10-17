<?php /* Smarty version Smarty 3.1.4, created on 2013-10-16 18:23:06
         compiled from "/Users/ruslan/Sites/gts/templates/news.tpl" */ ?>
<?php /*%%SmartyHeaderCode:144756803525e9267a32494-69885033%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28fb8f5d8977e31f7ced098e51b4e0315222e0b0' => 
    array (
      0 => '/Users/ruslan/Sites/gts/templates/news.tpl',
      1 => 1381933346,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144756803525e9267a32494-69885033',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_525e9267aedc4',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_525e9267aedc4')) {function content_525e9267aedc4($_smarty_tpl) {?><!DOCTYPE html>
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