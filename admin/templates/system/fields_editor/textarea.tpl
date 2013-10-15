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
			            <input class="textfield" type="text" value="{$main->getText('sections', 'form_editor_tools_textarea')}" name="label**__**{$new}" id="label_new_{$item.new}" />
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
    				<textarea name="default**__**{if $new}{$new}{else}{$item.id}{/if}" id="default_{if $new}{$new}{else}{$item.id}{/if}">{$item.default}</textarea>
    			</td>
    		</tr>

            {*
            <tr>
                <td class="label_col">
                    <label for="rows_{if $new}{$new}{else}{$item.id}{/if}">{$main->getText('sections', 'form_edit_item_rows')}</label>
                </td>
                <td class="content_col">
                    <select class="select" name="rows**__**{if $new}{$new}{else}{$item.id}{/if}" id="rows_{if $new}{$new}{else}{$item.id}{/if}">
                        <option value="1" {if $item.rows == 1}selected="selected"{/if}>2</option>
                        <option value="3" {if $item.rows == 3}selected="selected"{elseif !$item.rows}selected="selected"{/if}>4</option>
                        <option value="5" {if $item.rows == 5}selected="selected"{/if}>6</option>
                        <option value="7" {if $item.rows == 7}selected="selected"{/if}>8</option>
                        <option value="9" {if $item.rows == 9}selected="selected"{/if}>10</option>
                        <option value="14" {if $item.rows == 14}selected="selected"{/if}>15</option>
                        <option value="19" {if $item.rows == 19}selected="selected"{/if}>20</option>
                        <option value="19" {if $item.rows == 49}selected="selected"{/if}>50</option>
                        <option value="19" {if $item.rows == 99}selected="selected"{/if}>100</option>
                    </select>
    			</td>
    		</tr>
            *}

            <input type="hidden" value="" name="rows**__**{if $new}{$new}{else}{$item.id}{/if}" id="rows_{if $new}{$new}{else}{$item.id}{/if}">
    		
    		<tr>
    			<td class="label_col">
    				<label for="use_editor_{if $new}{$new}{else}{$item.id}{/if}">{$main->getText('sections', 'form_edit_item_use_editor')}</label>
    			</td>
    			<td class="content_col">
    				<input type="checkbox" value="1" name="use_editor**__**{if $new}{$new}{else}{$item.id}{/if}" {if $item.use_editor == '1'}checked="checked"{/if} id="use_editor_{if $new}{$new}{else}{$item.id}{/if}" />
    			</td>
    		</tr>

    	</table>

        <input type="hidden" value="textarea" name="type**__**{if $new}{$new}{else}{$item.id}{/if}" />
        <input type="hidden" value="{$item.sort}" name="sort**__**{if $new}{$new}{else}{$item.id}{/if}" rel="sort" />
        
        <div class="cl"></div>
	</fieldset>
</div>