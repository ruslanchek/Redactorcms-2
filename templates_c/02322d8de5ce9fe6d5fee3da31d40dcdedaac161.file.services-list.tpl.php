<?php /* Smarty version Smarty 3.1.4, created on 2014-01-29 23:23:45
         compiled from "/home/sdnadmin/site_new/templates/modules/services-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:41679503852e95541a10e80-45603552%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '02322d8de5ce9fe6d5fee3da31d40dcdedaac161' => 
    array (
      0 => '/home/sdnadmin/site_new/templates/modules/services-list.tpl',
      1 => 1391021834,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41679503852e95541a10e80-45603552',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
    'i' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e95541abecc',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e95541abecc')) {function content_52e95541abecc($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['core']->value->getPage(94);?>



<div class="services-list">
    <div class="units-row">
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>

        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->page['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>

            <div class="unit-50">
                <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['path'];?>
" class="item">
                    <h2><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</h2>
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['announce'];?>

                </a>
            </div>

            <?php if ($_smarty_tpl->tpl_vars['i']->value==2){?>
    </div>
    <div class="units-row">
                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
            <?php }?>
        <?php } ?>

    </div>
</div><?php }} ?>