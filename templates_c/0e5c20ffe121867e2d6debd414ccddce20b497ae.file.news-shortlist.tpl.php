<?php /* Smarty version Smarty 3.1.4, created on 2014-03-06 22:25:52
         compiled from "/Users/ruslan/Sites/redactorcms2/templates/include/common/news-shortlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12638159645318bdb0cc1306-23454014%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e5c20ffe121867e2d6debd414ccddce20b497ae' => 
    array (
      0 => '/Users/ruslan/Sites/redactorcms2/templates/include/common/news-shortlist.tpl',
      1 => 1394129863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12638159645318bdb0cc1306-23454014',
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
  'unifunc' => 'content_5318bdb0d0e01',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5318bdb0d0e01')) {function content_5318bdb0d0e01($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date')) include '/Users/ruslan/Sites/redactorcms2/smarty/plugins/modifier.date.php';
?><div class="news">
    <div class="limiter">
        <h1>Новости и события</h1>

        <div class="units-row-end">
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->getNewsShort(3); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <div class="unit-33 item">
                <a class="black-link" href="<?php echo $_smarty_tpl->tpl_vars['item']->value['path'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
                <span class="date"><?php echo smarty_modifier_date($_smarty_tpl->tpl_vars['item']->value['date'],"date");?>
</span>
            </div>
            <?php } ?>
        </div>
    </div>
</div><?php }} ?>