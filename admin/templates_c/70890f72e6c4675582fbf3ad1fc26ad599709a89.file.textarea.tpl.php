<?php /* Smarty version Smarty 3.1.4, created on 2012-04-06 23:01:55
         compiled from "/Users/ruslan/Documents/sites/digitalbakery/admin/templates/system/form_fields/textarea.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4119094214f7ce3ece19825-25929552%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70890f72e6c4675582fbf3ad1fc26ad599709a89' => 
    array (
      0 => '/Users/ruslan/Documents/sites/digitalbakery/admin/templates/system/form_fields/textarea.tpl',
      1 => 1333733877,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4119094214f7ce3ece19825-25929552',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f7ce3ece85c7',
  'variables' => 
  array (
    'item' => 0,
    'main' => 0,
    'index' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7ce3ece85c7')) {function content_4f7ce3ece85c7($_smarty_tpl) {?><div class="item_block">
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