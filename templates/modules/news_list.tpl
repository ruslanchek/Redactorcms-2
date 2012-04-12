{if $core->page.data.list.items}
    {foreach from=$core->page.data.list.items item=item}
    <div class="news_item">
        {assign var="giant_picture" value=$core->getItemSingleImage('section_6', $item.id, 'col_78')}

        {if $giant_picture}
        <p><a href="{$core->uri}?item={$item.id}"><img src="{$giant_picture.path}{$giant_picture.name}_810x1000.{$giant_picture.extension}" alt="{$item.name}" width="810" /></a></p>
        {/if}

        <h3 class="uppercase"><a class="no_decoration" href="{$core->uri}?item={$item.id}">{$item.date|date:"date"} &mdash; {$item.name}</a></h3>

        {$item.announce}

        <a href="{$core->uri}?item={$item.id}" class="uppercase no_decoration">Комментариев 5</a>
    </div>
    {/foreach}
{/if}