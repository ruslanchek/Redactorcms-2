<?php /* Smarty version Smarty 3.1.4, created on 2012-04-06 23:01:54
         compiled from "/Users/ruslan/Documents/sites/digitalbakery/admin/templates/system/form_fields/select.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14230077094f7ce3ecad2301-50803618%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '961257c74b0d09ab56b964c2c6479a82f5337b57' => 
    array (
      0 => '/Users/ruslan/Documents/sites/digitalbakery/admin/templates/system/form_fields/select.tpl',
      1 => 1333733877,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14230077094f7ce3ecad2301-50803618',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f7ce3ecb8dcc',
  'variables' => 
  array (
    'item' => 0,
    'index' => 0,
    'main' => 0,
    'options' => 0,
    'key' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7ce3ecb8dcc')) {function content_4f7ce3ecb8dcc($_smarty_tpl) {?><div class="item_block" id="select_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['slave_of']){?>style="display: none"<?php }?>>
   <label class="label" for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</label>
   <div class="cl"></div>

   <select class="select" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" tabindex="<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
">
       <option value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['value']==0||!$_smarty_tpl->tpl_vars['item']->value['value']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','zero_selection');?>
</option>
       <?php  $_smarty_tpl->tpl_vars['options'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['options']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['options']->key => $_smarty_tpl->tpl_vars['options']->value){
$_smarty_tpl->tpl_vars['options']->_loop = true;
?>
           <option value="<?php echo $_smarty_tpl->tpl_vars['options']->value['key'];?>
" <?php if ($_smarty_tpl->tpl_vars['options']->value['key']==$_smarty_tpl->tpl_vars['item']->value['value']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['options']->value['key'];?>
. <?php echo $_smarty_tpl->tpl_vars['options']->value['value'];?>
</option>
       <?php } ?>
   </select>
</div>
<?php if ($_smarty_tpl->tpl_vars['item']->value['master']){?>
   <script type="text/javascript">
       <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['master']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
           <?php if ($_smarty_tpl->tpl_vars['item']->value['value']==$_smarty_tpl->tpl_vars['key']->value){?>
               $(window).load(function(){
                   $('#select_<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
').show();
               });
           <?php }?>

           $('#<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
').change(function(){
               var val = $(this).val();

               if(val == '<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
'){
                   $('#select_<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
').slideDown(100);
               }else{
                   $('#select_<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
').slideUp(100);
               };
           });
       <?php } ?>
   </script>
<?php }?><?php }} ?>