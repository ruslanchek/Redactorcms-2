<div id="menu">
    <a{if $core->page.id == 1} class="active"{/if} href="/">Главная</a>

    {foreach from=$core->getInlineMenu(3, 1) item=item}
    <a{if $item.id == $core->page.id} class="active"{/if} href="{$item.path}">{$item.name}</a>
    {/foreach}

    {*<div class="search">
        <form>
            {literal}
            <input class="search_inp unactive" type="text" value="Поиск по сайту"
                   onfocus="if(this.value == 'Поиск по сайту'){this.value = ''; this.className = 'search_inp'}"
                   onblur="if(this.value == ''){this.value = 'Поиск по сайту'; this.className = 'search_inp unactive'}" />
            <input type="submit" value="Найти" />
            {/literal}
        </form>
    </div>*}

    <div class="clear"></div>
</div>