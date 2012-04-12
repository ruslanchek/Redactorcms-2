<?php /* Smarty version Smarty 3.1.4, created on 2012-03-25 21:23:37
         compiled from "/var/www/fortyfour/data/www/pincher.fortyfour.ru/admin/templates/modules/structure.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19687160904f6f54994b9c32-88802482%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86d92199c58a8b28b703ef3df42e25219be8e83b' => 
    array (
      0 => '/var/www/fortyfour/data/www/pincher.fortyfour.ru/admin/templates/modules/structure.tpl',
      1 => 1332574178,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19687160904f6f54994b9c32-88802482',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f6f54995c3c4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f6f54995c3c4')) {function content_4f6f54995c3c4($_smarty_tpl) {?><h1><?php echo $_smarty_tpl->tpl_vars['main']->value->h1;?>
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