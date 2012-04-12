<?php /* Smarty version Smarty 3.1.4, created on 2012-04-05 04:18:58
         compiled from "/var/www/fortyfour/data/www/digitalbakery.fortyfour.ru/templates/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10233328764f797478a13222-10895688%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6498dc1fa742712d70d428d8b32c70edfb632ba' => 
    array (
      0 => '/var/www/fortyfour/data/www/digitalbakery.fortyfour.ru/templates/main.tpl',
      1 => 1333555938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10233328764f797478a13222-10895688',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f797478a683f',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f797478a683f')) {function content_4f797478a683f($_smarty_tpl) {?><!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $_smarty_tpl->getSubTemplate ("include/common/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </head>
    <body>
        <div id="wrapper">
            <div id="top">
                <div class="top_inner site_width_limiter menu_spacing">
                    <a class="login_button" href="javascript:void(0)">Личный кабинет</a>
                </div>
            </div>

            <div id="header" class="site_width_limiter menu_spacing">
                <a href="/" id="logo"></a>

                <form class="search_form" action="/search" method="get">
                    
                    <input class="search_text unactive" type="text" name="q" value="Поиск на сайте"
                           onblur="if(this.value == ''){this.value = 'Поиск на сайте'; this.className='search_text unactive'}"
                           onfocus="if(this.value == 'Поиск на сайте'){this.value = ''; this.className='search_text'}" />
                    <input class="search_go" type="submit" value="" title="Найти" />
                    
                </form>
            </div>

            <div id="content" class="site_width_limiter menu_spacing">
                <?php echo $_smarty_tpl->getSubTemplate ("include/common/left_side_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


                <?php echo $_smarty_tpl->tpl_vars['core']->value->page['content'];?>


                <div class="clear"></div>
            </div>
        </div>

        <div id="footer" class="site_width_limiter menu_spacing">
            <?php echo $_smarty_tpl->getSubTemplate ("include/common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </body>
</html><?php }} ?>