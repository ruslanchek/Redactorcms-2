<?php /* Smarty version Smarty 3.1.4, created on 2012-09-25 19:28:41
         compiled from "/home/sporthimki/www/admin/templates/modules/sections.edit_content.tools.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7096137285061cda99bf806-26572481%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26d5dfc5442013ada60f8b700a71fe3d81444c94' => 
    array (
      0 => '/home/sporthimki/www/admin/templates/modules/sections.edit_content.tools.tpl',
      1 => 1348490267,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7096137285061cda99bf806-26572481',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
    'sections' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_5061cda9aac3c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5061cda9aac3c')) {function content_5061cda9aac3c($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date')) include '/home/sporthimki/www/smarty/plugins/modifier.date.php';
?><div class="right_block">
    <h2><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('common','actions');?>
</h2>
    <div class="inner">
        <ul class="rb_menu">
            <li>
                <a class="red_link" onclick="confirmMessage('<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('common','delete_oject_confirm');?>
', '/admin/?option=sections&suboption=content&id=<?php echo $_GET['id'];?>
&action=delete&item_id=<?php echo $_GET['item'];?>
')" href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections_content','delete_item_label');?>
</a>
            </li>
        </ul>
    </div>
</div>

<div class="right_block">
    <h2><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','content_item_tools_info_header');?>
</h2>
    <div class="inner">
        <h3><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('common','code_id');?>
</h3>
        <p>
            <?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['id'];?>

        </p>

        <h3><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('common','creator');?>
</h3>
        <p>
            <?php echo $_smarty_tpl->tpl_vars['sections']->value->getUserStamp($_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['creator_id']);?>
<br>
            <span class="small"><?php echo smarty_modifier_date($_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['creation_date'],'datetimefull');?>
</span>
        </p>

        <?php if ($_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['creation_date']!=$_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['change_date']){?>
            <h3><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('common','cahnger');?>
</h3>
            <p>
                <?php echo $_smarty_tpl->tpl_vars['sections']->value->getUserStamp($_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['changer_id']);?>
<br>
                <span class="small"><?php echo smarty_modifier_date($_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['change_date'],'datetimefull');?>
</span>
            </p>
        <?php }?>
    </div>
</div><?php }} ?>