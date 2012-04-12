<ul class="main_menu">
    {foreach from=$main->config.admin_modules item=item}
        {if $item.2}
            {if $main->module_name == $item.0}
                <li>
                    <span class="ml_sprite {$item.0}"></span>
                    <span class="menu_text_active"><span>{$main->getText('modules_menu', $item.0)}</span></span>
                </li>
            {else}
                <li>
                    <a class="ml_link" href="/admin/?option={$item.0}">
                        <span class="ml_sprite {$item.0}"></span>
                        <span class="menu_text_link">{$main->getText('modules_menu', $item.0)}</span>
                    </a>
                </li>
            {/if}
        {/if}
    {/foreach}
</ul>

<div class="menu_shade"></div>

{if $main->submenu}
<ul class="main_menu_sublevel overall_padding">
    {foreach from=$main->submenu item=item}
        {if $item.active}
            <li class="active_sml">{$item.name}</li>
        {else}
            <li><a href="{$item.url}">{$item.name}</a></li>
        {/if}
    {/foreach}
</ul>
{/if}