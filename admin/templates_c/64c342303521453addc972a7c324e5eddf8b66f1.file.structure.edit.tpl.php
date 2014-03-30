<?php /* Smarty version Smarty 3.1.4, created on 2014-02-02 19:46:07
         compiled from "/home/sdnadmin/site_new/admin/templates/modules/structure.edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:56066099352ee683f6f4052-47202201%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64c342303521453addc972a7c324e5eddf8b66f1' => 
    array (
      0 => '/home/sdnadmin/site_new/admin/templates/modules/structure.edit.tpl',
      1 => 1391021811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56066099352ee683f6f4052-47202201',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52ee683f7cd8c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ee683f7cd8c')) {function content_52ee683f7cd8c($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("system/form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['main']->value->item_data['just_created']=='1'){?>
<script>
    $('input#name').on('blur focus change keyup keydown', function(){
        $('input#part').val(escapeUrl($(this).val()));

        $('input#title').val($(this).val());
    });
</script>
<?php }?><?php }} ?>