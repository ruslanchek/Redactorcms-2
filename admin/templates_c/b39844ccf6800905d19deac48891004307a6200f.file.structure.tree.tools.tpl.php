<?php /* Smarty version Smarty 3.1.4, created on 2012-04-09 13:09:52
         compiled from "/Users/ruslan/Documents/sites/digitalbakery/admin/templates/modules/structure.tree.tools.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18970814234f74c57b7a5520-03360355%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b39844ccf6800905d19deac48891004307a6200f' => 
    array (
      0 => '/Users/ruslan/Documents/sites/digitalbakery/admin/templates/modules/structure.tree.tools.tpl',
      1 => 1333733879,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18970814234f74c57b7a5520-03360355',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f74c57b7c84b',
  'variables' => 
  array (
    'main' => 0,
    'structure' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f74c57b7c84b')) {function content_4f74c57b7c84b($_smarty_tpl) {?><div class="right_block">
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