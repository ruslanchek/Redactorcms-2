<?php /* Smarty version Smarty 3.1.4, created on 2012-04-09 14:20:49
         compiled from "/Users/ruslan/Documents/sites/digitalbakery/templates/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14033765964f78d16a0c3747-85276015%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cbdebd790043e25a2124903b1007cef24b0af0ae' => 
    array (
      0 => '/Users/ruslan/Documents/sites/digitalbakery/templates/main.tpl',
      1 => 1333963656,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14033765964f78d16a0c3747-85276015',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f78d16a1388a',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f78d16a1388a')) {function content_4f78d16a1388a($_smarty_tpl) {?><!DOCTYPE HTML>
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