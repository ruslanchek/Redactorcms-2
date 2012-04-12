{$core->page.data.announce}

{assign var="images" value=$core->getItemImageGallery('section_9', $core->page.data.id, 'col_47')}

<div class="photos_filmstrip">
    {foreach from=$images item=image key=i}
    <a rel="gallery" class="fancybox image_link item" href="{$image.path}{$image.name}.{$image.extension}"><img src="{$image.path}{$image.name}_180x125.{$image.extension}" alt="{$image.metaname}" title="{$image.metadesc}" /></a>
    {/foreach}
    <div class="clear"></div>
</div>