<?php /* Smarty version Smarty 3.1.4, created on 2011-12-10 12:44:34
         compiled from "Z:/home/loc/redactorcms/admin/templates\inc.footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85304ee32a02b15d38-79327400%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '009bdaf758d0e5efa76de254d503529a0e652f59' => 
    array (
      0 => 'Z:/home/loc/redactorcms/admin/templates\\inc.footer.tpl',
      1 => 1322914709,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85304ee32a02b15d38-79327400',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4ee32a02b47d9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ee32a02b47d9')) {function content_4ee32a02b47d9($_smarty_tpl) {?><div class="copy">
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