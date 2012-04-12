{if $pager.total_pages > 1}
<div class="pagination">
    <ul>
    {if $pager.prev_page}<li><a href="{Utilities::getParamstring('page')}page={$pager.prev_page}">Предыдущая</a></li>{/if}

    {foreach from=$pager.pages item=item}
        {if $item.current && $item.page}
            <li class="active"><a>{$item.name}</a></li>
        {elseif $item.page}
            <li><a href="{Utilities::getParamstring('page')}page={$item.page}">{$item.name}</a></li>
        {else}
            <li><a>{$item.name}</a></li>
        {/if}
    {/foreach}

    {if $pager.next_page}<li><a href="{Utilities::getParamstring('page')}page={$pager.next_page}">Следующая</a></li>{/if}
    </ul>
</div>
{/if}