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
			            <input class="textfield" type="text" value="{$main->getText('sections', 'form_editor_tools_textfield')}" name="label**__**{$new}" id="label_new_{$item.new}" />
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
    				<label for="type_selector_{if $new}{$new}{else}{$item.id}{/if}">{$main->getText('sections', 'form_edit_item_type')}</label>
    			</td>
    			<td class="content_col">
					<select class="select" id="type_selector_{if $new}{$new}{else}{$item.id}{/if}" onchange="fieldsEditor.textfieldTypeSelect('{if $new}{$new}{else}{$item.id}{/if}', this.value);">
						<option class="default_null_selection" value="1" {if $item.number != '1' && $item.email != '1'}selected="selected"{/if}>{$main->getText('sections', 'form_edit_item_text')}</option>
						<option value="2" {if $item.number == '1'}selected="selected"{/if}>{$main->getText('sections', 'form_edit_item_number')}</option>
						<option value="3" {if $item.email == '1'}selected="selected"{/if}>{$main->getText('sections', 'form_edit_item_email')}</option>
					</select>

					<input type="hidden" name="email**__**{if $new}{$new}{else}{$item.id}{/if}" value="{$item.email}" id="email_hidden_{if $new}{$new}{else}{$item.id}{/if}" />
					<input type="hidden" name="number**__**{if $new}{$new}{else}{$item.id}{/if}" value="{$item.number}" id="number_hidden_{if $new}{$new}{else}{$item.id}{/if}" />

					{*<input type="checkbox" value="1" name="email**__**{if $new}{$new}{else}{$item.id}{/if}" {if $item.email == '1'}checked="checked"{/if} id="email_{if $new}{$new}{else}{$item.id}{/if}" />*}
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
    				<label for="unique_{if $new}{$new}{else}{$item.id}{/if}">{$main->getText('sections', 'form_edit_item_unique')}</label>
    			</td>
    			<td class="content_col">
    				<input type="checkbox" value="1" name="unique**__**{if $new}{$new}{else}{$item.id}{/if}" {if $item.unique == '1'}checked="checked"{/if} id="unique_{if $new}{$new}{else}{$item.id}{/if}" />
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
        
        <input type="hidden" value="text" name="type**__**{if $new}{$new}{else}{$item.id}{/if}" />
        <input type="hidden" value="{$item.sort}" name="sort**__**{if $new}{$new}{else}{$item.id}{/if}" rel="sort" />
    </fieldset>
</div>