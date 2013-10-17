<?php /* Smarty version Smarty 3.1.4, created on 2013-10-16 17:30:07
         compiled from "/Users/ruslan/Sites/gts/templates/include/common/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1265008826525e846a2ef7f2-01477055%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '008e58dd2237f9159631b90af4413f2e42c2b435' => 
    array (
      0 => '/Users/ruslan/Sites/gts/templates/include/common/footer.tpl',
      1 => 1381930194,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1265008826525e846a2ef7f2-01477055',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_525e846a3ccb0',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_525e846a3ccb0')) {function content_525e846a3ccb0($_smarty_tpl) {?>&copy;

<?php if ($_smarty_tpl->tpl_vars['core']->value->getConstant('common','start_year')<date('Y')){?>
    <?php echo $_smarty_tpl->tpl_vars['core']->value->getConstant('common','start_year');?>
&ndash;
<?php }?>

<?php echo date('Y');?>


<?php echo $_smarty_tpl->tpl_vars['core']->value->getConstant('common','brand_name');?>


<br>

<a href="mailto:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['core']->value->getConstant('common','main_email'), ENT_QUOTES, 'UTF-8', true);?>
" class="black-link">
    <?php echo $_smarty_tpl->tpl_vars['core']->value->getConstant('common','main_email');?>

</a><?php }} ?>