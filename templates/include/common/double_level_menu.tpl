{* Двухуровневое меню *}
<ul class="nav nav-tabs nav-stacked">
{foreach from=$core->getInlineMenu(3, 1) item=item}
    {$submenu=$core->getInlineMenu(3, $item.id)}
    <li class="{if $submenu}dropdown{/if}{if $item.id == $core->page.id} active{/if}">
        <a {if $submenu}class="dropdown-toggle" data-toggle="dropdown"{/if} href="{$item.path}">{$item.name}{if $submenu}<b class="caret"></b>{/if}</a>

        {if $submenu}
        <ul class="dropdown-menu">
        {foreach from=$submenu item=subitem}
            <li{if $subitem.id == $core->page.id} class="active"{/if}>
                <a href="{$subitem.path}">{$subitem.name}</a>
            </li>
        {/foreach}
        </ul>
        {/if}
    </li>
{/foreach}
</ul>