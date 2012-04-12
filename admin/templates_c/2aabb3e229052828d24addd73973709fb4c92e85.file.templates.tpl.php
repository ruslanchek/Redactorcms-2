<?php /* Smarty version Smarty 3.1.4, created on 2012-04-03 20:12:28
         compiled from "Z:/home/loc/digitalbakery/admin/templates\modules\templates.tpl" */ ?>
<?php /*%%SmartyHeaderCode:177904f773cb3f1bcd6-51135718%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2aabb3e229052828d24addd73973709fb4c92e85' => 
    array (
      0 => 'Z:/home/loc/digitalbakery/admin/templates\\modules\\templates.tpl',
      1 => 1333466985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177904f773cb3f1bcd6-51135718',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f773cb40f7cd',
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f773cb40f7cd')) {function content_4f773cb40f7cd($_smarty_tpl) {?><h1><?php echo $_smarty_tpl->tpl_vars['main']->value->h1;?>
</h1>

<?php if ($_smarty_tpl->tpl_vars['main']->value->module_mode=='templates'){?>
    <?php if ($_GET['action']=='edit'){?>
        <div class="left_col">
            <?php echo $_smarty_tpl->getSubTemplate ("system/form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>

        <div class="right_col">
        <?php echo $_smarty_tpl->getSubTemplate ("modules/templates.templates.edit.tools.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>

        <div class="cl"></div>
    <?php }else{ ?>
        <?php echo $_smarty_tpl->getSubTemplate ("system/section_content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php }?>
<?php }elseif($_smarty_tpl->tpl_vars['main']->value->module_mode=='zones'){?>
    <?php if ($_GET['action']=='edit'){?>
        <div class="left_col">
            <?php echo $_smarty_tpl->getSubTemplate ("system/form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>

        <div class="right_col">
        <?php echo $_smarty_tpl->getSubTemplate ("modules/templates.zones.edit.tools.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>

        <div class="cl"></div>
    <?php }else{ ?>
        <?php echo $_smarty_tpl->getSubTemplate ("system/section_content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php }?>
<?php }?><?php }} ?>