<?php /* Smarty version Smarty 3.1.4, created on 2012-04-10 12:34:46
         compiled from "Z:/home/loc/digitalbakery/templates\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22494f7b21493e5489-11103931%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '450c43ced4f77a49c29d3576f97cc57bda49d10e' => 
    array (
      0 => 'Z:/home/loc/digitalbakery/templates\\main.tpl',
      1 => 1333963656,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22494f7b21493e5489-11103931',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f7b21494242b',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7b21494242b')) {function content_4f7b21494242b($_smarty_tpl) {?><!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $_smarty_tpl->getSubTemplate ("include/common/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </head>
    <body>
        <div id="wrapper">
            <div id="header" class="site_width_limiter menu_spacing">
                <a href="/" id="logo"></a>

                <form class="search_form" action="/search" method="get">
                    
                    <input class="search_text unactive" type="text" name="q" value="Поиск на сайте"
                           onblur="if(this.value == ''){this.value = 'Поиск на сайте'; this.className='search_text unactive'}"
                           onfocus="if(this.value == 'Поиск на сайте'){this.value = ''; this.className='search_text'}" />
                    <input class="search_go" type="submit" value="" title="Найти" />
                    
                </form>

                <?php echo $_smarty_tpl->getSubTemplate ("include/common/user_block.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            </div>

            <div id="content" class="site_width_limiter menu_spacing">
                <?php echo $_smarty_tpl->getSubTemplate ("include/common/left_side_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


                <?php echo $_smarty_tpl->tpl_vars['core']->value->page['content'];?>


                <div class="clear"></div>
            </div>

            <script src="http://maps.google.com/maps/api/js?sensor=false"></script>

            <script>
                core.projects.init();
            </script>
        </div>

        <div id="footer" class="site_width_limiter menu_spacing">
            <?php echo $_smarty_tpl->getSubTemplate ("include/common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </body>
</html><?php }} ?>