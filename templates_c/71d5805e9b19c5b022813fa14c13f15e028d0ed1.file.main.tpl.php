<?php /* Smarty version Smarty 3.1.4, created on 2013-10-02 19:23:15
         compiled from "/Users/ruslan/Sites/redactorcms2/templates/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:571763119524c3a63586d86-02878212%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71d5805e9b19c5b022813fa14c13f15e028d0ed1' => 
    array (
      0 => '/Users/ruslan/Sites/redactorcms2/templates/main.tpl',
      1 => 1379944938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '571763119524c3a63586d86-02878212',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_524c3a636ff34',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_524c3a636ff34')) {function content_524c3a636ff34($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <?php echo $_smarty_tpl->getSubTemplate ("include/common/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <body>
        <header class="header-mainpage">
            <div class="inner-block limiter">
                <div class="top">
                    <span class="logo"></span>

                    <?php echo $_smarty_tpl->getSubTemplate ("include/common/header-phone.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    <?php echo $_smarty_tpl->getSubTemplate ("include/common/main_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                </div>

                <?php echo $_smarty_tpl->getSubTemplate ("include/common/slider.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


                <div class="row">
                    <div class="threefifth centered text-centered">
                        <?php echo $_smarty_tpl->tpl_vars['core']->value->getPage(67);?>

                    </div>
                </div>
            </div>
        </header>

        <div class="main-content limiter">
            <div class="row">
                <div class="third">
                    <?php echo $_smarty_tpl->tpl_vars['core']->value->getPage(65);?>

                </div>

                <div class="third">
                    <?php echo $_smarty_tpl->tpl_vars['core']->value->getPage(66);?>

                </div>

                <div class="third">
                    <?php echo $_smarty_tpl->getSubTemplate ("include/common/price-demand.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    <?php echo $_smarty_tpl->getSubTemplate ("include/common/events-shortlist.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    <?php echo $_smarty_tpl->getSubTemplate ("include/common/news-shortlist.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                </div>
            </div>
        </div>

        <?php echo $_smarty_tpl->getSubTemplate ("include/common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </body>
</html><?php }} ?>