<?php /* Smarty version Smarty 3.1.4, created on 2011-12-10 17:41:14
         compiled from "Z:/home/loc/cugino/admin/templates\inc.footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:289174ee36f8a018137-86079811%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e077b5bf2f6583d7a4729bcd520420f1cb84a1f8' => 
    array (
      0 => 'Z:/home/loc/cugino/admin/templates\\inc.footer.tpl',
      1 => 1322914709,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '289174ee36f8a018137-86079811',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4ee36f8a04a5d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ee36f8a04a5d')) {function content_4ee36f8a04a5d($_smarty_tpl) {?><div class="copy">
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