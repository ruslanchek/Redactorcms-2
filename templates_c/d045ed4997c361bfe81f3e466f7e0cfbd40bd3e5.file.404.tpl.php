<?php /* Smarty version Smarty 3.1.4, created on 2013-10-08 22:17:19
         compiled from "/Users/ruslan/Sites/redactorcms2/templates/404.tpl" */ ?>
<?php /*%%SmartyHeaderCode:153960765452544c2fdcf669-89696655%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd045ed4997c361bfe81f3e466f7e0cfbd40bd3e5' => 
    array (
      0 => '/Users/ruslan/Sites/redactorcms2/templates/404.tpl',
      1 => 1379944938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153960765452544c2fdcf669-89696655',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52544c2fef417',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52544c2fef417')) {function content_52544c2fef417($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title>Ошибка 404</title>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="страница не найдена" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="/resources/css/kube.css">
        <link rel="stylesheet" type="text/css" href="/resources/css/master.css">
        <link rel="stylesheet" type="text/css" href="/resources/css/halflings.css">

        <script type="text/javascript" src="/resources/js/jquery.js"></script>
        <script type="text/javascript" src="/resources/js/core.js"></script>

        
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script>
            var head = document.getElementsByTagName('head')[0], style = document.createElement('style');
            style.type = 'text/css';
            style.styleSheet.cssText = ':before,:after{content:none !important';
            head.appendChild(style);
            setTimeout(function(){ head.removeChild(style); }, 0);
        </script>
        <![endif]-->
        

        <?php echo $_smarty_tpl->tpl_vars['core']->value->getConstant('scripts','head_code');?>

    </head>

    <body>
        <?php echo $_smarty_tpl->getSubTemplate ("include/common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


        <div class="main-content limiter">
            <h1>
                Ошибка 404
            </h1>

            <p>Страница не найдена.</p>
            <p><a href="/">Вернуться на главную</a></p>
        </div>

        <?php echo $_smarty_tpl->getSubTemplate ("include/common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </body>
</html><?php }} ?>