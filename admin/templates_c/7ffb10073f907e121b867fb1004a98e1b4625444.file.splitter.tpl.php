<?php /* Smarty version Smarty 3.1.4, created on 2012-04-10 15:50:44
         compiled from "Z:/home/loc/digitalbakery/admin/templates\system\fields_editor\splitter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:69314f71a9305bfba2-94726463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ffb10073f907e121b867fb1004a98e1b4625444' => 
    array (
      0 => 'Z:/home/loc/digitalbakery/admin/templates\\system\\fields_editor\\splitter.tpl',
      1 => 1333733878,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '69314f71a9305bfba2-94726463',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f71a93064e5e',
  'variables' => 
  array (
    'default' => 0,
    'new' => 0,
    'item' => 0,
    'main' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f71a93064e5e')) {function content_4f71a93064e5e($_smarty_tpl) {?><?php if (!$_smarty_tpl->tpl_vars['default']->value){?>
<a href="javascript:void(0)" class="icon_action icon_delete_instance" onclick="fieldsEditor.deleteField('<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>', '<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_delete_field_confirm');?>
', <?php if ($_smarty_tpl->tpl_vars['new']->value){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['main']->value->item_data['id'];?>
<?php }?>)" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_delete_field');?>
"></a>
<?php }?>

<div class="collapsable_fieldlist_item_tools">
    <fieldset>
        <?php if ($_smarty_tpl->tpl_vars['new']->value){?>
            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_splitter');?>
" name="label**__**<?php echo $_smarty_tpl->tpl_vars['new']->value;?>
" />
        <?php }else{ ?>
            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
" name="label**__**<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" />
        <?php }?>
        
        <input type="hidden" value="separator" name="type**__**<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>" />
        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['sort'];?>
" name="sort**__**<?php if ($_smarty_tpl->tpl_vars['new']->value){?><?php echo $_smarty_tpl->tpl_vars['new']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
<?php }?>" rel="sort" />
    </fieldset>
</div><?php }} ?>