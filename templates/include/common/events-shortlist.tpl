<div class="rounded textured news-announcements">
    <h2><a href="/specials" class="black-link">Специальные предложения</a></h2>

    {foreach $core->getEventsShort(2) as $item}
    <div class="item">
        <div class="date gray">{$item.date|date:"date"}</div>
        <h3><a href="/specials?item={$item.id}">{$item.name}</a></h3>
    </div>
    {/foreach}
</div>