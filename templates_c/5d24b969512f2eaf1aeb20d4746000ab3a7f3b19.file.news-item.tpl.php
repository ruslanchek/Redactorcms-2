<?php /* Smarty version Smarty 3.1.4, created on 2013-10-17 04:16:58
         compiled from "/Users/ruslan/Sites/gts/templates/modules/news-item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1543463782525e9ffa2d5898-27783265%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d24b969512f2eaf1aeb20d4746000ab3a7f3b19' => 
    array (
      0 => '/Users/ruslan/Sites/gts/templates/modules/news-item.tpl',
      1 => 1381968996,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1543463782525e9ffa2d5898-27783265',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_525e9ffa36616',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_525e9ffa36616')) {function content_525e9ffa36616($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date')) include '/Users/ruslan/Sites/gts/smarty/plugins/modifier.date.php';
?><span class="date color-gray"><?php echo smarty_modifier_date($_smarty_tpl->tpl_vars['core']->value->page['item']['date'],"date");?>
 года</span><br>

<h1><?php echo $_smarty_tpl->tpl_vars['core']->value->page['h1'];?>
</h1>

<?php echo $_smarty_tpl->tpl_vars['core']->value->page['item']['text'];?>
<?php }} ?>