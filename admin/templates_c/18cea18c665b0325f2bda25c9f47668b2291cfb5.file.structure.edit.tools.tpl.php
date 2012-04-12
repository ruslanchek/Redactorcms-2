<?php /* Smarty version Smarty 3.1.4, created on 2012-03-24 10:00:43
         compiled from "/Users/ruslan/Documents/sites/pincher/admin/templates/modules/structure.edit.tools.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16058744334f6d711bd91384-62198959%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18cea18c665b0325f2bda25c9f47668b2291cfb5' => 
    array (
      0 => '/Users/ruslan/Documents/sites/pincher/admin/templates/modules/structure.edit.tools.tpl',
      1 => 1332571837,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16058744334f6d711bd91384-62198959',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f6d711bdd069',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f6d711bdd069')) {function content_4f6d711bdd069($_smarty_tpl) {?><div class="right_block">
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