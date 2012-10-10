<div class="events">
{if $core->page.data.list.items}
    {foreach from=$core->page.data.list.items item=item}
    <div class="item">
        <div class="date">{$item.date|date:"date"}</div>

        <h3><a href="{$core->uri}?item={$item.id}">{$item.name}</a></h3>
        {$item.announce}
    </div>

    <hr>
    {/foreach}
{/if}
</div>

{include file="include/common/pager.tpl" pager=$core->page.data.list.pager}