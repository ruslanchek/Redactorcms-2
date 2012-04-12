<?php /* Smarty version Smarty 3.1.4, created on 2012-03-19 15:59:09
         compiled from "Z:/home/loc/susl/admin/templates\modules\structure.edit.tools.tpl" */ ?>
<?php /*%%SmartyHeaderCode:148884f671f8d28dda3-90530167%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f7938a1a69eb6b490a8ddfd3553e8857536397a' => 
    array (
      0 => 'Z:/home/loc/susl/admin/templates\\modules\\structure.edit.tools.tpl',
      1 => 1332157838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148884f671f8d28dda3-90530167',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f671f8d2cf5f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f671f8d2cf5f')) {function content_4f671f8d2cf5f($_smarty_tpl) {?><div class="right_block">
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