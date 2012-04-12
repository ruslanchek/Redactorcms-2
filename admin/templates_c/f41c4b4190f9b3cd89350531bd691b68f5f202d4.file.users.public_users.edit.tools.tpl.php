<?php /* Smarty version Smarty 3.1.4, created on 2012-04-03 20:12:16
         compiled from "Z:/home/loc/digitalbakery/admin/templates\modules\users.public_users.edit.tools.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155604f7b21603d6df3-03069009%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f41c4b4190f9b3cd89350531bd691b68f5f202d4' => 
    array (
      0 => 'Z:/home/loc/digitalbakery/admin/templates\\modules\\users.public_users.edit.tools.tpl',
      1 => 1333466985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155604f7b21603d6df3-03069009',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f7b21604e1f7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7b21604e1f7')) {function content_4f7b21604e1f7($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date')) include 'Z:\home\loc\digitalbakery\smarty\plugins\modifier.date.php';
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
            <?php echo smarty_modifier_date($_smarty_tpl->tpl_vars['main']->value->item_data['last_login'],"datetime");?>

        </p>
    </div>
</div><?php }} ?>