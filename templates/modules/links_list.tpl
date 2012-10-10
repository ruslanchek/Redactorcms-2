<div class="events">
{if $core->page.data.list.items}
    {foreach from=$core->page.data.list.items item=item}
    <div class="item">
        <a class="image" href="{$item.announce}" style="width: 100px;">
            <img width="100" src="{$item.pic}" alt="{$item.name|escape}" title="{$item.name|escape}" />
        </a>

        <h3>{$item.name}</h3>

        <a href="{$item.announce}">{$item.announce}</a>
    </div>

    <hr>
    {/foreach}
{/if}
</div>

{include file="include/common/pager.tpl" pager=$core->page.data.list.pager}