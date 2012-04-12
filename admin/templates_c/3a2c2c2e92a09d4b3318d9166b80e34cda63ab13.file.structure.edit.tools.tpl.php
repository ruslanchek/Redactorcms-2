<?php /* Smarty version Smarty 3.1.4, created on 2012-04-09 13:10:02
         compiled from "/Users/ruslan/Documents/sites/digitalbakery/admin/templates/modules/structure.edit.tools.tpl" */ ?>
<?php /*%%SmartyHeaderCode:954922714f74c57dec3566-35488903%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a2c2c2e92a09d4b3318d9166b80e34cda63ab13' => 
    array (
      0 => '/Users/ruslan/Documents/sites/digitalbakery/admin/templates/modules/structure.edit.tools.tpl',
      1 => 1333733879,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '954922714f74c57dec3566-35488903',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f74c57df0319',
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f74c57df0319')) {function content_4f74c57df0319($_smarty_tpl) {?><div class="right_block">
    <h2><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('structure','item_status_header');?>
</h2>
    <div class="inner">
        <h3><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('common','code_id');?>
</h3>
        <p>
            <?php echo $_smarty_tpl->tpl_vars['main']->value->item_data['id'];?>

        </p>

        <h3><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('structure','item_status_param_physical_path');?>
</h3>
        <p>
            <a href="<?php echo $_smarty_tpl->tpl_vars['main']->value->item_data['path'];?>
"><?php echo $_smarty_tpl->tpl_vars['main']->value->item_data['path'];?>
</a>
        </p>
    </div>
</div><?php }} ?>