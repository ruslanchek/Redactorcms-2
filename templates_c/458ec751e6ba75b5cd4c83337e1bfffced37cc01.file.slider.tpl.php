<?php /* Smarty version Smarty 3.1.4, created on 2014-03-06 22:25:52
         compiled from "/Users/ruslan/Sites/redactorcms2/templates/include/common/slider.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10179606925318bdb081f879-50381598%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '458ec751e6ba75b5cd4c83337e1bfffced37cc01' => 
    array (
      0 => '/Users/ruslan/Sites/redactorcms2/templates/include/common/slider.tpl',
      1 => 1394129863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10179606925318bdb081f879-50381598',
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
  'unifunc' => 'content_5318bdb090995',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5318bdb090995')) {function content_5318bdb090995($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['s'] = new Smarty_variable($_smarty_tpl->tpl_vars['core']->value->getSliderItems(), null, 0);?>

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