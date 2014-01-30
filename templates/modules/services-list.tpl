{$core->getPage(94)}


<div class="services-list">
    <div class="units-row">
        {$i = 0}

        {foreach from=$core->page.items item=item}
            {$i = $i + 1}

            <div class="unit-50">
                <a href="{$item.path}" class="item">
                    <h2>{$item.name}</h2>
                    {$item.announce}
                </a>
            </div>

            {if $i == 2}
    </div>
    <div class="units-row">
                {$i = 0}
            {/if}
        {/foreach}

    </div>
</div>