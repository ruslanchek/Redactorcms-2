{if $core->page.data.list.items}
    {$i = 0}

    {foreach from=$core->page.data.list.items item=item}
        {$type = $core->getProjectType($item.type)}

        {$i = $i + 1}

        {if $i == 1}
            {assign var="image" value=$core->getItemSingleImage('section_13', $item.id, 'col_98')}

            <a href="javascript:void(0)" rel="{$item.id}" class="project_item brick_item_wide">
                <span class="brick_item_wide_image" style="background-image: url({$image.path}{$image.name}_810x250.{$image.extension});"></span>
                <span class="brick_bottom" style="background-color: #{$type.color}">{$item.name}</span>
            </a>
        {else}
            {assign var="image" value=$core->getItemSingleImage('section_13', $item.id, 'col_97')}

            <div class="brick_item_narrow{if $i == 4 || $i == 7 || $i == 10} no_padding{/if}">
                <a href="javascript:void(0)" rel="{$item.id}" class="project_item brick_image" style="background-image: url({$image.path}{$image.name}_250x250.{$image.extension});"></a>
                <a href="javascript:void(0)" rel="{$item.id}" class="project_item brick_bottom" style="background-color: #{$type.color}">
                    {$item.name}
                </a>
                <div class="brick_description">
                    {$item.description}
                </div>
            </div>
        {/if}

        {if $i == 10}
        <div class="clear"></div>
            {$i = 0}
        {/if}
    {/foreach}
{/if}