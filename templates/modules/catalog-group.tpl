{$core->page.item.text}

<hr/>

{$items = $core->getCatalogSubItems()}

{if !empty($items)}
<ul class="catalog-map">
    {foreach $items as $item}
    <li>
        <a href="{$item.path}">{$item.name}</a>

        {$sub_items = $core->getCatalogSubItems($item.id)}
        {if !empty($sub_items)}
        <ul>
            {foreach $sub_items as $sub_item}
            <li>
                <a href="{$item.path}#item_{$sub_item.id}">{$sub_item.name}</a>
            </li>
            {/foreach}
        </ul>
        {/if}
    </li>
    {/foreach}
</ul>
{/if}

{$makers = $core->getSectionMakers()}

{if !empty($makers)}
    {include file="include/common/makers-short.tpl" items=$makers}
{/if}