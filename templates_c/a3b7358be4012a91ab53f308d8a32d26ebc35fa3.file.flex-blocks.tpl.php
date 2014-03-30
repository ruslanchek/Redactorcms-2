<?php /* Smarty version Smarty 3.1.4, created on 2014-01-29 23:07:57
         compiled from "/home/sdnadmin/site_new/templates/include/common/flex-blocks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:48028096252e9518d7a73f5-86833413%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3b7358be4012a91ab53f308d8a32d26ebc35fa3' => 
    array (
      0 => '/home/sdnadmin/site_new/templates/include/common/flex-blocks.tpl',
      1 => 1391021834,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48028096252e9518d7a73f5-86833413',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e9518d7d82f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e9518d7d82f')) {function content_52e9518d7d82f($_smarty_tpl) {?>
<div class="flex-blocks units-row-end">
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->getFlexBlocks(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
    <div class="unit-33">
        &nbsp;
        <div class="item">
            <h2 class="color-blue"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</h2>

            <p>
                <?php echo $_smarty_tpl->tpl_vars['item']->value['text_1'];?>


                <span class="hidden">
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['text_2'];?>

                </span>
            </p>

        </div>
    </div>
    <?php } ?>
</div>
<?php }} ?>