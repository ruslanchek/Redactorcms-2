{foreach $core->getInlineMenu(3, $pid) as $item}
    <a href="{$item.path}" {if $item.id == $core->page.id || $item.id == $core->page.pid}class="active"{/if}>{$item.name}</a>
{/foreach}