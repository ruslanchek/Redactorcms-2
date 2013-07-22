<div class="rounded textured news-announcements">
    <h2><a href="/news" class="black-link">Новости и статьи</a></h2>

    {foreach $core->getNewsShort(2) as $item}
    <div class="item">
        <div class="date gray">{$item.date|date:"date"}</div>
        <h3><a href="/news?item={$item.id}">{$item.name}</a></h3>
    </div>
    {/foreach}
</div>