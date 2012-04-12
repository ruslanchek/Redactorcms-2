<?php /* Smarty version Smarty 3.1.4, created on 2012-04-09 13:09:52
         compiled from "/Users/ruslan/Documents/sites/digitalbakery/admin/templates/modules/structure.tree.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4673933904f74c57b5f37c3-06001373%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0b420f55b1b5511b3f0c40f1ca85ba353f1bf3f' => 
    array (
      0 => '/Users/ruslan/Documents/sites/digitalbakery/admin/templates/modules/structure.tree.tpl',
      1 => 1333733878,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4673933904f74c57b5f37c3-06001373',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f74c57b67eaa',
  'variables' => 
  array (
    'main' => 0,
    'structure' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f74c57b67eaa')) {function content_4f74c57b67eaa($_smarty_tpl) {?><script type="text/javascript">
    
    var messages = {
        move_item: '<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('structure','item_move_confirm_text');?>
'
    };
    
</script>

<div class="tree_table">
    <div id="tools_container">
        <div id="item_tools">
            <div class="tools_inner">
                <div class="upndown">
                    <a class="icon_action icon_move_up_instance" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('structure','item_up');?>
" href="javascript:void(0)" onclick="turnUpItem($(this))" id="turnUpItem"></a>
                    <span class="icon_action icon_move_up_instance_unactive" id="turnUpItemUnactive"></span>

                    <a class="icon_action icon_move_down_instance" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('structure','item_down');?>
" href="javascript:void(0)" onclick="turnDownItem($(this))" id="turnDownItem"></a>
                    <span class="icon_action icon_move_down_instance_unactive" id="turnDownItemUnactive"></span>
                </div>

                <a class="icon_action icon_show_instance" href="javascript:void(0)" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('structure','item_publish');?>
" onclick="publishItem(this)" id="publishItem"></a>
                <a class="icon_action icon_hide_instance" href="javascript:void(0)" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('structure','item_hide');?>
" onclick="hideItem(this)" id="hideItem"></a>
                <a class="icon_action icon_delete_instance" href="javascript:void(0)" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('structure','item_delete');?>
" onclick="delItem(this, '<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('structure','item_delete_confirm_text');?>
')" id="delItem"></a>
                <a class="icon_action icon_add_instance" href="javascript:void(0)" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('structure','item_add');?>
" onclick="addChildItem(this)" id="addChildItem"></a>
            </div>
        </div>
    </div>

    <ul class="tt_list" id="tag_tree">
        <li id="item_1" class="tree_item root <?php if ($_smarty_tpl->tpl_vars['structure']->value->getNodeData(1,'publish')==1){?>active<?php }else{ ?>hided<?php }?>">
            <div class="item_container">
                <div class="item_container_inner">
                    <a href="/admin/?option=structure&suboption=edit&id=1"><?php echo $_smarty_tpl->tpl_vars['structure']->value->getNodeData(1,'name');?>
</a>
                    <span class="path">/</span>
                    <a href="/" target="_blank" class="path">/</a>
                </div>
            </div>
        </li>

        <?php echo $_smarty_tpl->tpl_vars['structure']->value->getRenderedBranch();?>

    </ul>
</div><?php }} ?>