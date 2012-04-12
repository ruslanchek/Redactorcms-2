<div class="item_block">
    <label class="label" for="{$item.name}" title="{$item.help}">{$item.label}</label>
    <input class="text{if $item.email} email{/if}{if $item.number} number{/if}{if $item.required} required{/if}" type="text" id="{$item.name}" name="{$item.name}" value="{$item.value|escape}" tabindex="{$index+1}" />
    <script type="text/javascript">initTagsInput('{$item.name}')</script>
</div>