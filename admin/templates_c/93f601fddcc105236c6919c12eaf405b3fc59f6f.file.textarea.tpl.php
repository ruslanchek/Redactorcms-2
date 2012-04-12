<?php /* Smarty version Smarty 3.1.4, created on 2012-04-03 20:40:44
         compiled from "Z:/home/loc/digitalbakery/admin/templates\system\form_fields\textarea.tpl" */ ?>
<?php /*%%SmartyHeaderCode:139334f7b280ce31af4-90450179%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93f601fddcc105236c6919c12eaf405b3fc59f6f' => 
    array (
      0 => 'Z:/home/loc/digitalbakery/admin/templates\\system\\form_fields\\textarea.tpl',
      1 => 1333470974,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139334f7b280ce31af4-90450179',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
    'main' => 0,
    'index' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f7b280cea862',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7b280cea862')) {function content_4f7b280cea862($_smarty_tpl) {?><div class="item_block">
    <label class="label" for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</label>

    <?php if ($_smarty_tpl->tpl_vars['item']->value['use_editor']){?>
        <a href="javascript:void(0)" class="typo" rel="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_edit_item_typography');?>
</a>
    <?php }?>
    <div class="cl"></div>

    <textarea class="textarea <?php if ($_smarty_tpl->tpl_vars['item']->value['required']){?> required<?php }?>" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" rows="<?php echo $_smarty_tpl->tpl_vars['item']->value['rows'];?>
" tabindex="<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['value'];?>
</textarea>
    <?php if ($_smarty_tpl->tpl_vars['item']->value['use_editor']){?>
        <script type="text/javascript">initEditor($('#<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
'), '<?php echo $_smarty_tpl->tpl_vars['main']->value->locale;?>
', '<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
')</script>
    <?php }?>
</div><?php }} ?>