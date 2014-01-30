{$core->getPage(102)}

<div class="gallery">
{$i = 0}
{foreach $core->page.items as $image}
    {$i = $i + 1}

    <a rel="gallery" title="{$image.metadesc|escape}" class="fancybox item{if $i == 4} last{/if}{if $i == 1} first{/if}" href="{$image.path}{$image.name}_big.{$image.extension}"><img src="{$image.path}{$image.name}_pic.{$image.extension}" alt="{$image.metaname|escape}"></a>

    {if $i == 4}
        {$i = 0}
    {/if}
{/foreach}
</div>