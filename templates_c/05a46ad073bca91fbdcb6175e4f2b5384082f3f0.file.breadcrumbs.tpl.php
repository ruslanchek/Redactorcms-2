<?php /* Smarty version Smarty 3.1.4, created on 2014-03-06 22:26:00
         compiled from "/Users/ruslan/Sites/redactorcms2/templates/include/common/breadcrumbs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9186102745318bdb8d0d9d4-88107998%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05a46ad073bca91fbdcb6175e4f2b5384082f3f0' => 
    array (
      0 => '/Users/ruslan/Sites/redactorcms2/templates/include/common/breadcrumbs.tpl',
      1 => 1394129863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9186102745318bdb8d0d9d4-88107998',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
    'crumb' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_5318bdb8d5f17',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5318bdb8d5f17')) {function content_5318bdb8d5f17($_smarty_tpl) {?><div class="breadcrumb">
    <?php  $_smarty_tpl->tpl_vars["crumb"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["crumb"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->page['breadcrumbs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["crumb"]->key => $_smarty_tpl->tpl_vars["crumb"]->value){
$_smarty_tpl->tpl_vars["crumb"]->_loop = true;
?>
        <?php if ($_smarty_tpl->tpl_vars['crumb']->value['current']){?>
            <?php echo $_smarty_tpl->tpl_vars['crumb']->value['name'];?>

        <?php }else{ ?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['crumb']->value['path'];?>
"><?php echo $_smarty_tpl->tpl_vars['crumb']->value['name'];?>
</a> /
        <?php }?>
    <?php } ?>
</div><?php }} ?>