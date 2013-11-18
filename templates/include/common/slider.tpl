{$s = $core->getSliderItems()}

<div class="slider">
    <div class="horizontal-limiter">
        <div class="pager"></div>

        <div class="content-holder">
            <div class="content ready">
                <h2>{$s[0].name}</h2>

                <div class="text">{$s[0].announce}</div>
            </div>
        </div>

        <div class="items-viewport">
            <div class="items-container">
                {$l = count($s)}
                {$i = 0}
                {$yw = $l * 20}
                {$i0 = 0}
                {foreach $s as $item}
                    {$i = $i + 1}
                    {$image = $core->getItemSingleImage('section_18', $item.id, 'col_125')}

                    <div class="slider-block {if $i == 1}active{/if}" style="z-index: {$i + 1}; background-image: url({$image.path|escape}{$image.name|escape}_pic.{$image.extension|escape})" data-url="{$item.link|escape}">
                        {if $i0 > 0}
                            {$yw = $yw - 20}
                            <i class="yellow-right" style="width: {$yw}px; right: -{$yw}px"></i>
                        {/if}

                        <div class="h2">{$item.name}</div>

                        <div class="announce">
                            {$item.announce}
                        </div>
                    </div>
                    {$i0 = $i0 + 1}
                {/foreach}
            </div>
        </div>
    </div>
</div>