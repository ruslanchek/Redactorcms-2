<div class="events">
    {foreach from=$core->page.data.list.items item=item}
    <div class="item">
        {*<a class="image" href="{$core->uri}?item={$item.id}" title="{$item.name|escape}">
            <img width="150" src="{$item.pic}" alt="{$item.name|escape}" />
        </a>*}

        <div class="date gray">{$item.date|date:"date"}</div>

        <h3><a href="{$core->uri}?item={$item.id}">{$item.name}</a></h3>
        {$item.announce}
    </div>

    <hr>
    {foreachelse}
    <blockquote><i class="halflings warning-sign"></i>&nbsp;&nbsp;Нет активных записей</blockquote>
    {/foreach}
</div>

{include file="include/common/pager.tpl" pager=$core->page.data.list.pager}