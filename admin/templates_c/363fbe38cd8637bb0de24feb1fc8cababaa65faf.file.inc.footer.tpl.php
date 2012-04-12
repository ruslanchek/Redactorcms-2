<?php /* Smarty version Smarty 3.1.4, created on 2012-04-06 22:56:32
         compiled from "/Users/ruslan/Documents/sites/digitalbakery/admin/templates/inc.footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14316696464f74b21a0d9f94-11071195%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '363fbe38cd8637bb0de24feb1fc8cababaa65faf' => 
    array (
      0 => '/Users/ruslan/Documents/sites/digitalbakery/admin/templates/inc.footer.tpl',
      1 => 1333733876,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14316696464f74b21a0d9f94-11071195',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f74b21a1044c',
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f74b21a1044c')) {function content_4f74b21a1044c($_smarty_tpl) {?><div class="copy">
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