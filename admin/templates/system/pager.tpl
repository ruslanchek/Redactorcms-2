{if $main->pager.total_pages > 1}
<div class="pager">
    <span class="notice">Страницы</span>
    {foreach from=$main->pager.pages_array item=item}
        {if $item.current && $item.page}
            <b><span>{$item.name}</span></b>
        {elseif $item.page}
            <a href="{Utilities::getParamstring('page')}&page={$item.page}">{$item.name}</a>
        {else}
            <span>{$item.name}</span>
        {/if}
    {/foreach}
    <span class="ctrl">{if $main->pager.prev_page}&larr; {/if}<span id="navbutton">Ctrl</span>{if $main->pager.next_page} &rarr;{/if}</span>

    <script type="text/javascript">
        setPagerLink({if $main->pager.prev_page}'{Utilities::getParamstring('page')}&page={$main->pager.prev_page}'{else}false{/if}, {if $main->pager.next_page}'{Utilities::getParamstring('page')}&page={$main->pager.next_page}'{else}false{/if});
    </script>
</div>
{/if}

{if $main->pager.total_items > 10}
<div class="pager limiter">
    <span class="notice">Объектов на странице</span>
    {if $smarty.get.limit == 10 || (!$smarty.get.limit && $main->current_per_page == 10) || (!$smarty.get.limit && !$main->current_per_page)}
        <b><span>10</span></b>
    {else}
        <a href="{Utilities::getParamstring('limit')}&limit=10">10</a>
    {/if}

    {if $smarty.get.limit == 25 || (!$smarty.get.limit && $main->current_per_page == 25)}
        <b><span>25</span></b>
    {else}
        <a href="{Utilities::getParamstring('limit')}&limit=25">25</a>
    {/if}

    {if $smarty.get.limit == 50 || (!$smarty.get.limit && $main->current_per_page == 50)}
        <b><span>50</span></b> 
    {else}
        <a href="{Utilities::getParamstring('limit')}&limit=50">50</a>
    {/if}

    {if $smarty.get.limit == 100 || (!$smarty.get.limit && $main->current_per_page == 100)}
        <b><span>100</span></b>
    {else}
        <a href="{Utilities::getParamstring('limit')}&limit=100">100</a>
    {/if}
</div>
{/if}

<div class="cl"></div>