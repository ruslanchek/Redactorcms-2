<?php /* Smarty version Smarty 3.1.4, created on 2013-10-02 19:23:15
         compiled from "/Users/ruslan/Sites/redactorcms2/templates/include/common/main_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:152642287524c3a637ad3f4-20494664%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c475be19ca2dc46658b36d9f333567aad8aefd4' => 
    array (
      0 => '/Users/ruslan/Sites/redactorcms2/templates/include/common/main_menu.tpl',
      1 => 1379944938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152642287524c3a637ad3f4-20494664',
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
  'unifunc' => 'content_524c3a6381f80',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_524c3a6381f80')) {function content_524c3a6381f80($_smarty_tpl) {?>
<div class="top-nav">
    <nav>
        <div class="links">
            <a href="/">Главная</a>
            <i class="spacer"></i>

            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->getInlineMenu(3,1); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['path'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['core']->value->page['id']){?> class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
            <i class="spacer"></i>
            <?php } ?>
        </div>

        <div class="buttons">
            <a id="call-me-opener" href="#" class="button button-gray">Заказать обратный звонок</a>
            <a id="feedback-opener" href="#" class="button button-orange">Разместить заявку</a>
        </div>
    </nav>

    <div class="shadow"></div>
</div><?php }} ?>