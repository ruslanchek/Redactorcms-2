<?php /* Smarty version Smarty 3.1.4, created on 2012-04-10 12:34:56
         compiled from "Z:/home/loc/digitalbakery/templates\inner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:315264f7b3082975372-45614271%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f9c3077cbbf8f0ba11aa187f466d6ed4e6d2670' => 
    array (
      0 => 'Z:/home/loc/digitalbakery/templates\\inner.tpl',
      1 => 1333963648,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '315264f7b3082975372-45614271',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f7b3082a3952',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7b3082a3952')) {function content_4f7b3082a3952($_smarty_tpl) {?><!DOCTYPE HTML>
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


                <div id="load_place">
                    <?php echo $_smarty_tpl->tpl_vars['core']->value->page['content'];?>

                </div>

                <div class="clear"></div>
            </div>
        </div>

        <div id="footer" class="site_width_limiter menu_spacing">
            <?php echo $_smarty_tpl->getSubTemplate ("include/common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>

        <?php if ($_smarty_tpl->tpl_vars['core']->value->page['continuous']){?>
        <script>
            core.loadItems.init('<?php echo $_smarty_tpl->tpl_vars['core']->value->page['loading_url'];?>
');
        </script>
        <?php }?>
    </body>
</html><?php }} ?>