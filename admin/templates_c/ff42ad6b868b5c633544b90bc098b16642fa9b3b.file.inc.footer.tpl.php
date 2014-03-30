<?php /* Smarty version Smarty 3.1.4, created on 2014-01-30 02:00:54
         compiled from "/home/sdnadmin/site_new/admin/templates/inc.footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:153765200252e97a16ee1bb3-97709299%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff42ad6b868b5c633544b90bc098b16642fa9b3b' => 
    array (
      0 => '/home/sdnadmin/site_new/admin/templates/inc.footer.tpl',
      1 => 1391021811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153765200252e97a16ee1bb3-97709299',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e97a16f1cfc',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e97a16f1cfc')) {function content_52e97a16f1cfc($_smarty_tpl) {?><div class="copy">
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