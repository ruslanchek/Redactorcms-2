<?php /* Smarty version Smarty 3.1.4, created on 2013-10-16 17:18:43
         compiled from "/Users/ruslan/Sites/gts/templates/inner-80-20.tpl" */ ?>
<?php /*%%SmartyHeaderCode:353844809525e91bce13074-82888631%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b25fc04e09e9b90d59c714713b4ca9684555962b' => 
    array (
      0 => '/Users/ruslan/Sites/gts/templates/inner-80-20.tpl',
      1 => 1381929499,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '353844809525e91bce13074-82888631',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_525e91bcf2398',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_525e91bcf2398')) {function content_525e91bcf2398($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <?php echo $_smarty_tpl->getSubTemplate ("include/common/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</head>
<body>
<div class="wrapper">
    <header class="header header-mainpage">
        <?php echo $_smarty_tpl->getSubTemplate ("include/common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </header>

    <div class="content">
        <div class="units-row">
            <div class="unit-80">

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