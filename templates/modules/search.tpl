<div class="search">
    <form action="/search">
        <input type="text" name="sq" placeholder="Поиск" value="{$core->page.sq|escape}" />
        <input class="btn" type="submit" value="Найти"/>
    </form>
</div>

{if $core->page.sq != ''}
    <div class="search-list">
        {foreach from=$core->page.result.items item=item}
            <div class="item">
                <h2><a href="{$core->uri}">{$item.title}</a></h2>

                {$item.content}
            </div>

            <hr>
        {foreachelse}
            <p class="color-gray">Ничего не найдено</p>
        {/foreach}
    </div>

    {include file="include/common/pager.tpl" pager=$core->page.result.pager}
{/if}