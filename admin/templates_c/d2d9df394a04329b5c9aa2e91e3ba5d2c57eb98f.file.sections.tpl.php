<?php /* Smarty version Smarty 3.1.4, created on 2014-01-30 02:00:58
         compiled from "/home/sdnadmin/site_new/admin/templates/modules/sections.tpl" */ ?>
<?php /*%%SmartyHeaderCode:170055425452e97a1a5ceb14-76943714%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2d9df394a04329b5c9aa2e91e3ba5d2c57eb98f' => 
    array (
      0 => '/home/sdnadmin/site_new/admin/templates/modules/sections.tpl',
      1 => 1391021811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '170055425452e97a1a5ceb14-76943714',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e97a1a6899d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e97a1a6899d')) {function content_52e97a1a6899d($_smarty_tpl) {?><h1><?php echo $_smarty_tpl->tpl_vars['main']->value->h1;?>
</h1>

<?php if ($_smarty_tpl->tpl_vars['main']->value->module_mode=='list'){?>
    <?php echo $_smarty_tpl->getSubTemplate ("modules/sections.list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['main']->value->module_mode=='edit'){?>
    <script type="text/javascript">
        var field_editor_messages = new Array();
        field_editor_messages['edit_title_prefix'] = '<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','edit_title_prefix');?>
';
        field_editor_messages['edit_accept_settings'] = '<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','edit_accept_settings');?>
';

        var fieldsEditor = new FieldsEditor(field_editor_messages);
    </script>

    <div class="left_col">
    <?php echo $_smarty_tpl->getSubTemplate ("modules/sections.edit_fields.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>

    <div class="right_col">
    <?php echo $_smarty_tpl->getSubTemplate ("modules/sections.edit_fields.tools.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
    
    <div class="cl"></div>

    <script type="text/javascript">
        fieldsEditor.init();
    </script>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['main']->value->module_mode=='content'){?>
    <?php echo $_smarty_tpl->getSubTemplate ("modules/sections.content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['main']->value->module_mode=='edit_content'){?>
    <div class="left_col">
        <?php echo $_smarty_tpl->getSubTemplate ("system/form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>

    <div class="right_col">
    <?php echo $_smarty_tpl->getSubTemplate ("modules/sections.edit_content.tools.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
    
    <div class="cl"></div>
<?php }?><?php }} ?>