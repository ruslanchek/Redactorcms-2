<?php /* Smarty version Smarty 3.1.4, created on 2013-10-17 05:00:35
         compiled from "/Users/ruslan/Sites/redactorcms2/templates/include/common/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:105791944452544c300dc023-53651027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '105791944452544c300dc023-53651027',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52544c3020b98',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52544c3020b98')) {function content_52544c3020b98($_smarty_tpl) {?>&copy;

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