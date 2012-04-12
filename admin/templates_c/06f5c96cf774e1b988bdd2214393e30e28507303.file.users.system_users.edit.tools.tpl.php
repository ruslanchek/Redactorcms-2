<?php /* Smarty version Smarty 3.1.4, created on 2012-03-29 23:16:54
         compiled from "/Users/ruslan/Documents/sites/digitalbakery/admin/templates/modules/users.system_users.edit.tools.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18557439624f74b526af91b4-37929296%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06f5c96cf774e1b988bdd2214393e30e28507303' => 
    array (
      0 => '/Users/ruslan/Documents/sites/digitalbakery/admin/templates/modules/users.system_users.edit.tools.tpl',
      1 => 1332846888,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18557439624f74b526af91b4-37929296',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f74b526b8168',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f74b526b8168')) {function content_4f74b526b8168($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date')) include '/Users/ruslan/Documents/sites/digitalbakery/smarty/plugins/modifier.date.php';
?><div class="right_block">
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
            <li>
                <a href="javascript:void(0)" class="dashed" onclick="users.generatePassword('<?php echo $_GET['suboption'];?>
', '<?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['main']->value->item_data['email'];?>
')">Сгенирировать пароль</a>
            </li>
        </ul>
    </div>
</div>


<div class="right_block">
    <h2><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('users','item_tools_info_header');?>
</h2>
    <div class="inner">
        <h3><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('common','code_id');?>
</h3>
        <p>
            <?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['id'];?>

        </p>

        <h3><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('users','last_label');?>
</h3>
        <p>
            <?php echo smarty_modifier_date($_smarty_tpl->tpl_vars['main']->value->item_data['last'],"datetime");?>

        </p>
    </div>
</div><?php }} ?>