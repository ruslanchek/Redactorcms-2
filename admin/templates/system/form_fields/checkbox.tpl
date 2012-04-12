<div class="cb_item_block" title="{$item.help}">
    <div class="cb_left">
        <label for="{$item.name}">{$item.label}</label>
    </div>
    <div class="cb_right">
        <input class="checkbox iphone_checkbox" type="checkbox" id="{$item.name}" name="{$item.name}" value="1" {if $item.value == "1"}checked="checked"{/if} tabindex="{$index+1}" />
    </div>
    <div class="clear"></div>
</div>