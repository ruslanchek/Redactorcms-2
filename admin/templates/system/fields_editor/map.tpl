{if !$default}
<a href="javascript:void(0)" class="icon_action icon_delete_instance" onclick="fieldsEditor.deleteField('{if $new}{$new}{else}{$item.id}{/if}', '{$main->getText('sections', 'form_editor_delete_field_confirm')}', {if $new}0{else}{$main->item_data.id}{/if})" title="{$main->getText('sections', 'form_editor_delete_field')}"></a>

<a href="javascript:void(0)" onclick="fieldsEditor.openCloseItemTools($(this))" class="expand_collapse expand" title="{$main->getText('sections', 'form_editor_expand_collapse')}"></a>
{/if}

<div class="collapsable_fieldlist_item_tools">
    <input class="map_relation" type="hidden" rel="{if $new}{$new}{else}{$item.id}{/if}">
    <input type="hidden" value="{$item.default}" name="default**__**{if $new}{$new}{else}{$item.id}{/if}" id="default_{if $new}{$new}{else}{$item.id}{/if}" />
    <fieldset>
    	<table cellpadding="0" cellspacing="0" border="0" class="item_tools_table">
    		
    		<tr>
    			<td class="label_col">
    				<label for="label_{if $new}{$new}{else}{$item.id}{/if}">{$main->getText('sections', 'form_edit_item_label')}</label>
    			</td>
    			<td class="content_col">
    				{if $new}
			            <input class="textfield" type="text" value="{$main->getText('sections', 'form_editor_tools_map')}" name="label**__**{$new}" id="label_new_{$item.new}" />
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
    				<label for="default_{if $new}{$new}{else}{$item.id}{/if}">{$main->getText('sections', 'form_edit_item_map_defaults')}</label>
    			</td>
    			<td class="content_col">
                    <div class="white_holder map_holder">
                        <div class="map" id="map_{if $new}{$new}{else}{$item.id}{/if}"></div>
                        <div class="map_tools">
                        <label>
                            {$main->getText('gmaps', 'latitude')}
                            <input autocomplete="off" type="text" id="map_lat_{if $new}{$new}{else}{$item.id}{/if}">
                        </label>

                        <label>
                            {$main->getText('gmaps', 'longitude')}
                            <input autocomplete="off" type="text" id="map_lng_{if $new}{$new}{else}{$item.id}{/if}">
                        </label>

                        <label>
                            {$main->getText('gmaps', 'zoom')}
                            <input autocomplete="off" type="text" id="map_zoom_{if $new}{$new}{else}{$item.id}{/if}">
                        </label>

                        <input class="button" type="button" value="{$main->getText('common', 'refresh')}" onclick="gmaps.refreshData('{$item.name}')">
                    </div>
                    </div>
                    <script type="text/javascript">
                        gmaps.init('{if $new}{$new}{else}{$item.id}{/if}');
                    </script>
    			</td>
    		</tr>    		
    	</table>

        <input type="hidden" value="map" name="type**__**{if $new}{$new}{else}{$item.id}{/if}" />
        <input type="hidden" value="{$item.sort}" name="sort**__**{if $new}{$new}{else}{$item.id}{/if}" rel="sort" />
    </fieldset>
</div>