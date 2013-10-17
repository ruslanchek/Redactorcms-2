<div class="slider">
    <div class="horizontal-limiter">
        <div class="items-viewport">
            <div class="pager"><a href="#"></a></div>

            <div class="items-container">
                {$i = 0}

                {foreach $core->getSliderItems() as $item}
                {$i = $i + 1}
                {$image = $core->getItemSingleImage('section_18', $item.id, 'col_125')}
                <div class="slider-block" style="background-image: url({$image.path|escape}{$image.name|escape}.{$image.extension|escape})" data-url="{$item.link|escape}">
                    <div class="content-holder">
                        <div class="content">
                            <h2>{$item.name}</h2>

                            {$item.announce}
                        </div>

                        <div class="p-1"></div>
                        <div class="p-2"></div>
                        <div class="p-3"></div>
                    </div>
                </div>
                {/foreach}

            </div>
        </div>
    </div>
</div>