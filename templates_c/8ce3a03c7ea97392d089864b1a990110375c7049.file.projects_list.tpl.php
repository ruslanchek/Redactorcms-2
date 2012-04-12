<?php /* Smarty version Smarty 3.1.4, created on 2012-04-10 15:52:34
         compiled from "Z:/home/loc/digitalbakery/templates\modules\projects_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84004f7b21490546a0-22442788%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ce3a03c7ea97392d089864b1a990110375c7049' => 
    array (
      0 => 'Z:/home/loc/digitalbakery/templates\\modules\\projects_list.tpl',
      1 => 1334058746,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84004f7b21490546a0-22442788',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f7b21492602a',
  'variables' => 
  array (
    'core' => 0,
    'item' => 0,
    'i' => 0,
    'image' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7b21492602a')) {function content_4f7b21492602a($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['core']->value->page['data']['list']['items']){?>
    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>

    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->page['data']['list']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable($_smarty_tpl->tpl_vars['core']->value->getProjectType($_smarty_tpl->tpl_vars['item']->value['type']), null, 0);?>

        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>

        <?php if ($_smarty_tpl->tpl_vars['i']->value==1){?>
            <?php $_smarty_tpl->tpl_vars["image"] = new Smarty_variable($_smarty_tpl->tpl_vars['core']->value->getItemSingleImage('section_13',$_smarty_tpl->tpl_vars['item']->value['id'],'col_98'), null, 0);?>

            <a href="javascript:void(0)" rel="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="project_item brick_item_wide">
                <span class="brick_item_wide_image" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['image']->value['path'];?>
<?php echo $_smarty_tpl->tpl_vars['image']->value['name'];?>
_810x250.<?php echo $_smarty_tpl->tpl_vars['image']->value['extension'];?>
);"></span>
                <span class="brick_bottom" style="background-color: #<?php echo $_smarty_tpl->tpl_vars['type']->value['color'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</span>
            </a>
        <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars["image"] = new Smarty_variable($_smarty_tpl->tpl_vars['core']->value->getItemSingleImage('section_13',$_smarty_tpl->tpl_vars['item']->value['id'],'col_97'), null, 0);?>

            <div class="brick_item_narrow<?php if ($_smarty_tpl->tpl_vars['i']->value==4||$_smarty_tpl->tpl_vars['i']->value==7||$_smarty_tpl->tpl_vars['i']->value==10){?> no_padding<?php }?>">
                <a href="javascript:void(0)" rel="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="project_item brick_image" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['image']->value['path'];?>
<?php echo $_smarty_tpl->tpl_vars['image']->value['name'];?>
_250x250.<?php echo $_smarty_tpl->tpl_vars['image']->value['extension'];?>
);"></a>
                <a href="javascript:void(0)" rel="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="project_item brick_bottom" style="background-color: #<?php echo $_smarty_tpl->tpl_vars['type']->value['color'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

                </a>
                <div class="brick_description">
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>

                </div>
            </div>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['i']->value==10){?>
        <div class="clear"></div>
            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
        <?php }?>
    <?php } ?>
<?php }?><?php }} ?>