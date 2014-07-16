<?php /* Smarty version Smarty 3.1.4, created on 2014-07-09 18:57:25
         compiled from "/Users/ruslan/Sites/redactorcms2/templates/include/common/head.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2295719395318bdb05a25e8-69136312%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2fd44f6d8cf72d711f7d7d99f0efa25cf402ba89' => 
    array (
      0 => '/Users/ruslan/Sites/redactorcms2/templates/include/common/head.tpl',
      1 => 1404917680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2295719395318bdb05a25e8-69136312',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_5318bdb060099',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5318bdb060099')) {function content_5318bdb060099($_smarty_tpl) {?><title><?php echo $_smarty_tpl->tpl_vars['core']->value->page['title'];?>
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