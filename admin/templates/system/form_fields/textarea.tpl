<div class="item_block">
    <label class="label" for="{$item.name}" title="{$item.help}">{$item.label}</label>

    {if $item.use_editor}
        <a href="javascript:void(0)" class="typo" rel="{$item.name}">{$main->getText('sections', 'form_edit_item_typography')}</a>
    {/if}
    <div class="cl"></div>

    <textarea class="textarea {if $item.required} required{/if}" id="{$item.name}" name="{$item.name}" rows="{$item.rows}" tabindex="{$index+1}">{$item.value}</textarea>
    {if $item.use_editor}
        <script type="text/javascript">initEditor($('#{$item.name}'), '{$main->locale}', '{$item.name}')</script>
    {/if}
</div>