<?php /* Smarty version Smarty 3.1.4, created on 2012-03-19 21:04:51
         compiled from "Z:/home/loc/susl/admin/templates\modules\personal.tools.tpl" */ ?>
<?php /*%%SmartyHeaderCode:120824f676733cb2108-62807850%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7a2520c755e428d25b9ef54c813232e38fd8add' => 
    array (
      0 => 'Z:/home/loc/susl/admin/templates\\modules\\personal.tools.tpl',
      1 => 1332157838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120824f676733cb2108-62807850',
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
  'unifunc' => 'content_4f676733cf89e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f676733cf89e')) {function content_4f676733cf89e($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date')) include 'Z:\home\loc\susl\smarty\plugins\modifier.date.php';
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