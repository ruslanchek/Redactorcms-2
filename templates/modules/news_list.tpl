<div class="events">
{if $core->page.data.list.items}
    {foreach from=$core->page.data.list.items item=item}
    <div class="item">
        <a class="image" href="{$core->uri}?item={$item.id}" title="{$item.name|escape}">
            <img width="150" src="{$item.pic}" alt="{$item.name|escape}" />
        </a>

        <div class="date">{$item.date|date:"date"}</div>

        <h3><a href="{$core->uri}?item={$item.id}">{$item.name}</a></h3>
        {$item.announce}
    </div>

    <hr>
    {/foreach}
{/if}
</div>

{include file="include/common/pager.tpl" pager=$core->page.data.list.pager}