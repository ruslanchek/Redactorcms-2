<div class="catalog-cell-items cci-makers">
    {foreach $items as $item}
        {$image = $core->getItemSingleImage('section_23', $item.id, 'col_166')}
        <div class="catalog-cell-item">
            <a href="{$item.path}">
                <img src="{$image.path|escape}{$image.name|escape}_pic.{$image.extension|escape}" alt="{$item.name|escape}"/>

                <h3>{$item.name}</h3>
                <span class="info">
                    <div class="name">{$item.name}</div>
                </span>
            </a>
        </div>
    {/foreach}

    <div class="clear"></div>
</div>

