{if $core->page.data.list.items}
    <div class="albums">
        {$i = 0}
        {foreach from=$core->page.data.list.items item=item}
        {$i=$i+1}
        {assign var="cover" value=$core->getItemSingleImage('section_9', $item.id, 'col_46')}
        <div class="album">
            <h3><a href="{$core->uri}?item={$item.id}">{$item.name}</a></h3>

            <a class="image_link" href="{$core->uri}?item={$item.id}">
                <img src="{$cover.path}{$cover.name}_180x125.{$cover.extension}" alt="" />
            </a>

            <div class="news_announce">{$item.announce}</div>
            <div class="clear"></div>
        </div>
        {if $i%3 == 0}
            <div class="clear"></div>
        {/if}
        {/foreach}

        <div class="clear"></div>
    </div>
{else}
    Нет альбомов.
{/if}