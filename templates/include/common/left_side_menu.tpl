{* Главное меню *}
<ul id="left_menu">
    {foreach from=$core->getInlineMenu(3, 1) item=item}
        <li class="hoog_font">
            {if $item.id == $core->page.id}
                <b>{$item.name}</b>
            {else}
                <a href="{$item.path}">{$item.name}</a>
            {/if}
        </li>
    {/foreach}
</ul>