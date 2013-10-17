<?php /* Smarty version Smarty 3.1.4, created on 2013-10-16 16:34:05
         compiled from "/Users/ruslan/Sites/gts/templates/include/common/slider.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1101924097525e846a16de97-76875600%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb984e0ac6962a767383332253760ec6f7ff03f9' => 
    array (
      0 => '/Users/ruslan/Sites/gts/templates/include/common/slider.tpl',
      1 => 1381926841,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1101924097525e846a16de97-76875600',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_525e846a232e1',
  'variables' => 
  array (
    'core' => 0,
    'i' => 0,
    'item' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_525e846a232e1')) {function content_525e846a232e1($_smarty_tpl) {?><div class="slider">
    <div class="horizontal-limiter">
        <div class="items-viewport">
            <div class="pager"><a href="#"></a></div>

            <div class="items-container">
                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>

                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->getSliderItems(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                <?php $_smarty_tpl->tpl_vars['image'] = new Smarty_variable($_smarty_tpl->tpl_vars['core']->value->getItemSingleImage('section_18',$_smarty_tpl->tpl_vars['item']->value['id'],'col_125'), null, 0);?>
                <div class="slider-block" style="background-image: url(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['path'], ENT_QUOTES, 'UTF-8', true);?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
.<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['extension'], ENT_QUOTES, 'UTF-8', true);?>
)" data-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
">
                    <div class="content-holder">
                        <div class="content">
                            <h2><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</h2>

                            <?php echo $_smarty_tpl->tpl_vars['item']->value['announce'];?>

                        </div>

                        <div class="p-1"></div>
                        <div class="p-2"></div>
                        <div class="p-3"></div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div><?php }} ?>