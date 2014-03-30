<?php /* Smarty version Smarty 3.1.4, created on 2014-01-30 10:36:07
         compiled from "/home/sdnadmin/site_new/templates/documents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:183741114552e9f2d7d03444-98314353%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f50c3cf412e5b1b5dd2422aa601b782af7021ec0' => 
    array (
      0 => '/home/sdnadmin/site_new/templates/documents.tpl',
      1 => 1391021834,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183741114552e9f2d7d03444-98314353',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e9f2d7da586',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e9f2d7da586')) {function content_52e9f2d7da586($_smarty_tpl) {?><!DOCTYPE html>
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
                    <a href="/documents" <?php if ($_smarty_tpl->tpl_vars['core']->value->page['id']==83){?>class="active"<?php }?>>Документы</a>
                    <?php echo $_smarty_tpl->getSubTemplate ("include/common/menu-second-level.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('pid'=>83), 0);?>

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