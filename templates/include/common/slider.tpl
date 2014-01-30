{$s = $core->getSliderItems()}

<div class="slider">
    <nav class="pager">
        {foreach from=$s item=item key=i}
            <a data-id="{$i}" class="animation-fade{if $i == 0} active{/if}" href="#"></a>
        {/foreach}
    </nav>

    {foreach from=$s item=item key=i}
        {$image = $core->getItemSingleImage('section_18', $item.id, 'col_125')}
        <div  data-id="{$i}" class="slide{if $i == 0} active{/if}" data-gourl="{$item.link|escape}">
            <div class="badge">
                <h2>{$item.name}</h2>

                {$item.announce}
            </div>

            <img alt="{$item.name|escape}" src="{$image.path|escape}{$image.name|escape}.{$image.extension|escape}">
        </div>
    {/foreach}
</div>

<script>
    $(function() {
        slider.init();
    });
</script>