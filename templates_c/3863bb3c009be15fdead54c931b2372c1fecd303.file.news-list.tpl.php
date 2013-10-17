<?php /* Smarty version Smarty 3.1.4, created on 2013-10-17 03:54:29
         compiled from "/Users/ruslan/Sites/gts/templates/modules/news-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:775046389525e9dbed35490-15231905%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3863bb3c009be15fdead54c931b2372c1fecd303' => 
    array (
      0 => '/Users/ruslan/Sites/gts/templates/modules/news-list.tpl',
      1 => 1381967664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '775046389525e9dbed35490-15231905',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_525e9dbee680d',
  'variables' => 
  array (
    'core' => 0,
    'item' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_525e9dbee680d')) {function content_525e9dbee680d($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date')) include '/Users/ruslan/Sites/gts/smarty/plugins/modifier.date.php';
?><h1><?php echo $_smarty_tpl->tpl_vars['core']->value->page['h1'];?>
</h1>

<div class="news-list">
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->page['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
    <?php $_smarty_tpl->tpl_vars['image'] = new Smarty_variable($_smarty_tpl->tpl_vars['core']->value->getItemSingleImage('section_19',$_smarty_tpl->tpl_vars['item']->value['id'],'col_152'), null, 0);?>
    <div class="item">
        <div class="picture">
            <a class="image" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['path'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
">
                <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['path'], ENT_QUOTES, 'UTF-8', true);?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
_pic.<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['extension'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" />
            </a>
        </div>

        <div class="text">
            <div class="date color-gray"><?php echo smarty_modifier_date($_smarty_tpl->tpl_vars['item']->value['date'],"date");?>
 года</div>

            <h2><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['path'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></h2>

            <?php echo $_smarty_tpl->tpl_vars['item']->value['announce'];?>

        </div>

        <div class="clear"></div>
    </div>

    <hr>
    <?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
    <p class="color-gray">Нет активных записей</p>
    <?php } ?>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("include/common/pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('pager'=>$_smarty_tpl->tpl_vars['core']->value->page['pager']), 0);?>

<?php }} ?>