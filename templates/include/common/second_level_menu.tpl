{* Меню второго уровня *}
{$second_level_menu=$core->getInlineMenu(4, $core->page.id)}

{if !$second_level_menu && $core->page.pid > 1}
    {$second_level_menu=$core->getInlineMenu(4, $core->page.id)}
{/if}

{if $second_level_menu}
<ul class="nav nav-tabs nav-stacked">
    {foreach from=$second_level_menu item=item}
    <li{if $item.id == $core->page.id} class="active"{/if}><a href="{$item.path}">{$item.name}</a></li>
    {/foreach}
</ul>
{/if}