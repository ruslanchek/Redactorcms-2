<div class="slider slider-height slider-width">
    <div class="inner-block slider-height">
        <nav class="pagination"></nav>

        <div class="items-container slider-height">
            {$i = 0}

            {foreach $core->getSliderItems() as $item}
            {$i = $i + 1}

            <div data-num="{$i}" class="item slider-height slider-width{if $i == 1} active{/if}">
                <div class="info-panel slider-height transform-easeOutExpo-500">
                    <div class="content-block">
                        <h2>{$item.name}</h2>

                        <p>
                            {$item.announce}
                        </p>

                        {if $item.link}<a href="{$item.link}" class="button button-orange">Читать подробно</a>{/if}
                    </div>
                </div>

                {$image = $core->getItemSingleImage('section_18', $item.id, 'col_125')}
                <img src="{$image.path}{$image.name}.{$image.extension}" alt="{$item.name|escape}" class="image slider-height slider-width">
            </div>
            {/foreach}

        </div>
    </div>

    <div class="shadow"></div>
</div>