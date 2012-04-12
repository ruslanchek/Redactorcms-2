<?php /* Smarty version Smarty 3.1.4, created on 2011-12-10 14:34:10
         compiled from "Z:/home/loc/redactorcms/admin/templates\system\section_content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:308914ee343b279e665-86364388%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46e437ac5f563ada40e7636cc308b5a2fecc8e61' => 
    array (
      0 => 'Z:/home/loc/redactorcms/admin/templates\\system\\section_content.tpl',
      1 => 1322914709,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '308914ee343b279e665-86364388',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4ee343b2a77c3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ee343b2a77c3')) {function content_4ee343b2a77c3($_smarty_tpl) {?><div class="list_actions_toolbar">
    <div class="list_menu_buttons">
        <a class="button" href="<?php echo $_smarty_tpl->tpl_vars['main']->value->new_item_link;?>
" tabindex="1">
            <span>
                <img class="button_icon icon_action icon_add_instance" src="/admin/img/frames/e.gif" />
                <b><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','create_new_item');?>
</b>
            </span>
        </a>
        <a class="button multiaction_button" href="javascript:void(0)" onclick="list.multiOperation('<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','confirm_multiple_delete');?>
', 'del', '<?php echo $_smarty_tpl->tpl_vars['main']->value->multiple_link;?>
')">
            <span>
                <img class="button_icon icon_action icon_delete_instance" src="/admin/img/frames/e.gif" />
                <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','delete_selected_items');?>

            </span>
        </a>
        <a rel="show" class="button multiaction_button" href="javascript:void(0)" onclick="list.multiOperation('<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','confirm_multiple_show');?>
', 'show', '<?php echo $_smarty_tpl->tpl_vars['main']->value->multiple_link;?>
')">
            <span>
                <img class="button_icon icon_action icon_hide_instance" src="/admin/img/frames/e.gif" />
                <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','show_selected_items');?>

            </span>
        </a>
        <a rel="hide" class="button multiaction_button" href="javascript:void(0)" onclick="list.multiOperation('<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','confirm_multiple_hide');?>
', 'hide', '<?php echo $_smarty_tpl->tpl_vars['main']->value->multiple_link;?>
')">
            <span>
                <img class="button_icon icon_action icon_show_instance" src="/admin/img/frames/e.gif" />
                <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','hide_selected_items');?>

            </span>
        </a>

        <?php if ($_smarty_tpl->tpl_vars['main']->value->content_list&&!$_smarty_tpl->tpl_vars['main']->value->vars['list_no_sortable']){?>
        <a class="button right_button" href="javascript:void(0)" onclick="list.multiOperation(false, 'reorder', '<?php echo $_smarty_tpl->tpl_vars['main']->value->multiple_link;?>
')">
            <span>
                <img class="button_icon icon_action icon_reorder_instance" src="/admin/img/frames/e.gif" />
                <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','reorder_selected_items');?>

            </span>
        </a>
        <?php }?>

        <div class="cl"></div>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['main']->value->content_list||(!$_smarty_tpl->tpl_vars['main']->value->content_list&&$_GET['content_search'])){?>
    <div class="stripe_form">
        <form action="/admin/" method="GET">
            <input type="hidden" name="option" value="users" />
            <?php if ($_GET['content_search']){?>
                <a title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','search_reset_help');?>
" href="<?php echo Utilities::getParamstring('content_search,action,ajax');?>
" class="reset icon_delete_instance"></a>
            <?php }?>
            <input class="textfield" id="content_search" name="content_search" type="text" autocomplete="off" value="<?php echo $_GET['content_search'];?>
" />
            <input class="go" type="submit" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','search_help');?>
" value="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','search');?>
" />
        </form>
    </div>
    <?php }?>

    <div class="cl"></div>
</div>

<?php if ($_smarty_tpl->tpl_vars['main']->value->content_list||$_GET['content_search']){?>
<script type="text/javascript">
    
    $('#content_search').ready(function(){
        autocompleteSearch($('#content_search'), '<?php echo $_smarty_tpl->tpl_vars['main']->value->autocomplete_search_link;?>
');
    });

    $(function(){
        document.getElementById('content_search').focus();
    });
    
</script>
<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ("system/list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>