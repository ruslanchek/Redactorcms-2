<div class="news">
    <div class="limiter">
        <h1>Новости и события</h1>

        <div class="units-row-end">
            {foreach $core->getNewsShort(3) as $item}
            <div class="unit-33 item">
                <a class="black-link" href="{$item.path}">{$item.name}</a>
                <span class="date">{$item.date|date:"date"}</span>
            </div>
            {/foreach}
        </div>
    </div>
</div>