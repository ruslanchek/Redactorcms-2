{if $pager.total_pages > 1}
<nav class="nav-pager">
    {if $pager.prev_page}<a href="{Utilities::getParamstring('page')}page={$pager.prev_page}">Предыдущая</a>{/if}

    {foreach from=$pager.pages item=item}
        {if $item.current && $item.page}
            <b>{$item.name}</b>
        {elseif $item.page}
            <a href="{Utilities::getParamstring('page')}page={$item.page}">{$item.name}</a>
        {else}
            <span>{$item.name}</span>
        {/if}
    {/foreach}

    {if $pager.next_page}<a href="{Utilities::getParamstring('page')}page={$pager.next_page}">Следующая</a>{/if}

    <div class="clear"></div>
</nav>
{/if}