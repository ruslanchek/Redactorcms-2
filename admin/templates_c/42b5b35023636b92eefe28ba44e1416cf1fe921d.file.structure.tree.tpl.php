<?php /* Smarty version Smarty 3.1.4, created on 2012-03-25 21:23:37
         compiled from "/var/www/fortyfour/data/www/pincher.fortyfour.ru/admin/templates/modules/structure.tree.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19398466784f6f54995ce890-36675568%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42b5b35023636b92eefe28ba44e1416cf1fe921d' => 
    array (
      0 => '/var/www/fortyfour/data/www/pincher.fortyfour.ru/admin/templates/modules/structure.tree.tpl',
      1 => 1332574179,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19398466784f6f54995ce890-36675568',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
    'structure' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f6f54996aa47',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f6f54996aa47')) {function content_4f6f54996aa47($_smarty_tpl) {?><script type="text/javascript">
    
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