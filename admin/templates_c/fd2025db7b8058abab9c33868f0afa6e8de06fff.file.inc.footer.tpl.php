<?php /* Smarty version Smarty 3.1.4, created on 2012-03-19 23:29:09
         compiled from "/var/www/fortyfour/data/www/stroymaster.fortyfour.ru/admin/templates/inc.footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17821952984f678905c4ed31-20962538%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd2025db7b8058abab9c33868f0afa6e8de06fff' => 
    array (
      0 => '/var/www/fortyfour/data/www/stroymaster.fortyfour.ru/admin/templates/inc.footer.tpl',
      1 => 1332177673,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17821952984f678905c4ed31-20962538',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f678905c8b3d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f678905c8b3d')) {function content_4f678905c8b3d($_smarty_tpl) {?><div class="copy">
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