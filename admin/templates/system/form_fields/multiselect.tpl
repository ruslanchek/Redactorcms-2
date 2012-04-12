<div class="item_block">
    <label class="label" for="{$item.name}" title="{$item.help}">{$item.label}</label>
    <div class="cl"></div>

    <select id="{$item.name}" tabindex="{$index+1}" multiple="multiple" class="multiselect" name="{$item.name}[]">
        <option value="0" {if $item.value == 0 || !$item.value}selected="selected"{/if}>{$main->getText('form', 'zero_selection')}</option>
        {foreach from=$item.options item=options}
            <option value="{$options.key}" {if $main->compareMultiSelectValues($item.value, $options.key)}selected="selected"{/if}>{$options.key}. {$options.value}</option>
        {/foreach}
    </select>
</div>