<?php /* Smarty version Smarty 3.1.4, created on 2013-10-16 17:41:42
         compiled from "/Users/ruslan/Sites/gts/templates/include/common/main-menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:393884762525e9760e06a19-42285339%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd67dfa9b174263585582959e4f0da03b997b194d' => 
    array (
      0 => '/Users/ruslan/Sites/gts/templates/include/common/main-menu.tpl',
      1 => 1381930901,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '393884762525e9760e06a19-42285339',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_525e9760e5994',
  'variables' => 
  array (
    'core' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_525e9760e5994')) {function content_525e9760e5994($_smarty_tpl) {?><nav class="nav-top">
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->getInlineMenu(3,1); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['path'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['core']->value->page['id']){?> class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
    <?php } ?>

    <div class="shadow"></div>
</nav><?php }} ?>