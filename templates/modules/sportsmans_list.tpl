<div class="bricks">
{if $core->page.data.list.items}
    {$i = 0}

    {foreach from=$core->page.data.list.items item=item}
    <div class="item">
        <a class="image" href="{$core->uri}?item={$item.id}" title="{$item.name|escape}">
            <img width="300" src="{$item.pic}" alt="{$item.name|escape}" />
        </a>

        <h3><a href="{$core->uri}?item={$item.id}">{$item.name}</a></h3>
        {$item.announce}
    </div>

    {$i = $i + 1}

    {if $i == 2}
        {$i = 0}

        <hr>
    {/if}

    {/foreach}
{/if}
    <div class="clear"></div>
</div>

{include file="include/common/pager.tpl" pager=$core->page.data.list.pager}