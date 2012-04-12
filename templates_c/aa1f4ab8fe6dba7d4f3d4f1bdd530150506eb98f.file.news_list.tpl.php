<?php /* Smarty version Smarty 3.1.4, created on 2012-04-05 21:34:02
         compiled from "/var/www/fortyfour/data/www/digitalbakery.fortyfour.ru/templates/modules/news_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:593067684f79747ccbf604-44427567%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa1f4ab8fe6dba7d4f3d4f1bdd530150506eb98f' => 
    array (
      0 => '/var/www/fortyfour/data/www/digitalbakery.fortyfour.ru/templates/modules/news_list.tpl',
      1 => 1333555939,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '593067684f79747ccbf604-44427567',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f79747cd8bdb',
  'variables' => 
  array (
    'core' => 0,
    'item' => 0,
    'giant_picture' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f79747cd8bdb')) {function content_4f79747cd8bdb($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date')) include '/var/www/fortyfour/data/www/digitalbakery.fortyfour.ru/smarty/plugins/modifier.date.php';
?><?php if ($_smarty_tpl->tpl_vars['core']->value->page['data']['list']['items']){?>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->page['data']['list']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
    <div class="news_item">
        <?php $_smarty_tpl->tpl_vars["giant_picture"] = new Smarty_variable($_smarty_tpl->tpl_vars['core']->value->getItemSingleImage('section_6',$_smarty_tpl->tpl_vars['item']->value['id'],'col_78'), null, 0);?>

        <?php if ($_smarty_tpl->tpl_vars['giant_picture']->value){?>
        <p><a href="<?php echo $_smarty_tpl->tpl_vars['core']->value->uri;?>
?item=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['giant_picture']->value['path'];?>
<?php echo $_smarty_tpl->tpl_vars['giant_picture']->value['name'];?>
_810x1000.<?php echo $_smarty_tpl->tpl_vars['giant_picture']->value['extension'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" width="810" /></a></p>
        <?php }?>

        <h3 class="uppercase"><a class="no_decoration" href="<?php echo $_smarty_tpl->tpl_vars['core']->value->uri;?>
?item=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo smarty_modifier_date($_smarty_tpl->tpl_vars['item']->value['date'],"date");?>
 &mdash; <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></h3>

        <?php echo $_smarty_tpl->tpl_vars['item']->value['announce'];?>


        <a href="<?php echo $_smarty_tpl->tpl_vars['core']->value->uri;?>
?item=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="uppercase no_decoration">Комментариев 5</a>
    </div>
    <?php } ?>
<?php }?><?php }} ?>