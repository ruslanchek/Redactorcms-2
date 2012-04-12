{if $core->page.data.list.items}
    <ul class="thumbnails">
        {$i = 0}
        {foreach from=$core->page.data.list.items item=item}
        {$i=$i+1}
        {assign var="cover" value=$core->getItemSingleImage('section_16', $item.id, 'col_114')}
        <li class="span3">
            <div class="thumbnail">
                {if $cover}<a href="{$core->uri}?item={$item.id}"><img width="100%" src="{$cover.path}{$cover.name}_260x180.{$cover.extension}" alt="{$item.name}"></a>{/if}

                <div class="caption">
                    <h5>{$item.name}</h5>
                    {$item.announce}
                </div>
            </div>
        </li>
        {if $i%3 == 0}
            <div class="clear"></div>
        {/if}
        {/foreach}
    </ul>
{else}
    Нет видеороликов.
{/if}

{include file="include/common/pager.tpl" pager=$core->page.data.list.pager}