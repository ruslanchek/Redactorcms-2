<?php /* Smarty version Smarty 3.1.4, created on 2013-10-16 17:40:04
         compiled from "/Users/ruslan/Sites/gts/templates/contacts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1524639984525e935f11b538-33639285%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd85d34243d3adf581ad8e8bbf56dad4f6d2c6f5b' => 
    array (
      0 => '/Users/ruslan/Sites/gts/templates/contacts.tpl',
      1 => 1381930781,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1524639984525e935f11b538-33639285',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_525e935f2913c',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_525e935f2913c')) {function content_525e935f2913c($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <?php echo $_smarty_tpl->getSubTemplate ("include/common/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</head>
<body>
<div class="wrapper">
    <header class="header header">
        <?php echo $_smarty_tpl->getSubTemplate ("include/common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </header>

    <div class="content">
        <?php echo $_smarty_tpl->getSubTemplate ("include/common/breadcrumbs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


        <div class="units-row">
            <div class="unit-40">
                <h1><?php echo $_smarty_tpl->tpl_vars['core']->value->page['h1'];?>
</h1>

                <?php echo $_smarty_tpl->tpl_vars['core']->value->page['content'];?>

            </div>

            <div class="unit-60">
                <div class="map-container" style="height: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['core']->value->getConstant('yandex_maps','height'), ENT_QUOTES, 'UTF-8', true);?>
px">
                    <script type="text/javascript" charset="utf-8" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['core']->value->getConstant('yandex_maps','src'), ENT_QUOTES, 'UTF-8', true);?>
&width=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['core']->value->getConstant('yandex_maps','width'), ENT_QUOTES, 'UTF-8', true);?>
&height=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['core']->value->getConstant('yandex_maps','height'), ENT_QUOTES, 'UTF-8', true);?>
"></script>
                </div>
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