<?php /* Smarty version Smarty 3.1.4, created on 2012-04-03 20:13:18
         compiled from "Z:/home/loc/digitalbakery/admin/templates\modules\templates.templates.edit.tools.tpl" */ ?>
<?php /*%%SmartyHeaderCode:253884f773cb57766e3-07087479%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1053e12bae7c84f7bcd1624ed5bc06270e58e26c' => 
    array (
      0 => 'Z:/home/loc/digitalbakery/admin/templates\\modules\\templates.templates.edit.tools.tpl',
      1 => 1333466985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '253884f773cb57766e3-07087479',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f773cb5813ec',
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f773cb5813ec')) {function content_4f773cb5813ec($_smarty_tpl) {?><div class="right_block">
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