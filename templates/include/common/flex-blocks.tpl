
<div class="flex-blocks units-row-end">
    {foreach $core->getFlexBlocks() as $item}
    <div class="unit-33">
        &nbsp;
        <div class="item">
            <h2 class="color-blue">{$item.name}</h2>

            <p>
                {$item.text_1}

                <span class="hidden">
                    {$item.text_2}
                </span>
            </p>

        </div>
    </div>
    {/foreach}
</div>
