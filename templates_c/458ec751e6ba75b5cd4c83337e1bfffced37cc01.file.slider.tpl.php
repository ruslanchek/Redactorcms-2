<?php /* Smarty version Smarty 3.1.4, created on 2013-10-02 19:23:15
         compiled from "/Users/ruslan/Sites/redactorcms2/templates/include/common/slider.tpl" */ ?>
<?php /*%%SmartyHeaderCode:373982013524c3a6382c6d0-51441135%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '458ec751e6ba75b5cd4c83337e1bfffced37cc01' => 
    array (
      0 => '/Users/ruslan/Sites/redactorcms2/templates/include/common/slider.tpl',
      1 => 1379944938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '373982013524c3a6382c6d0-51441135',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
    'i' => 0,
    'item' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_524c3a6390a5d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_524c3a6390a5d')) {function content_524c3a6390a5d($_smarty_tpl) {?><div class="slider slider-height slider-width">
    <div class="inner-block slider-height">
        <nav class="pagination"></nav>

        <div class="items-container slider-height">
            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>

            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->getSliderItems(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>

            <div data-num="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" class="item slider-height slider-width<?php if ($_smarty_tpl->tpl_vars['i']->value==1){?> active<?php }?>">
                <div class="info-panel slider-height transform-easeOutExpo-500">
                    <div class="content-block">
                        <h2><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</h2>

                        <p>
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['announce'];?>

                        </p>

                        <?php if ($_smarty_tpl->tpl_vars['item']->value['link']){?><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['link'];?>
" class="button button-orange">Читать подробно</a><?php }?>
                    </div>
                </div>

                <?php $_smarty_tpl->tpl_vars['image'] = new Smarty_variable($_smarty_tpl->tpl_vars['core']->value->getItemSingleImage('section_18',$_smarty_tpl->tpl_vars['item']->value['id'],'col_125'), null, 0);?>
                <img src="<?php echo $_smarty_tpl->tpl_vars['image']->value['path'];?>
<?php echo $_smarty_tpl->tpl_vars['image']->value['name'];?>
.<?php echo $_smarty_tpl->tpl_vars['image']->value['extension'];?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" class="image slider-height slider-width">
            </div>
            <?php } ?>

        </div>
    </div>

    <div class="shadow"></div>
</div><?php }} ?>