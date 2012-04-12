<?php /* Smarty version Smarty 3.1.4, created on 2012-03-19 15:57:55
         compiled from "Z:/home/loc/susl/admin/templates\modules\structure.tpl" */ ?>
<?php /*%%SmartyHeaderCode:108864f671f43168183-03912571%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83023561cfad3fed42c0c218d13ea7d405dde462' => 
    array (
      0 => 'Z:/home/loc/susl/admin/templates\\modules\\structure.tpl',
      1 => 1332157838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108864f671f43168183-03912571',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f671f431d966',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f671f431d966')) {function content_4f671f431d966($_smarty_tpl) {?><h1><?php echo $_smarty_tpl->tpl_vars['main']->value->h1;?>
</h1>

<?php if ($_smarty_tpl->tpl_vars['main']->value->module_mode=='menu'){?>
    <?php if ($_GET['action']=='edit'){?>
        <div class="left_col">
            <?php echo $_smarty_tpl->getSubTemplate ("system/form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>

        <div class="right_col">
        <?php echo $_smarty_tpl->getSubTemplate ("modules/structure.edit_menu.tools.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>

        <div class="cl"></div>
    <?php }else{ ?>
        <?php echo $_smarty_tpl->getSubTemplate ("system/section_content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php }?>

<?php }else{ ?>

    <?php if ($_smarty_tpl->tpl_vars['main']->value->module_mode=='tree'){?>
        <div class="left_col">
        <?php echo $_smarty_tpl->getSubTemplate ("modules/structure.tree.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>

        <div class="right_col">
        <?php echo $_smarty_tpl->getSubTemplate ("modules/structure.tree.tools.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['main']->value->module_mode=='edit'){?>
        <div class="left_col">
        <?php echo $_smarty_tpl->getSubTemplate ("modules/structure.edit.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>

        <div class="right_col">
        <?php echo $_smarty_tpl->getSubTemplate ("modules/structure.edit.tools.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    <?php }?>
<?php }?>

<div class="cl"></div><?php }} ?>