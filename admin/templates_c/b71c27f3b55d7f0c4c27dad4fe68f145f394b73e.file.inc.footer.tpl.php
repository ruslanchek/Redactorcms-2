<?php /* Smarty version Smarty 3.1.4, created on 2012-04-05 04:19:10
         compiled from "/var/www/fortyfour/data/www/digitalbakery.fortyfour.ru/admin/templates/inc.footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5775873294f7ce4fe4b5f62-21684777%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b71c27f3b55d7f0c4c27dad4fe68f145f394b73e' => 
    array (
      0 => '/var/www/fortyfour/data/www/digitalbakery.fortyfour.ru/admin/templates/inc.footer.tpl',
      1 => 1333584910,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5775873294f7ce4fe4b5f62-21684777',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f7ce4fe51578',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7ce4fe51578')) {function content_4f7ce4fe51578($_smarty_tpl) {?><div class="copy">
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