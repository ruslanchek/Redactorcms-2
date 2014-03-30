<?php /* Smarty version Smarty 3.1.4, created on 2014-02-09 04:04:07
         compiled from "/home/sdnadmin/site_new/templates/include/common/head.tpl" */ ?>
<?php /*%%SmartyHeaderCode:83200904452e9518d5994e7-13417858%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55c658dae72c6725c6b742d73bb8e6934033a6d8' => 
    array (
      0 => '/home/sdnadmin/site_new/templates/include/common/head.tpl',
      1 => 1391904246,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83200904452e9518d5994e7-13417858',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e9518d5d4c0',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e9518d5d4c0')) {function content_52e9518d5d4c0($_smarty_tpl) {?><title><?php echo $_smarty_tpl->tpl_vars['core']->value->page['title'];?>
</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['core']->value->page['description'];?>
" />
<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['core']->value->page['keywords'];?>
" />

<meta name="viewport" content="width=device-width, initial-scale=0.8">

<meta name='yandex-verification' content='76c4be5d2834a50c' />

<link rel="icon" href="/resources/img/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/resources/img/favicon.ico" type="image/x-icon">

<link rel="stylesheet" type="text/css" href="/resources/fancybox/jquery.fancybox.css" />
<link rel="stylesheet" type="text/css" href="/resources/css/style.css" />

<script src="/resources/js/jquery.js"></script>
<script src="/resources/js/kube.tabs.js"></script>
<script src="/resources/js/jquery.maskedinput.min.js"></script>
<script src="/resources/js/jquery.mousewheel-3.0.6.pack.js"></script>
<script src="/resources/fancybox/jquery.fancybox.pack.js"></script>

<script src="/resources/js/core.js"></script>


    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


<?php echo $_smarty_tpl->tpl_vars['core']->value->getConstant('scripts','head_code');?>
<?php }} ?>