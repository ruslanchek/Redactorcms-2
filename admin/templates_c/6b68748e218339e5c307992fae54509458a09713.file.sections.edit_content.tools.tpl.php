<?php /* Smarty version Smarty 3.1.4, created on 2011-12-10 17:41:23
         compiled from "Z:/home/loc/cugino/admin/templates\modules\sections.edit_content.tools.tpl" */ ?>
<?php /*%%SmartyHeaderCode:62254ee36f93916db3-37501721%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b68748e218339e5c307992fae54509458a09713' => 
    array (
      0 => 'Z:/home/loc/cugino/admin/templates\\modules\\sections.edit_content.tools.tpl',
      1 => 1322914709,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '62254ee36f93916db3-37501721',
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
  'unifunc' => 'content_4ee36f93a0843',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ee36f93a0843')) {function content_4ee36f93a0843($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date')) include 'Z:\home\loc\cugino\smarty\plugins\modifier.date.php';
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