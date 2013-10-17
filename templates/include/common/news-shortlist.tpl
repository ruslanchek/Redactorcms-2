<div class="news-shortlist">
    <h2 class="uppercase">Новости</h2>

    {foreach $core->getNewsShort(5) as $item}
        <div class="item">
            <div class="date color-gray">{$item.date|date:"date"} года</div>
            <h3><a href="{$item.path}">{$item.name}</a></h3>
            {$item.announce}
        </div>
    {/foreach}

    <a href="/news">Читать все новости</a>
</div>