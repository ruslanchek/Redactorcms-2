<?php /* Smarty version Smarty 3.1.4, created on 2012-03-26 17:14:38
         compiled from "/Users/ruslan/Documents/sites/pincher/admin/templates/modules/users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15517647614f706bbe2fa357-23110775%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e83513f0cd690a11c7988f580a8b5ba1f4b5278' => 
    array (
      0 => '/Users/ruslan/Documents/sites/pincher/admin/templates/modules/users.tpl',
      1 => 1332571836,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15517647614f706bbe2fa357-23110775',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f706bbe3dbf7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f706bbe3dbf7')) {function content_4f706bbe3dbf7($_smarty_tpl) {?><h1><?php echo $_smarty_tpl->tpl_vars['main']->value->h1;?>
</h1>

<?php if ($_smarty_tpl->tpl_vars['main']->value->module_mode=='system_users'){?>
    <?php if ($_GET['action']=='edit'){?>
        <div class="left_col">
            <?php echo $_smarty_tpl->getSubTemplate ("system/form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>

        <div class="right_col">
        <?php echo $_smarty_tpl->getSubTemplate ("modules/users.system_users.edit.tools.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>

        <div class="cl"></div>
    <?php }else{ ?>
        <?php echo $_smarty_tpl->getSubTemplate ("system/section_content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php }?>

<?php }elseif($_smarty_tpl->tpl_vars['main']->value->module_mode=='groups'){?>

    <?php if ($_GET['action']=='edit'){?>
        <div class="left_col">
            <?php echo $_smarty_tpl->getSubTemplate ("system/form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>

        <div class="right_col">
        <?php echo $_smarty_tpl->getSubTemplate ("modules/users.groups.edit.tools.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>

        <div class="cl"></div>
    <?php }else{ ?>
        <?php echo $_smarty_tpl->getSubTemplate ("system/section_content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php }?>

<?php }elseif($_smarty_tpl->tpl_vars['main']->value->module_mode=='public_users'){?>

    <?php if ($_GET['action']=='edit'){?>
        <div class="left_col">
            <?php echo $_smarty_tpl->getSubTemplate ("system/form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>

        <div class="right_col">
        <?php echo $_smarty_tpl->getSubTemplate ("modules/users.public_users.edit.tools.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>

        <div class="cl"></div>
    <?php }else{ ?>
        <?php echo $_smarty_tpl->getSubTemplate ("system/section_content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php }?>
<?php }?><?php }} ?>