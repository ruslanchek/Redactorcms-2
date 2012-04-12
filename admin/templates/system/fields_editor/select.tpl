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
			            <input class="textfield" type="text" value="{$main->getText('sections', 'form_editor_tools_select')}" name="label**__**{$new}" id="label_new_{$item.new}" />
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
    				<label>{$main->getText('sections', 'form_edit_item_options_source')}</label>
    			</td>
    			<td class="content_col" id="item_{if $new}{$new}{else}{$item.id}{/if}">
    				<label class="radio_label">
    					<input class="options_source" value="0" {if $item.options_source == '0' || $new}checked="checked"{/if} name="options_source**__**{if $new}{$new}{else}{$item.id}{/if}" type="radio" />
    					{$main->getText('sections', 'form_edit_item_options_source_custom')}
    				</label>

    				<label class="radio_label">
    					<input class="options_source" value="1" {if $item.options_source == '1'}checked="checked"{/if} name="options_source**__**{if $new}{$new}{else}{$item.id}{/if}"  type="radio" />
    					{$main->getText('sections', 'form_edit_item_options_source_table')}
    				</label>

    				{*<label>
    					<input class="options_source" value="2" {if $item.options_source == '2'}checked="checked"{/if} name="options_source**__**{if $new}{$new}{else}{$item.id}{/if}"  type="radio" />
    					{$main->getText('sections', 'form_edit_item_options_source_system')}
    				</label>*}
    			</td>
    		</tr>

    		<tr id="custom_{if $new}{$new}{else}{$item.id}{/if}" style="display: none;">
    			<td class="label_col">
    				<label for="options_custom_{if $new}{$new}{else}{$item.id}{/if}">{$main->getText('sections', 'form_edit_item_options_source_custo_sel')}</label>
    			</td>
    			<td class="content_col">
    				<input type="hidden" value="{$item.options_custom}" name="options_custom**__**{if $new}{$new}{else}{$item.id}{/if}" id="options_custom_{if $new}{$new}{else}{$item.id}{/if}" />
    				<div id="options_custom_parsed_{if $new}{$new}{else}{$item.id}{/if}"></div>
    			</td>
    		</tr>

    		<tr id="table_{if $new}{$new}{else}{$item.id}{/if}" style="display: none;">
    			<td class="label_col">
    				<label for="options_table_{if $new}{$new}{else}{$item.id}{/if}">{$main->getText('sections', 'form_edit_item_options_source_table_sel')}</label>
    			</td>
    			<td class="content_col">
    				<select class="select" name="options_table**__**{if $new}{$new}{else}{$item.id}{/if}" id="options_table_{if $new}{$new}{else}{$item.id}{/if}">
                        {foreach from=$sections->getList() item=sections_item}
							<option value="section_{$sections_item.id}" {if $item.options_table|substring:8 == $sections_item.id}selected="selected"{/if}>{$sections_item.id}. {$sections_item.name}{if $main->item_data.id == $sections_item.id} ({$main->getText('sections', 'form_edit_item_options_source_table_cs')}){/if}</option>
						{/foreach}
					</select>
    			</td>
    		</tr>

    		<tr id="system_{if $new}{$new}{else}{$item.id}{/if}" style="display: none;">
    			<td class="label_col">
    				<label for="options_table_{if $new}{$new}{else}{$item.id}{/if}">{$main->getText('sections', 'form_edit_item_options_source_syste_sel')}</label>
    			</td>
    			<td class="content_col">

    			</td>
    		</tr>

    		<tr id="defaults_{if $new}{$new}{else}{$item.id}{/if}" style="display: none;">
    			<td class="label_col">
    				<label for="default_{if $new}{$new}{else}{$item.id}{/if}">{$main->getText('sections', 'form_edit_item_default')}</label>
    			</td>
    			<td class="content_col">
    				<select class="select" name="default**__**{if $new}{$new}{else}{$item.id}{/if}" id="default_{if $new}{$new}{else}{$item.id}{/if}">
						<option class="default_null_selection" value="0" {if $item.default == 0}selected="selected"{/if}>{$main->getText('form', 'zero_selection')}</option>
					</select>
    			</td>
    		</tr>

    		<tr>
    			<td class="label_col">
    				<label for="list_{if $new}{$new}{else}{$item.id}{/if}">{$main->getText('sections', 'form_edit_item_list')}</label>
    			</td>
    			<td class="content_col">
    				<input type="checkbox" value="1" {if $item.list == '1'}checked="checked"{/if} name="list**__**{if $new}{$new}{else}{$item.id}{/if}" />
    			</td>
    		</tr>

    	</table>

        <input type="hidden" value="select" name="type**__**{if $new}{$new}{else}{$item.id}{/if}" />
        <input type="hidden" value="{$item.sort}" name="sort**__**{if $new}{$new}{else}{$item.id}{/if}" rel="sort" />
    </fieldset>
</div>

<script type="text/javascript">
	fieldsEditor.selectItemInit('select_{if $new}{$new}{else}{$item.id}{/if}', '{$item.options_source}', '{$item.default}', 'select');
</script>