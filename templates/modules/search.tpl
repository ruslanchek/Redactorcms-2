<div class="search-global">
    <form action="/search">
        <input type="search" name="sq" placeholder="Поиск" value="{$core->page.sq|escape}" />
        <input class="button" type="submit" value="Найти"/>
    </form>
</div>

{if $core->page.sq != ''}
    <div class="search-list">
        {if $core->page.data->results_count > 0}
            <p class="color-gray">Найдено {$core->page.data->results_count} {$core->page.data->word}</p>

            <ol>
                {foreach from=$core->page.data->items item=item key=i}
                    <li class="item">
                        <a href="{$item.url}">{$item.title}</a>

                        {$item.content}
                    </li>
                {/foreach}
            </ol>
        {else}
            <p class="color-gray">Ничего не найдено</p>
        {/if}
    </div>

    {include file="include/common/pager.tpl" pager=$core->page.result.pager}
{/if}