<div class="item_block">
    <label class="label" for="{$item.name}" title="{$item.help}">{$item.label}</label>
    <div class="cl"></div>

    <input class="text password{if $item.required} required{/if}" type="password" id="{$item.name}" name="{$item.name}" value="{$item.value}" autocomplete="off" tabindex="{$index+1}" />
</div>