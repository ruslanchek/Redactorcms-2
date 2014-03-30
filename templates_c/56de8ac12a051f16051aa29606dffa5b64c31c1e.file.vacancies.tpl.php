<?php /* Smarty version Smarty 3.1.4, created on 2014-02-11 19:18:10
         compiled from "/home/sdnadmin/site_new/templates/vacancies.tpl" */ ?>
<?php /*%%SmartyHeaderCode:143165257552e9e2637a20d1-68144400%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56de8ac12a051f16051aa29606dffa5b64c31c1e' => 
    array (
      0 => '/home/sdnadmin/site_new/templates/vacancies.tpl',
      1 => 1392131461,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143165257552e9e2637a20d1-68144400',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e9e2637fad5',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e9e2637fad5')) {function content_52e9e2637fad5($_smarty_tpl) {?><!DOCTYPE html>
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

        <h1>Вакансии</h1>
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