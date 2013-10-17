<?php /* Smarty version Smarty 3.1.4, created on 2013-10-16 17:04:23
         compiled from "/Users/ruslan/Sites/gts/templates/modules/news_item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:619738704525e8ed7801ff5-92139283%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e96be17154e1761a6c0e258fc4d2765c2506e37' => 
    array (
      0 => '/Users/ruslan/Sites/gts/templates/modules/news_item.tpl',
      1 => 1379944938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '619738704525e8ed7801ff5-92139283',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_525e8ed78a7c9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_525e8ed78a7c9')) {function content_525e8ed78a7c9($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date')) include '/Users/ruslan/Sites/gts/smarty/plugins/modifier.date.php';
?><div class="date gray"><?php echo smarty_modifier_date($_smarty_tpl->tpl_vars['core']->value->page['data']['date'],"date");?>
</div>
<div class="clear"></div>
<?php echo $_smarty_tpl->tpl_vars['core']->value->page['data']['text'];?>
<?php }} ?>