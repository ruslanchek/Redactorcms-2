{if !$default}
<a href="javascript:void(0)" class="icon_action icon_delete_instance" onclick="fieldsEditor.deleteField('{if $new}{$new}{else}{$item.id}{/if}', '{$main->getText('sections', 'form_editor_delete_field_confirm')}', {if $new}0{else}{$main->item_data.id}{/if})" title="{$main->getText('sections', 'form_editor_delete_field')}"></a>
{/if}

<div class="collapsable_fieldlist_item_tools">
    <fieldset>
        {if $new}
            <input type="hidden" value="{$main->getText('sections', 'form_editor_tools_splitter')}" name="label**__**{$new}" />
        {else}
            <input type="hidden" value="{$item.label}" name="label**__**{$item.id}" />
        {/if}
        
        <input type="hidden" value="separator" name="type**__**{if $new}{$new}{else}{$item.id}{/if}" />
        <input type="hidden" value="{$item.sort}" name="sort**__**{if $new}{$new}{else}{$item.id}{/if}" rel="sort" />
    </fieldset>
</div>