{if !$default}
<a href="javascript:void(0)" class="icon_action icon_delete_instance" onclick="fieldsEditor.deleteField('{if $new}{$new}{else}{$item.id}{/if}', '{$main->getText('sections', 'form_editor_delete_field_confirm')}', {if $new}0{else}{$main->item_data.id}{/if})" title="{$main->getText('sections', 'form_editor_delete_field')}"></a>

<a href="javascript:void(0)" onclick="fieldsEditor.openCloseItemTools($(this))" class="expand_collapse expand" title="{$main->getText('sections', 'form_editor_expand_collapse')}"></a>
{/if}

<div class="collapsable_fieldlist_item_tools">
    <fieldset>
    	<table cellpadding="0" cellspacing="0" border="0" class="item_tools_table">
    		
    		<tr>
    			<td class="label_col">
    				<label for="label_{if $new}{$new}{else}{$item.id}{/if}">{$main->getText('sections', 'form_edit_item_label')}</label>
    			</td>
    			<td class="content_col">
    				{if $new}
			            <input class="textfield" type="text" value="Каталог" name="label**__**{$new}" id="label_new_{$item.new}" />
			        {else}
			            <input class="textfield" type="text" value="{$item.label}" name="label**__**{$item.id}" id="label_{$item.id}" />
			        {/if}
    			</td>
    		</tr>
    		
    		<tr>
    			<td class="label_col">
    				<label for="description_{if $new}{$new}{else}{$item.id}{/if}">{$main->getText('sections', 'form_edit_item_description')}</label>
    			</td>
    			<td class="content_col">
    				<input class="textfield" type="text" value="{$item.description}" name="description**__**{if $new}{$new}{else}{$item.id}{/if}" id="description_{if $new}{$new}{else}{$item.id}{/if}" />
    			</td>
    		</tr>
    	</table>
        
        <input type="hidden" value="catalog" name="type**__**{if $new}{$new}{else}{$item.id}{/if}" />
        <input type="hidden" value="{$item.sort}" name="sort**__**{if $new}{$new}{else}{$item.id}{/if}" rel="sort" />
    </fieldset>
</div>