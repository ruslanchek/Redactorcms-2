<?php /* Smarty version Smarty 3.1.4, created on 2012-03-24 10:00:03
         compiled from "/Users/ruslan/Documents/sites/pincher/admin/templates/modules/structure.tree.tools.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21047003164f6d70f3ef3dd1-03270579%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d349115b874f7a6a43b4f701e08287648ef70cd' => 
    array (
      0 => '/Users/ruslan/Documents/sites/pincher/admin/templates/modules/structure.tree.tools.tpl',
      1 => 1332571837,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21047003164f6d70f3ef3dd1-03270579',
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
  'unifunc' => 'content_4f6d70f3f1551',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f6d70f3f1551')) {function content_4f6d70f3f1551($_smarty_tpl) {?><div class="right_block">
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