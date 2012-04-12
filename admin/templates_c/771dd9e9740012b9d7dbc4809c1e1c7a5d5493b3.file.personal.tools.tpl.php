<?php /* Smarty version Smarty 3.1.4, created on 2012-03-26 17:56:20
         compiled from "/var/www/fortyfour/data/www/pincher.fortyfour.ru/admin/templates/modules/personal.tools.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5976196734f707584d55426-00614160%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '771dd9e9740012b9d7dbc4809c1e1c7a5d5493b3' => 
    array (
      0 => '/var/www/fortyfour/data/www/pincher.fortyfour.ru/admin/templates/modules/personal.tools.tpl',
      1 => 1332571837,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5976196734f707584d55426-00614160',
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
  'unifunc' => 'content_4f707584db146',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f707584db146')) {function content_4f707584db146($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date')) include '/var/www/fortyfour/data/www/pincher.fortyfour.ru/smarty/plugins/modifier.date.php';
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