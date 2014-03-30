<?php /* Smarty version Smarty 3.1.4, created on 2014-03-04 11:37:12
         compiled from "/home/sdnadmin/site_new/templates/include/common/news-shortlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28372728652e9518d97e6a5-67443283%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c9cf227081a6e1609c9bd8340f76aa3f395aa08' => 
    array (
      0 => '/home/sdnadmin/site_new/templates/include/common/news-shortlist.tpl',
      1 => 1393918300,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28372728652e9518d97e6a5-67443283',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e9518d9acf0',
  'variables' => 
  array (
    'core' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e9518d9acf0')) {function content_52e9518d9acf0($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date')) include '/home/sdnadmin/site_new/smarty/plugins/modifier.date.php';
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