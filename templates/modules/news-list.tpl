<h1>{$core->page.h1}</h1>

<div class="news-list">
    {foreach from=$core->page.items item=item}
    {$image = $core->getItemSingleImage('section_19', $item.id, 'col_152')}
    <div class="item">
        <div class="picture">
            <a class="image" href="{$item.path|escape}" title="{$item.name|escape}">
                <img src="{$image.path|escape}{$image.name|escape}_pic.{$image.extension|escape}" alt="{$item.name|escape}" />
            </a>
        </div>

        <div class="text">
            <div class="date color-gray">{$item.date|date:"date"} года</div>

            <h2><a href="{$item.path|escape}">{$item.name}</a></h2>

            {$item.announce}
        </div>

        <div class="clear"></div>
    </div>

    <hr>
    {foreachelse}
    <p class="color-gray">Нет активных записей</p>
    {/foreach}
</div>

{include file="include/common/pager.tpl" pager=$core->page.pager}
