{if $pager.total_pages > 1}

<div class="pager">

    {if $pager.prev_page}<a href="{Utilities::getParamstring('page')}page={$pager.prev_page}">Предыдущая</a>{/if}

    {foreach from=$pager.pages item=item}
        {if $item.current && $item.page}
            <b>{$item.name}</b>
        {elseif $item.page}
            <a href="{Utilities::getParamstring('page')}page={$item.page}">{$item.name}</a></li>
        {else}
            <a>{$item.name}</a>
        {/if}
    {/foreach}

    {if $pager.next_page}<a href="{Utilities::getParamstring('page')}page={$pager.next_page}">Следующая</a>{/if}

</div>
{/if}