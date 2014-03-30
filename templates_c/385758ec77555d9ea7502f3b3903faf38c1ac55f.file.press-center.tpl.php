<?php /* Smarty version Smarty 3.1.4, created on 2014-02-11 19:13:28
         compiled from "/home/sdnadmin/site_new/templates/press-center.tpl" */ ?>
<?php /*%%SmartyHeaderCode:61368094852e9538676ab51-72085995%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '385758ec77555d9ea7502f3b3903faf38c1ac55f' => 
    array (
      0 => '/home/sdnadmin/site_new/templates/press-center.tpl',
      1 => 1392131525,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '61368094852e9538676ab51-72085995',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e9538685bd6',
  'variables' => 
  array (
    'pid' => 0,
    'core' => 0,
    'item' => 0,
    'h1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e9538685bd6')) {function content_52e9538685bd6($_smarty_tpl) {?><!DOCTYPE html>
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


        <?php $_smarty_tpl->tpl_vars['h1'] = new Smarty_variable('', null, 0);?>

        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->getInlineMenu(3,$_smarty_tpl->tpl_vars['pid']->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['core']->value->page['id']){?>
                <?php $_smarty_tpl->tpl_vars['h1'] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value['name'], null, 0);?>
            <?php }?>
        <?php } ?>

        <?php if ($_smarty_tpl->tpl_vars['h1']->value==''){?>
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->getInlineMenu(3,$_smarty_tpl->tpl_vars['pid']->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['core']->value->page['pid']){?>
                    <?php $_smarty_tpl->tpl_vars['h1'] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value['name'], null, 0);?>
                <?php }?>
            <?php } ?>
        <?php }?>

        <h1><?php echo $_smarty_tpl->tpl_vars['h1']->value;?>
</h1>
    </div>

    <div class="inner-content">
        <div class="units-row-end">
            <div class="unit-25">
                <nav class="nav-side">
                    <a href="/market-press" <?php if ($_smarty_tpl->tpl_vars['core']->value->page['id']==17){?>class="active"<?php }?>>Маркет-пресс</a>
                    <?php echo $_smarty_tpl->getSubTemplate ("include/common/menu-second-level.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('pid'=>17), 0);?>

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