<?php /* Smarty version Smarty 3.1.4, created on 2013-12-17 21:30:45
         compiled from "/Users/ruslan/Sites/redactorcms2/templates/include/common/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:57171609152b08a4555aa83-60585806%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '57171609152b08a4555aa83-60585806',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52b08a455d726',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b08a455d726')) {function content_52b08a455d726($_smarty_tpl) {?>&copy;

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