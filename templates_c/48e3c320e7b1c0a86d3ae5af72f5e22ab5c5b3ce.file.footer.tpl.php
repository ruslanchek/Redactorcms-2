<?php /* Smarty version Smarty 3.1.4, created on 2013-12-19 23:49:10
         compiled from "/Users/ruslan/Sites/redactorcms2/templates/include/common/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:80050124852b34db684a463-78881096%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48e3c320e7b1c0a86d3ae5af72f5e22ab5c5b3ce' => 
    array (
      0 => '/Users/ruslan/Sites/redactorcms2/templates/include/common/footer.tpl',
      1 => 1381930194,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80050124852b34db684a463-78881096',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52b34db68c4df',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b34db68c4df')) {function content_52b34db68c4df($_smarty_tpl) {?>&copy;

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