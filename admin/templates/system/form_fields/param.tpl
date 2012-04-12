<div class="item_block">
    <label class="label" for="{$item.name}" title="{$item.help}">{$item.label}</label>
    <div class="cl"></div>
    <div class="param">
        <table class="param_tab">
            <tr>
                {if $item.prefix}
                <td class="prefix">
                    <div>{$item.prefix}</div>
                </td>
                {/if}

                <td>
                    <input class="text{if $item.email} email{/if}{if $item.number} number{/if}{if $item.required} required{/if}{if $item.urlconversion} remote{/if}" type="text" id="{$item.name}" name="{$item.name}" value="{$item.value}" tabindex="{$index+1}" />
                </td>

                {if $item.suffix}
                <td class="suffix">
                    <div>{$item.suffix}</div>
                </td>
                {/if}
            </tr>
        </table>
    </div>
    <div class="cl"></div>
</div>
{if $item.unique}
<script type="text/javascript">
    $(document).ready(function(){literal}{{/literal}
        checkUniqueField('{$item.name}', '{$main->dataset.params.item_params.id}', '{$main->dataset.params.table}');
    {literal}}{/literal});
</script>
{/if}