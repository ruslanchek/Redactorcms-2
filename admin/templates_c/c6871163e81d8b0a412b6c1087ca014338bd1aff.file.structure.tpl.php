<?php /* Smarty version Smarty 3.1.4, created on 2012-04-09 13:09:52
         compiled from "/Users/ruslan/Documents/sites/digitalbakery/admin/templates/modules/structure.tpl" */ ?>
<?php /*%%SmartyHeaderCode:544040864f74c57b53e1d6-58431526%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6871163e81d8b0a412b6c1087ca014338bd1aff' => 
    array (
      0 => '/Users/ruslan/Documents/sites/digitalbakery/admin/templates/modules/structure.tpl',
      1 => 1333733878,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '544040864f74c57b53e1d6-58431526',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f74c57b5eb4b',
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f74c57b5eb4b')) {function content_4f74c57b5eb4b($_smarty_tpl) {?><h1><?php echo $_smarty_tpl->tpl_vars['main']->value->h1;?>
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