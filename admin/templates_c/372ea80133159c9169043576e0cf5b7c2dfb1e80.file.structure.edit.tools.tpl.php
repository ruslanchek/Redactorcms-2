<?php /* Smarty version Smarty 3.1.4, created on 2012-04-03 20:13:06
         compiled from "Z:/home/loc/digitalbakery/admin/templates\modules\structure.edit.tools.tpl" */ ?>
<?php /*%%SmartyHeaderCode:215174f71a4d7de35a2-86700718%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '372ea80133159c9169043576e0cf5b7c2dfb1e80' => 
    array (
      0 => 'Z:/home/loc/digitalbakery/admin/templates\\modules\\structure.edit.tools.tpl',
      1 => 1333466985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '215174f71a4d7de35a2-86700718',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f71a4d7e23dd',
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f71a4d7e23dd')) {function content_4f71a4d7e23dd($_smarty_tpl) {?><div class="right_block">
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