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
			            <input class="textfield" type="text" value="{$main->getText('sections', 'form_editor_tools_textfield_url')}" name="label**__**{$new}" id="label_new_{$item.new}" />
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
    		
    		<tr>
    			<td class="label_col">
    				<label for="default_{if $new}{$new}{else}{$item.id}{/if}">{$main->getText('sections', 'form_edit_item_default')}</label>
    			</td>
    			<td class="content_col">
    				<input class="textfield" type="text" value="{$item.default}" name="default**__**{if $new}{$new}{else}{$item.id}{/if}" id="default_{if $new}{$new}{else}{$item.id}{/if}" />
    			</td>
    		</tr>

            <tr>
    			<td class="label_col">
    				<label for="mode_{if $new}{$new}{else}{$item.id}{/if}">{$main->getText('sections', 'form_edit_item_mode')}</label>
    			</td>
    			<td class="content_col">
                    <label class="radio_label" title="{$main->getText('sections', 'form_edit_item_mode_full_help')}">
                        <input value="1" type="radio" {if $item.mode == '1' || !$item.mode}checked="checked"{/if} name="mode**__**{if $new}{$new}{else}{$item.id}{/if}" />
                        {$main->getText('sections', 'form_edit_item_mode_full')}
                    </label>

                    <label class="radio_label" title="{$main->getText('sections', 'form_edit_item_mode_part_help')}">
                        <input value="2" type="radio" {if $item.mode == '2'}checked="checked"{/if} name="mode**__**{if $new}{$new}{else}{$item.id}{/if}" />
                        {$main->getText('sections', 'form_edit_item_mode_part')}
                    </label>
    			</td>
    		</tr>
    		
    		<tr>
    			<td class="label_col">
    				<label for="required_{if $new}{$new}{else}{$item.id}{/if}">{$main->getText('sections', 'form_edit_item_required')}</label>
    			</td>
    			<td class="content_col">
    				<input type="checkbox" value="1" name="required**__**{if $new}{$new}{else}{$item.id}{/if}" {if $item.required == '1'}checked="checked"{/if} id="required_{if $new}{$new}{else}{$item.id}{/if}" />
    			</td>
    		</tr>
    		
    		<tr>
    			<td class="label_col">
    				<label for="list_{if $new}{$new}{else}{$item.id}{/if}">{$main->getText('sections', 'form_edit_item_list')}</label>
    			</td>
    			<td class="content_col">
    				<input type="checkbox" value="1" name="list**__**{if $new}{$new}{else}{$item.id}{/if}" {if $item.list == '1'}checked="checked"{/if} id="list_{if $new}{$new}{else}{$item.id}{/if}" />
    			</td>
    		</tr>
    		
    	</table>
        
        <input type="hidden" value="url" name="type**__**{if $new}{$new}{else}{$item.id}{/if}" />
        <input type="hidden" value="{$item.sort}" name="sort**__**{if $new}{$new}{else}{$item.id}{/if}" rel="sort" />
    </fieldset>
</div>