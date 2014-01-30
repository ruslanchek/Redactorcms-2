<div class="news-list">
    {foreach from=$core->page.items item=item}
    <div class="item">
        <h2><a class="black-link" href="{$item.path}">{$item.name}</a></h2>
        <div class="date">{$item.date|date:"date"}</div>
        {$item.announce}
    </div>

    {foreachelse}
    Нет активных записей
    {/foreach}
</div>

{include file="include/common/pager.tpl" pager=$core->page.pager}