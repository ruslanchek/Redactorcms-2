{if $core->page.data.list.items}
    {foreach from=$core->page.data.list.items item=item}
    <div class="news-item">
        <h3><a href="{$core->uri}?item={$item.id}">{$item.name}</a></h3>
        <div class="data">{$item.date|date:"date"}</div>

        <div class="news_announce">{$item.announce}</div>
        <div class="clear"></div>
    </div>
    {/foreach}
{else}
    Новостей нет.
{/if}

{include file="include/common/pager.tpl" pager=$core->page.data.list.pager}