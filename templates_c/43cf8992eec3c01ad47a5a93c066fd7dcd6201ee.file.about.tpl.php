<?php /* Smarty version Smarty 3.1.4, created on 2014-02-11 21:08:15
         compiled from "/home/sdnadmin/site_new/templates/about.tpl" */ ?>
<?php /*%%SmartyHeaderCode:34621178352e95392d52a66-60499617%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43cf8992eec3c01ad47a5a93c066fd7dcd6201ee' => 
    array (
      0 => '/home/sdnadmin/site_new/templates/about.tpl',
      1 => 1392131587,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34621178352e95392d52a66-60499617',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e95392de93d',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e95392de93d')) {function content_52e95392de93d($_smarty_tpl) {?><!DOCTYPE html>
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
                    <a href="/about" <?php if ($_smarty_tpl->tpl_vars['core']->value->page['id']==87){?>class="active"<?php }?>>О компании</a>
                    <?php echo $_smarty_tpl->getSubTemplate ("include/common/menu-second-level.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('pid'=>87), 0);?>

                </nav>
            </div>

            <div class="unit-75">
                <?php echo $_smarty_tpl->tpl_vars['core']->value->page['content'];?>

            </div>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("include/common/news-shortlist.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<footer class="footer">
    <?php echo $_smarty_tpl->getSubTemplate ("include/common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</footer>
</body>
</html><?php }} ?>