<?php /* Smarty version Smarty 3.1.4, created on 2012-03-25 21:23:33
         compiled from "/var/www/fortyfour/data/www/pincher.fortyfour.ru/admin/templates/inc.footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14695056554f6f54953a4a30-19090954%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10bf8b1943e4dad9fc9cc2e094128a2b8796a942' => 
    array (
      0 => '/var/www/fortyfour/data/www/pincher.fortyfour.ru/admin/templates/inc.footer.tpl',
      1 => 1332574140,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14695056554f6f54953a4a30-19090954',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f6f54953e86a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f6f54953e86a')) {function content_4f6f54953e86a($_smarty_tpl) {?><div class="copy">
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