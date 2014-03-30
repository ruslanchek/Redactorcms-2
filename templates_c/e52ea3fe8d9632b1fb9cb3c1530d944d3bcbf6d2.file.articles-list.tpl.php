<?php /* Smarty version Smarty 3.1.4, created on 2014-01-29 23:16:20
         compiled from "/home/sdnadmin/site_new/templates/modules/articles-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:134145362952e953849ecb65-51509133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e52ea3fe8d9632b1fb9cb3c1530d944d3bcbf6d2' => 
    array (
      0 => '/home/sdnadmin/site_new/templates/modules/articles-list.tpl',
      1 => 1391021834,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134145362952e953849ecb65-51509133',
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
  'unifunc' => 'content_52e95384a6f6e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e95384a6f6e')) {function content_52e95384a6f6e($_smarty_tpl) {?><div class="news-list">
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->page['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
    <div class="item">
        <h2><a class="black-link" href="<?php echo $_smarty_tpl->tpl_vars['item']->value['path'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></h2>
        <?php echo $_smarty_tpl->tpl_vars['item']->value['announce'];?>

    </div>

    <?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
    Нет активных записей
    <?php } ?>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("include/common/pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('pager'=>$_smarty_tpl->tpl_vars['core']->value->page['pager']), 0);?>
<?php }} ?>