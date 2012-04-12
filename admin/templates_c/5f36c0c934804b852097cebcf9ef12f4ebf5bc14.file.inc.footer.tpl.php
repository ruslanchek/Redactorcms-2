<?php /* Smarty version Smarty 3.1.4, created on 2012-04-10 15:50:36
         compiled from "Z:/home/loc/digitalbakery/admin/templates\inc.footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:309944f71a4a71a0f96-75813414%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f36c0c934804b852097cebcf9ef12f4ebf5bc14' => 
    array (
      0 => 'Z:/home/loc/digitalbakery/admin/templates\\inc.footer.tpl',
      1 => 1333733876,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '309944f71a4a71a0f96-75813414',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f71a4a71cd6d',
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f71a4a71cd6d')) {function content_4f71a4a71cd6d($_smarty_tpl) {?><div class="copy">
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