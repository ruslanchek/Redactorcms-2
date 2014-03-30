<?php /* Smarty version Smarty 3.1.4, created on 2014-01-29 23:07:57
         compiled from "/home/sdnadmin/site_new/templates/include/common/slider.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23677174952e9518d712543-36382633%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2a34a4fc81a4de82e0a5ce8797b57a8fb10cac4' => 
    array (
      0 => '/home/sdnadmin/site_new/templates/include/common/slider.tpl',
      1 => 1391021834,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23677174952e9518d712543-36382633',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
    's' => 0,
    'i' => 0,
    'item' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e9518d78a13',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e9518d78a13')) {function content_52e9518d78a13($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['s'] = new Smarty_variable($_smarty_tpl->tpl_vars['core']->value->getSliderItems(), null, 0);?>

<div class="slider">
    <nav class="pager">
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['s']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
            <a data-id="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" class="animation-fade<?php if ($_smarty_tpl->tpl_vars['i']->value==0){?> active<?php }?>" href="#"></a>
        <?php } ?>
    </nav>

    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['s']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
        <?php $_smarty_tpl->tpl_vars['image'] = new Smarty_variable($_smarty_tpl->tpl_vars['core']->value->getItemSingleImage('section_18',$_smarty_tpl->tpl_vars['item']->value['id'],'col_125'), null, 0);?>
        <div  data-id="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" class="slide<?php if ($_smarty_tpl->tpl_vars['i']->value==0){?> active<?php }?>" data-gourl="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
">
            <div class="badge">
                <h2><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</h2>

                <?php echo $_smarty_tpl->tpl_vars['item']->value['announce'];?>

            </div>

            <img alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['path'], ENT_QUOTES, 'UTF-8', true);?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
.<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['extension'], ENT_QUOTES, 'UTF-8', true);?>
">
        </div>
    <?php } ?>
</div>

<script>
    $(function() {
        slider.init();
    });
</script><?php }} ?>