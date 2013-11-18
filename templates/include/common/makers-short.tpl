<div class="catalog-cell-items cci-makers">
    {foreach $items as $item}
        {$image = $core->getItemSingleImage('section_22', $item.id, 'col_158')}
        <div class="catalog-cell-item">
            <a href="{$item.path}">
                <img src="{$image.path|escape}{$image.name|escape}_sq.{$image.extension|escape}" alt="{$item.name|escape}"/>

                <h3>{$item.name}</h3>
                <span class="info">
                    <div class="name">{$item.name}</div>
                    <div class="country">{$item.country}</div>
                    <div class="desc">{$item.announce|truncate:130:"...":false}</div>
                </span>
            </a>
        </div>
    {/foreach}

    <div class="clear"></div>
</div>