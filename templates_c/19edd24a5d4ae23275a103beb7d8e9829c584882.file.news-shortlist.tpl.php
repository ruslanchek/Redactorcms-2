<?php /* Smarty version Smarty 3.1.4, created on 2013-10-17 02:13:45
         compiled from "/Users/ruslan/Sites/gts/templates/include/common/news-shortlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1175403195525e846a2a2c27-14421546%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19edd24a5d4ae23275a103beb7d8e9829c584882' => 
    array (
      0 => '/Users/ruslan/Sites/gts/templates/include/common/news-shortlist.tpl',
      1 => 1381961619,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1175403195525e846a2a2c27-14421546',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_525e846a2e719',
  'variables' => 
  array (
    'core' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_525e846a2e719')) {function content_525e846a2e719($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date')) include '/Users/ruslan/Sites/gts/smarty/plugins/modifier.date.php';
?><div class="news-shortlist">
    <h2 class="uppercase">Новости</h2>

    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->getNewsShort(5); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <div class="item">
            <div class="date color-gray"><?php echo smarty_modifier_date($_smarty_tpl->tpl_vars['item']->value['date'],"date");?>
 года</div>
            <h3><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['path'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></h3>
            <?php echo $_smarty_tpl->tpl_vars['item']->value['announce'];?>

        </div>
    <?php } ?>

    <a href="/news">Читать все новости</a>
</div><?php }} ?>