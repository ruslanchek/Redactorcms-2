<?php /* Smarty version Smarty 3.1.4, created on 2014-02-04 15:39:03
         compiled from "/home/sdnadmin/site_new/admin/templates/modules/templates.templates.edit.tools.tpl" */ ?>
<?php /*%%SmartyHeaderCode:195986647952f0d157028861-41027718%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f89218e35365b2f12185755fcd91d620e24982c' => 
    array (
      0 => '/home/sdnadmin/site_new/admin/templates/modules/templates.templates.edit.tools.tpl',
      1 => 1391021811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195986647952f0d157028861-41027718',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52f0d15708c74',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f0d15708c74')) {function content_52f0d15708c74($_smarty_tpl) {?><div class="right_block">
    <h2><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('common','actions');?>
</h2>
    <div class="inner">
        <ul class="rb_menu">
            <li>
                <a class="red_link" onclick="confirmMessage('<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('common','delete_oject_confirm');?>
', '<?php echo $_smarty_tpl->tpl_vars['main']->value->content_list_delete_link;?>
<?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['id'];?>
')" href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('common','delete_oject');?>
</a>
            </li>
        </ul>
    </div>
</div><?php }} ?>