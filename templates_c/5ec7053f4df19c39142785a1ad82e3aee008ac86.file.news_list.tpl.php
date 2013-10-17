<?php /* Smarty version Smarty 3.1.4, created on 2013-10-16 18:05:29
         compiled from "/Users/ruslan/Sites/gts/templates/modules/news_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1798499141525e8dd3684990-06874057%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ec7053f4df19c39142785a1ad82e3aee008ac86' => 
    array (
      0 => '/Users/ruslan/Sites/gts/templates/modules/news_list.tpl',
      1 => 1381932328,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1798499141525e8dd3684990-06874057',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_525e8dd376b34',
  'variables' => 
  array (
    'core' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_525e8dd376b34')) {function content_525e8dd376b34($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date')) include '/Users/ruslan/Sites/gts/smarty/plugins/modifier.date.php';
?><div class="news-list">
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->page['data']['list']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
    <div class="item">
        <div class="picture">
            <a class="image" href="<?php echo $_smarty_tpl->tpl_vars['core']->value->uri;?>
?item=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
">
                <img width="150" src="<?php echo $_smarty_tpl->tpl_vars['item']->value['pic'];?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" />
            </a>
        </div>

        <div class="text">
            <div class="date color-gray"><?php echo smarty_modifier_date($_smarty_tpl->tpl_vars['item']->value['date'],"date");?>
 года</div>

            <h2><a href="<?php echo $_smarty_tpl->tpl_vars['core']->value->uri;?>
?item=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
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
    <blockquote><i class="halflings warning-sign"></i>&nbsp;&nbsp;Нет активных записей</blockquote>
    <?php } ?>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("include/common/pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('pager'=>$_smarty_tpl->tpl_vars['core']->value->page['data']['list']['pager']), 0);?>

<?php }} ?>