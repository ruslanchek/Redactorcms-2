{$data = $core->getCatalogSubItemsFullData()}

{$makers_id = array()}

{foreach $data->objects as $object}
    {foreach $data->makers as $maker}
        {if $maker.content_id == $object.maker_id && !in_array($object.maker_id, $makers_id)}
            {$void = array_push($makers_id, $object.maker_id)}

            <div class="maker-short">
                {$image = $core->getItemSingleImage('section_22', $maker.id, 'col_158')}

                {if $image}
                    <a href="{$maker.path}"><img class="maker-logo-inline" src="{$image.path|escape}{$image.name|escape}_sq.{$image.extension|escape}" alt="{$item.name|escape}"/></a>
                {/if}

                <h3><a href="{$maker.path}">{$maker.name}</a></h3>
                {$maker.short_text}

                <div class="clear"></div>
            </div>
        {/if}
    {/foreach}

    <a name="item_{$object.id}"></a>

    <h2>{$object.name}</h2>

    {$object.text}

    <hr/>
{/foreach}