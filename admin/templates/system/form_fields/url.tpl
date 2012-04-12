<div class="item_block">
    <label class="label" for="{$item.name}" title="{$item.help}">{$item.label}</label>
    <input class="text{if $item.required} required{/if}{if $item.mode == 1} url{elseif $item.mode == 2} urlpart{/if}" type="text" id="{$item.name}" name="{$item.name}" value="{$item.value|escape}" tabindex="{$index+1}" />
</div>

{if $item.mode == 2}
<script type="text/javascript">
    $(document).ready(function(){literal}{{/literal}
        checkUniqueField('{$item.name}', '{$main->dataset.params.item_params.id}', '{$main->dataset.params.table}');
    {literal}}{/literal});
</script>
{/if}