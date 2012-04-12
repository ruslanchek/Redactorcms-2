<?php /* Smarty version Smarty 3.1.4, created on 2011-12-10 12:44:34
         compiled from "Z:/home/loc/redactorcms/admin/templates\modules\structure.tree.tools.tpl" */ ?>
<?php /*%%SmartyHeaderCode:45734ee32a02ad1819-20481247%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e82c9e7af6e72fd6efcc4966405f21e40a036b8f' => 
    array (
      0 => 'Z:/home/loc/redactorcms/admin/templates\\modules\\structure.tree.tools.tpl',
      1 => 1322914709,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '45734ee32a02ad1819-20481247',
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
  'unifunc' => 'content_4ee32a02b0c83',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ee32a02b0c83')) {function content_4ee32a02b0c83($_smarty_tpl) {?><div class="right_block">
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