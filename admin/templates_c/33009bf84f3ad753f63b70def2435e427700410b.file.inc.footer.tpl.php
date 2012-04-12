<?php /* Smarty version Smarty 3.1.4, created on 2012-03-24 09:57:10
         compiled from "/Users/ruslan/Documents/sites/pincher/admin/templates/inc.footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19398817674f6d7046308bf7-07126361%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33009bf84f3ad753f63b70def2435e427700410b' => 
    array (
      0 => '/Users/ruslan/Documents/sites/pincher/admin/templates/inc.footer.tpl',
      1 => 1332571836,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19398817674f6d7046308bf7-07126361',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f6d704633628',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f6d704633628')) {function content_4f6d704633628($_smarty_tpl) {?><div class="copy">
    <div class="left">
        &copy; 2008&ndash;<?php echo $_smarty_tpl->tpl_vars['main']->value->config['current_year'];?>
. <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('footer','copyright_text');?>
.
    </div>
    <div class="right">
        <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('footer','version');?>
 <a href="#"><?php echo $_smarty_tpl->tpl_vars['main']->value->config['current_version'];?>
</a>
    </div>
</div><?php }} ?>