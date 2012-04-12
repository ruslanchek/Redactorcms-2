<?php /* Smarty version Smarty 3.1.4, created on 2012-04-09 13:27:14
         compiled from "/Users/ruslan/Documents/sites/digitalbakery/templates/projects.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7310088844f78d116642a13-78290203%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fcb4d6590a5a30d69fef833b3b50fc375e9ddeb5' => 
    array (
      0 => '/Users/ruslan/Documents/sites/digitalbakery/templates/projects.tpl',
      1 => 1333963632,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7310088844f78d116642a13-78290203',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f78d11676af0',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f78d11676af0')) {function content_4f78d11676af0($_smarty_tpl) {?><!DOCTYPE HTML>
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


                <ul class="top_menu">
                   <li><?php if ($_GET['mode']=='types'){?><b>Типология</b><?php }else{ ?><a href="<?php echo Utilities::getParamstring('mode');?>
mode=types">Типология</a><?php }?></li>
                   <li><?php if ($_GET['mode']=='chronology'){?><b>Хронология</b><?php }else{ ?><a href="<?php echo Utilities::getParamstring('mode');?>
mode=chronology">Хронология</a><?php }?></li>
                   <li><?php if (!$_GET['mode']){?><b>Алфавит</b><?php }else{ ?><a href="<?php echo $_smarty_tpl->tpl_vars['core']->value->uri;?>
">Алфавит</a><?php }?></li>
                   <li><?php if ($_GET['mode']=='scope'){?><b>Масштаб</b><?php }else{ ?><a href="<?php echo Utilities::getParamstring('mode');?>
mode=scope">Масштаб</a><?php }?></li>
                   <li><?php if ($_GET['mode']=='stage'){?><b>Стадия</b><?php }else{ ?><a href="<?php echo Utilities::getParamstring('mode');?>
mode=stage">Стадия</a><?php }?></li>
                   <li><?php if ($_GET['mode']=='map'){?><b>Карта</b><?php }else{ ?><a href="<?php echo Utilities::getParamstring('mode');?>
mode=map">Карта</a><?php }?></li>
                </ul>

                <div id="load_place">
                    <?php echo $_smarty_tpl->tpl_vars['core']->value->page['content'];?>

                </div>

                <div class="clear"></div>
            </div>
        </div>

        <div id="footer" class="site_width_limiter menu_spacing">
            <?php echo $_smarty_tpl->getSubTemplate ("include/common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>

        <script src="http://maps.google.com/maps/api/js?sensor=false"></script>

        <?php if ($_smarty_tpl->tpl_vars['core']->value->page['continuous']){?>
        <script>
            core.loadItems.init('<?php echo $_smarty_tpl->tpl_vars['core']->value->page['loading_url'];?>
');
        </script>
        <?php }?>

        <script>
            core.projects.init();
        </script>
    </body>
</html><?php }} ?>