<?php /* Smarty version Smarty 3.1.4, created on 2014-02-04 15:38:45
         compiled from "/home/sdnadmin/site_new/admin/templates/modules/personal.tools.tpl" */ ?>
<?php /*%%SmartyHeaderCode:199103109252f0d145cb3e76-44358510%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca2d64c07afcf5885a20f72232b35e43ee30f1f2' => 
    array (
      0 => '/home/sdnadmin/site_new/admin/templates/modules/personal.tools.tpl',
      1 => 1391021811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199103109252f0d145cb3e76-44358510',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
    'personal' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52f0d145d1077',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f0d145d1077')) {function content_52f0d145d1077($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date')) include '/home/sdnadmin/site_new/smarty/plugins/modifier.date.php';
?><div class="right_block">
    <h2><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('personal','user_status_header');?>
</h2>
    <div class="inner">
        <h3><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('personal','user_status_param_last_login');?>
</span></h3>
        <p>
            <span class="nowrap"><?php echo smarty_modifier_date($_smarty_tpl->tpl_vars['main']->value->item_data['last'],'datetimefull');?>
</span>
            <?php if ($_smarty_tpl->tpl_vars['main']->value->item_data['ip']!='0'){?>(<?php echo $_smarty_tpl->tpl_vars['personal']->value->encodeIp($_smarty_tpl->tpl_vars['main']->value->item_data['ip']);?>
)<?php }?>
        </p>
    </div>
</div><?php }} ?>