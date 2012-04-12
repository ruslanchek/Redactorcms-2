{* Главное меню *}
<ul class="nav">
    {foreach from=$core->getInlineMenu(3, 1) item=item}
    <li{if $item.id == $core->page.id} class="active"{/if}><a href="{$item.path}">{$item.name}</a></li>
    {/foreach}
</ul>