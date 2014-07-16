<?php /* Smarty version Smarty 3.1.4, created on 2014-07-09 18:57:25
         compiled from "/Users/ruslan/Sites/redactorcms2/templates/include/common/flex-blocks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19046511405318bdb091f935-89723286%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81d8f7aa41d25605fc08d8437c89edff2011e2a0' => 
    array (
      0 => '/Users/ruslan/Sites/redactorcms2/templates/include/common/flex-blocks.tpl',
      1 => 1404917680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19046511405318bdb091f935-89723286',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_5318bdb0964bb',
  'variables' => 
  array (
    'core' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5318bdb0964bb')) {function content_5318bdb0964bb($_smarty_tpl) {?>
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