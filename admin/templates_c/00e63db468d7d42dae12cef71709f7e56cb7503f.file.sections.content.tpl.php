<?php /* Smarty version Smarty 3.1.4, created on 2012-03-25 21:55:09
         compiled from "/var/www/fortyfour/data/www/pincher.fortyfour.ru/admin/templates/modules/sections.content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:57304534f6f5bfd8f1cf5-23679932%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00e63db468d7d42dae12cef71709f7e56cb7503f' => 
    array (
      0 => '/var/www/fortyfour/data/www/pincher.fortyfour.ru/admin/templates/modules/sections.content.tpl',
      1 => 1332574178,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '57304534f6f5bfd8f1cf5-23679932',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f6f5bfdaf0d5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f6f5bfdaf0d5')) {function content_4f6f5bfdaf0d5($_smarty_tpl) {?><div class="list_actions_toolbar">
    <div class="list_menu_buttons">
        <a class="button" href="/admin/?option=sections&suboption=content&action=create&id=<?php echo $_smarty_tpl->tpl_vars['main']->value->item_data['id'];?>
" tabindex="1">
            <span>
                <img class="button_icon icon_action icon_add_instance" src="/admin/img/frames/e.gif" />
                <b><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','create_new_item');?>
</b>
            </span>
        </a>
        <a class="button multiaction_button" href="javascript:void(0)" onclick="list.multiOperation('<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','confirm_multiple_delete');?>
', 'del', '/admin/?ajax=true&option=sections&suboption=content&id=<?php echo $_smarty_tpl->tpl_vars['main']->value->item_data['id'];?>
&action=multiple')">
            <span>
                <img class="button_icon icon_action icon_delete_instance" src="/admin/img/frames/e.gif" />
                <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','delete_selected_items');?>

            </span>
        </a>
        <a rel="show" class="button multiaction_button" href="javascript:void(0)" onclick="list.multiOperation('<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','confirm_multiple_show');?>
', 'show', '/admin/?ajax=true&option=sections&suboption=content&id=<?php echo $_smarty_tpl->tpl_vars['main']->value->item_data['id'];?>
&action=multiple')">
            <span>
                <img class="button_icon icon_action icon_hide_instance" src="/admin/img/frames/e.gif" />
                <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','show_selected_items');?>

            </span>
        </a>
        <a rel="hide" class="button multiaction_button" href="javascript:void(0)" onclick="list.multiOperation('<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('list','confirm_multiple_hide');?>
', 'hide', '/admin/?ajax=true&option=sections&suboption=content&id=<?php echo $_smarty_tpl->tpl_vars['main']->value->item_data['id'];?>
&action=multiple')">
            <span>
                <img class="button_icon icon_action icon_show_instance" src="/admin/img/frames/e.gif" />
                <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','hide_selected_items');?>

            </span>
        </a>
        <?php if ($_smarty_tpl->tpl_vars['main']->value->content_list){?>
        <a class="button right_button" href="javascript:void(0)" onclick="list.multiOperation(false, 'reorder', '/admin/?ajax=true&option=sections&suboption=content&id=<?php echo $_smarty_tpl->tpl_vars['main']->value->item_data['id'];?>
&action=multiple')">
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
            <input type="hidden" name="option" value="sections" />
            <input type="hidden" name="suboption" value="content" />
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['main']->value->item_data['id'];?>
" />
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

<script type="text/javascript">
    
    $('#content_search').ready(function(){
        autocompleteSearch($('#content_search'), '/admin/?ajax=true&action=autocomplete_search&option=sections&suboption=content&id=<?php echo $_smarty_tpl->tpl_vars['main']->value->item_data['id'];?>
');
    });
    
    $(function(){
        document.getElementById('content_search').focus();
    });
    
</script>

<?php echo $_smarty_tpl->getSubTemplate ("system/list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>