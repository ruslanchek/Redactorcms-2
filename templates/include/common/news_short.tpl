{$last_n = $core->getLastNewsItemData(4)}

{if $last_n}
    {foreach $last_n as $item}
        <h3>{$item.name}</h3>
        <em>{$item.date|date:"datetime"}</em>
        {$item.announce}
        <a class="btn" href="/news/?item={$item.id}">Читать далее</a>
        <br><br>
    {/foreach}
{/if}