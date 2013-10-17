<?php /* Smarty version Smarty 3.1.4, created on 2013-10-02 19:23:15
         compiled from "/Users/ruslan/Sites/redactorcms2/templates/include/common/events-shortlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1973714767524c3a63981e80-65910428%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1f3b420b880c47e6246ee7c8cf6bf99727189d6' => 
    array (
      0 => '/Users/ruslan/Sites/redactorcms2/templates/include/common/events-shortlist.tpl',
      1 => 1379944938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1973714767524c3a63981e80-65910428',
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
  'unifunc' => 'content_524c3a639e4c4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_524c3a639e4c4')) {function content_524c3a639e4c4($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date')) include '/Users/ruslan/Sites/redactorcms2/smarty/plugins/modifier.date.php';
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