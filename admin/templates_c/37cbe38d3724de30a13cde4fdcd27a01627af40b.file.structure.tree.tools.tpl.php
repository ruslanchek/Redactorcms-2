<?php /* Smarty version Smarty 3.1.4, created on 2012-04-03 20:13:05
         compiled from "Z:/home/loc/digitalbakery/admin/templates\modules\structure.tree.tools.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18394f71a4c56a90b3-38431616%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37cbe38d3724de30a13cde4fdcd27a01627af40b' => 
    array (
      0 => 'Z:/home/loc/digitalbakery/admin/templates\\modules\\structure.tree.tools.tpl',
      1 => 1333466985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18394f71a4c56a90b3-38431616',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f71a4c56cbde',
  'variables' => 
  array (
    'main' => 0,
    'structure' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f71a4c56cbde')) {function content_4f71a4c56cbde($_smarty_tpl) {?><div class="right_block">
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