<div class="item_block">
    <label class="label" for="{$item.name}" title="{$item.help}">{$item.label}</label>
    <input class="text{if $item.email} email{/if}{if $item.number} number{/if}{if $item.required} required{/if}" type="text" id="{$item.name}" name="{$item.name}" value="{$item.value|escape}" tabindex="{$index+1}" />
</div>

{if $item.unique}
<script type="text/javascript">
    $(document).ready(function(){literal}{{/literal}
        checkUniqueField('{$item.name}', '{$main->dataset.params.item_params.id}', '{$main->dataset.params.table}');
    {literal}}{/literal});
</script>
{/if}