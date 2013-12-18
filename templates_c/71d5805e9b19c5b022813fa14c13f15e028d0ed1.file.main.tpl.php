<?php /* Smarty version Smarty 3.1.4, created on 2013-12-17 21:30:43
         compiled from "/Users/ruslan/Sites/redactorcms2/templates/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:142080537652b08a43d77847-84516301%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71d5805e9b19c5b022813fa14c13f15e028d0ed1' => 
    array (
      0 => '/Users/ruslan/Sites/redactorcms2/templates/main.tpl',
      1 => 1383839963,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142080537652b08a43d77847-84516301',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
    'mainpage_text' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52b08a43f1ea1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b08a43f1ea1')) {function content_52b08a43f1ea1($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <?php echo $_smarty_tpl->getSubTemplate ("include/common/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</head>
<body>
<div class="wrapper">
    <header class="header header-mainpage">
        <?php echo $_smarty_tpl->getSubTemplate ("include/common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('mainpage'=>true), 0);?>


        <div class="search">
            <form action="/search">
                <input type="text" name="sq" placeholder="Поиск"/>
                <input class="btn" type="submit" value="Найти"/>
            </form>
        </div>
    </header>

    <?php echo $_smarty_tpl->getSubTemplate ("include/common/slider.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <div class="content">
        <div class="units-row">
            <div class="unit-80">
                <?php $_smarty_tpl->tpl_vars['mainpage_text'] = new Smarty_variable($_smarty_tpl->tpl_vars['core']->value->getPage(76), null, 0);?>

                <?php if ($_smarty_tpl->tpl_vars['mainpage_text']->value){?>
                    <?php echo $_smarty_tpl->tpl_vars['mainpage_text']->value;?>

                    <hr>
                <?php }?>

                <h2 class="uppercase">Каталог</h2>

                <?php echo $_smarty_tpl->getSubTemplate ("include/common/catalog-full-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


                <hr>

                <h2 class="uppercase">Производители</h2>

                <?php echo $_smarty_tpl->getSubTemplate ("include/common/makers-short.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('items'=>$_smarty_tpl->tpl_vars['core']->value->getMakers(16)), 0);?>


                <br>

                <div class="text-centered">
                    <a class="btn" href="/makers">Все производители</a>
                </div>

                <br>
                <br>
            </div>

            <div class="unit-20">
                <?php echo $_smarty_tpl->getSubTemplate ("include/common/order.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


                <?php echo $_smarty_tpl->getSubTemplate ("include/common/news-shortlist.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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