<?php /* Smarty version Smarty 3.1.4, created on 2013-10-16 16:19:54
         compiled from "/Users/ruslan/Sites/gts/templates/include/common/events-shortlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:759840811525e846a255693-29394253%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '000d6000efeb783f0b0f00779f8db04a63973305' => 
    array (
      0 => '/Users/ruslan/Sites/gts/templates/include/common/events-shortlist.tpl',
      1 => 1379944938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '759840811525e846a255693-29394253',
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
  'unifunc' => 'content_525e846a29a92',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_525e846a29a92')) {function content_525e846a29a92($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date')) include '/Users/ruslan/Sites/gts/smarty/plugins/modifier.date.php';
?><div class="rounded textured news-announcements">
    <h2><a href="/specials" class="black-link">Специальные предложения</a></h2>

    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->getEventsShort(2); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
    <div class="item">
        <div class="date gray"><?php echo smarty_modifier_date($_smarty_tpl->tpl_vars['item']->value['date'],"date");?>
</div>
        <h3><a href="/specials?item=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></h3>
    </div>
    <?php } ?>
</div><?php }} ?>