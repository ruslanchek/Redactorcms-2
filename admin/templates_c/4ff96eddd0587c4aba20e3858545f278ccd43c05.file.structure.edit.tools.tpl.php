<?php /* Smarty version Smarty 3.1.4, created on 2012-03-25 21:23:40
         compiled from "/var/www/fortyfour/data/www/pincher.fortyfour.ru/admin/templates/modules/structure.edit.tools.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10909698554f6f549ccb18f5-65022344%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ff96eddd0587c4aba20e3858545f278ccd43c05' => 
    array (
      0 => '/var/www/fortyfour/data/www/pincher.fortyfour.ru/admin/templates/modules/structure.edit.tools.tpl',
      1 => 1332574178,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10909698554f6f549ccb18f5-65022344',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f6f549cd160b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f6f549cd160b')) {function content_4f6f549cd160b($_smarty_tpl) {?><div class="right_block">
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