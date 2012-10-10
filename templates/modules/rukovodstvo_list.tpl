<div class="bricks">
{if $core->page.data.list.items}

    {foreach from=$core->page.data.list.items item=item}
    <div class="item" style="width: 700px">
        <a class="image" href="{$core->uri}?item={$item.id}" title="{$item.name|escape}">
            <img width="700" src="{$item.pic}" alt="{$item.name|escape}" />
        </a>
        {$item.announce}
    </div>

    {/foreach}
{/if}
</div>

{include file="include/common/pager.tpl" pager=$core->page.data.list.pager}