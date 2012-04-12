<div class="list_actions_toolbar">
    <div class="list_menu_buttons">
        <a class="button" href="{$main->new_item_link}" tabindex="1">
            <span>
                <img class="button_icon icon_action icon_add_instance" src="/admin/img/frames/e.gif" />
                <b>{$main->getText('sections', 'create_new_item')}</b>
            </span>
        </a>
        <a class="button multiaction_button" href="javascript:void(0)" onclick="list.multiOperation('{$main->getText('list', 'confirm_multiple_delete')}', 'del', '{$main->multiple_link}')">
            <span>
                <img class="button_icon icon_action icon_delete_instance" src="/admin/img/frames/e.gif" />
                {$main->getText('sections', 'delete_selected_items')}
            </span>
        </a>
        <a rel="show" class="button multiaction_button" href="javascript:void(0)" onclick="list.multiOperation('{$main->getText('list', 'confirm_multiple_show')}', 'show', '{$main->multiple_link}')">
            <span>
                <img class="button_icon icon_action icon_hide_instance" src="/admin/img/frames/e.gif" />
                {$main->getText('sections', 'show_selected_items')}
            </span>
        </a>
        <a rel="hide" class="button multiaction_button" href="javascript:void(0)" onclick="list.multiOperation('{$main->getText('list', 'confirm_multiple_hide')}', 'hide', '{$main->multiple_link}')">
            <span>
                <img class="button_icon icon_action icon_show_instance" src="/admin/img/frames/e.gif" />
                {$main->getText('sections', 'hide_selected_items')}
            </span>
        </a>

        {if $main->content_list && !$main->vars.list_no_sortable}
        <a class="button right_button" href="javascript:void(0)" onclick="list.multiOperation(false, 'reorder', '{$main->multiple_link}')">
            <span>
                <img class="button_icon icon_action icon_reorder_instance" src="/admin/img/frames/e.gif" />
                {$main->getText('sections', 'reorder_selected_items')}
            </span>
        </a>
        {/if}

        <div class="cl"></div>
    </div>

    {if $main->content_list || (!$main->content_list && $smarty.get.content_search)}
    <div class="stripe_form">
        <form action="/admin/" method="GET">
            <input type="hidden" name="option" value="users" />
            {if $smarty.get.content_search}
                <a title="{$main->getText('sections', 'search_reset_help')}" href="{Utilities::getParamstring('content_search,action,ajax')}" class="reset icon_delete_instance"></a>
            {/if}
            <input class="textfield" id="content_search" name="content_search" type="text" autocomplete="off" value="{$smarty.get.content_search}" />
            <input class="go" type="submit" title="{$main->getText('sections', 'search_help')}" value="{$main->getText('sections', 'search')}" />
        </form>
    </div>
    {/if}

    <div class="cl"></div>
</div>

{if $main->content_list || $smarty.get.content_search}
<script type="text/javascript">
    {literal}
    $('#content_search').ready(function(){
        autocompleteSearch($('#content_search'), '{/literal}{$main->autocomplete_search_link}{literal}');
    });

    $(function(){
        document.getElementById('content_search').focus();
    });
    {/literal}
</script>
{/if}

{include file="system/list.tpl"}