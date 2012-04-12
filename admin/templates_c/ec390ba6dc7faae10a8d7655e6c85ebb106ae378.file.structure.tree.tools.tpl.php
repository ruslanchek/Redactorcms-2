<?php /* Smarty version Smarty 3.1.4, created on 2012-03-19 15:57:55
         compiled from "Z:/home/loc/susl/admin/templates\modules\structure.tree.tools.tpl" */ ?>
<?php /*%%SmartyHeaderCode:90764f671f43309fe5-01031955%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec390ba6dc7faae10a8d7655e6c85ebb106ae378' => 
    array (
      0 => 'Z:/home/loc/susl/admin/templates\\modules\\structure.tree.tools.tpl',
      1 => 1332157838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '90764f671f43309fe5-01031955',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
    'structure' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f671f4332d4c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f671f4332d4c')) {function content_4f671f4332d4c($_smarty_tpl) {?><div class="right_block">
    <h2><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('structure','tree_status_header');?>
</h2>
    <div class="inner">
        <h3><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('structure','tree_status_param_item_count');?>
</h3>
        <p>
            <?php echo $_smarty_tpl->tpl_vars['structure']->value->getTreeCount();?>

        </p>
    </div>
</div><?php }} ?>