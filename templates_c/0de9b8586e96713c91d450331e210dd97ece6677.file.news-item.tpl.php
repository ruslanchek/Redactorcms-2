<?php /* Smarty version Smarty 3.1.4, created on 2014-01-30 09:29:43
         compiled from "/home/sdnadmin/site_new/templates/modules/news-item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77273289152e9e3479a8531-13681905%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0de9b8586e96713c91d450331e210dd97ece6677' => 
    array (
      0 => '/home/sdnadmin/site_new/templates/modules/news-item.tpl',
      1 => 1391021834,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77273289152e9e3479a8531-13681905',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e9e347a12c5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e9e347a12c5')) {function content_52e9e347a12c5($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date')) include '/home/sdnadmin/site_new/smarty/plugins/modifier.date.php';
?><h1><?php echo $_smarty_tpl->tpl_vars['core']->value->page['h1'];?>
</h1>
<div class="date gray"><?php echo smarty_modifier_date($_smarty_tpl->tpl_vars['core']->value->page['data']['date'],"date");?>
</div>
<div class="clear"></div>
<?php echo $_smarty_tpl->tpl_vars['core']->value->page['item']['text'];?>
<?php }} ?>