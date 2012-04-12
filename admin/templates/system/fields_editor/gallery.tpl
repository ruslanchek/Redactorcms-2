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
			            <input class="textfield" type="text" value="{$main->getText('sections', 'form_editor_tools_gallery')}" name="label**__**{$new}" id="label_new_{$item.new}" />
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
    				<label for="folder_{if $new}{$new}{else}{$item.id}{/if}">{$main->getText('sections', 'form_edit_item_folder_images')}</label>
    			</td>
    			<td class="content_col">
    				<input class="textfield" type="text" value="{$item.folder}" name="folder**__**{if $new}{$new}{else}{$item.id}{/if}" id="folder_{if $new}{$new}{else}{$item.id}{/if}" />
    			</td>
    		</tr>
    		
    		<tr>
    			<td class="label_col">
    				<label for="adder_w_{if $new}{$new}{else}{$item.id}{/if}">{$main->getText('sections', 'form_edit_item_thumbs')}</label>
    			</td>
    			<td class="content_col">
    				<div class="images_copies_table" id="images_copies_table_{if $new}{$new}{else}{$item.id}{/if}">
    					<table cellpadding="0" cellspacing="0" border="0">
    						<tr>
    							<th>{$main->getText('sections', 'form_edit_item_res_width')}</th>
    							<th>{$main->getText('sections', 'form_edit_item_res_height')}</th>
    							<th>{$main->getText('sections', 'form_edit_item_filename_suffix')}</th>
    							<th></th>
    						</tr>
							<tr class="adder">
								<td><input id="adder_w_{if $new}{$new}{else}{$item.id}{/if}" autocomplete="off" class="adder_w" type="text"></td>
								<td><input autocomplete="off" class="adder_h" type="text"></td>
								<td><input autocomplete="off" class="adder_p" type="text"></td>
                                <td width="1%">
                                    <input autocomplete="off" class="adder_d" type="hidden" value="1">
                                    <a href="javascript:void(0)" onclick="i_images.changeDimensionControl('new', '{if $new}{$new}{else}{$item.id}{/if}')" class="icon_action icon_dimensions_xy"></a>
                                </td>
								<td width="1%"><a href="javascript:void(0)" onclick="i_images.addItem('{if $new}{$new}{else}{$item.id}{/if}')" class="icon_action icon_add_instance"></a></td>
							</tr>
    					</table>    				
    				</div>
    				
    				<input type="hidden" autocomplete="off" value="{$item.thumbs}" name="thumbs**__**{if $new}{$new}{else}{$item.id}{/if}" id="thumbs_{if $new}{$new}{else}{$item.id}{/if}" />
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
        
        <input type="hidden" value="gallery" name="type**__**{if $new}{$new}{else}{$item.id}{/if}" />
        <input type="hidden" value="{$item.sort}" name="sort**__**{if $new}{$new}{else}{$item.id}{/if}" rel="sort" />
    </fieldset>
</div>

<script type="text/javascript">
	i_images.getItemsFromString('{if $new}{$new}{else}{$item.id}{/if}');
</script>