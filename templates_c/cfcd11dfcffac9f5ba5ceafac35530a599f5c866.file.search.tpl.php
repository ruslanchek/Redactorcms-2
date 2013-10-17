<?php /* Smarty version Smarty 3.1.4, created on 2013-10-16 20:04:24
         compiled from "/Users/ruslan/Sites/gts/templates/modules/search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1086021024525eb45297f0a8-82564848%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cfcd11dfcffac9f5ba5ceafac35530a599f5c866' => 
    array (
      0 => '/Users/ruslan/Sites/gts/templates/modules/search.tpl',
      1 => 1381939422,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1086021024525eb45297f0a8-82564848',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_525eb4529fc83',
  'variables' => 
  array (
    'core' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_525eb4529fc83')) {function content_525eb4529fc83($_smarty_tpl) {?><div class="search">
    <form action="/search">
        <input type="text" name="sq" placeholder="Поиск" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['core']->value->page['sq'], ENT_QUOTES, 'UTF-8', true);?>
" />
        <input class="btn" type="submit" value="Найти"/>
    </form>
</div>

<?php if ($_smarty_tpl->tpl_vars['core']->value->page['sq']!=''){?>
    <div class="search-list">
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->page['result']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <div class="item">
                <h2><a href="<?php echo $_smarty_tpl->tpl_vars['core']->value->uri;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></h2>

                <?php echo $_smarty_tpl->tpl_vars['item']->value['content'];?>

            </div>

            <hr>
        <?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
            <p class="color-gray">Ничего не найдено</p>
        <?php } ?>
    </div>

    <?php echo $_smarty_tpl->getSubTemplate ("include/common/pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('pager'=>$_smarty_tpl->tpl_vars['core']->value->page['result']['pager']), 0);?>

<?php }?><?php }} ?>