<nav class="nav-top">
    {foreach from=$core->getInlineMenu(3, 1) item=item}
        <a href="{$item.path}" {if $item.id == $core->page.id} class="active"{/if}>{$item.name}</a>
    {/foreach}

    <div class="shadow"></div>
</nav>