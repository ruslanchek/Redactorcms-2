<div class="form">
    <form action="/admin/?option=sections&suboption=edit&id={$main->item_data.id}" method="POST" enctype="application/x-www-form-urlencoded" id="form" autocomplete="off">
        <div class="item_block">
            <label class="label" for="section_name" title="{$main->getText('sections', 'section_name_label_help')}">{$main->getText('sections', 'section_name_label_text')}</label>
            <input class="text required" type="text" id="section_name" name="section_name" value="{$main->item_data.name}" tabindex="1" />
        </div>

		<script type="text/javascript">
			var errors = new Array();

		    errors['form_error_required'] 					= "{$main->getText('sections_list', 'add_item_empty_exist')}";
		    errors['form_error_new_section_name_remote'] 	= "{$main->getText('sections_list', 'add_item_exist')}";

		    {if $main->item_data.id}
				var item_id = {$main->item_data.id};
			{/if}

		    {literal}
		    $.validator.setDefaults({
		        submitHandler: function() {
		            document.getElementById('form').submit();
		        }
		    });

		    jQuery.extend(jQuery.validator.messages, {
		        required: errors['form_error_required'],
		        remote: errors['form_error_new_section_name_remote']
		    });

			$(function(){
				$('#form').validate({
	                rules: {
	                    section_name: {
	                        remote: {
	                            url: "/admin/?option=sections&suboption=edit&ajax=true&action=checkname&id="+item_id,
	                            type: "GET",
	                            data: {
	                                name: function(){
	                                    return $('#section_name').val();
	                                }
	                            }
	                        }
	                    }
	                }
	            });
			});
			{/literal}
		</script>

        <ul class="form_editor_items" id="sortable">
            {foreach from=$sections->getEditorFieldsList($main->item_data.id) item=item key=index}

                {if $item.type == 'checkbox'}
                    <li {if $item.embed == '1'}class="item_embed"{/if}  id="field_{$item.id}" colname="col_{$item.id}" rel="checkbox">
                        <img class="form_tools_icons form_tools_icons_switch" src="/admin/img/frames/e.gif" title="{$main->getText('sections', 'form_editor_tools_checkbox')}" />
						<span class="fielditem_name">{$item.label}</span>

                        {if $item.embed == '1'}
                            {include file="system/fields_editor/checkbox.tpl" default=true}
                        {else}
                            {include file="system/fields_editor/checkbox.tpl"}
                        {/if}
                    </li>
                {/if}

                {if $item.type == 'text'}
                    <li {if $item.embed == '1'}class="item_embed"{/if}  id="field_{$item.id}" colname="col_{$item.id}" rel="text">
                        <img class="form_tools_icons form_tools_icons_textfield" src="/admin/img/frames/e.gif" title="{$main->getText('sections', 'form_editor_tools_textfield')}" />
                        <span class="fielditem_name">{$item.label}</span>

                        {if $item.embed == '1'}
                            {include file="system/fields_editor/textfield.tpl" default=true}
                        {else}
                            {include file="system/fields_editor/textfield.tpl"}
                        {/if}
                    </li>
                {/if}

                {if $item.type == 'url'}
                    <li {if $item.embed == '1'}class="item_embed"{/if}  id="field_{$item.id}" colname="col_{$item.id}" rel="url">
                        <img class="form_tools_icons form_tools_icons_url" src="/admin/img/frames/e.gif" title="{$main->getText('sections', 'form_editor_tools_url')}" />
                        <span class="fielditem_name">{$item.label}</span>

                        {if $item.embed == '1'}
                            {include file="system/fields_editor/url.tpl" default=true}
                        {else}
                            {include file="system/fields_editor/url.tpl"}
                        {/if}
                    </li>
                {/if}

                {if $item.type == 'tags'}
                    <li {if $item.embed == '1'}class="item_embed"{/if}  id="field_{$item.id}" colname="col_{$item.id}" rel="text">
                        <img class="form_tools_icons form_tools_icons_tags" src="/admin/img/frames/e.gif" title="{$main->getText('sections', 'form_tools_icons_tags')}" />
                        <span class="fielditem_name">{$item.label}</span>

                        {if $item.embed == '1'}
                            {include file="system/fields_editor/tags.tpl" default=true}
                        {else}
                            {include file="system/fields_editor/tags.tpl"}
                        {/if}
                    </li>
                {/if}

                {if $item.type == 'slider'}
                    <li {if $item.embed == '1'}class="item_embed"{/if}  id="field_{$item.id}" colname="col_{$item.id}" rel="slider">
                        <img class="form_tools_icons form_tools_icons_slider" src="/admin/img/frames/e.gif" title="{$main->getText('sections', 'form_tools_icons_slider')}" />
                        <span class="fielditem_name">{$item.label}</span>

                        {if $item.embed == '1'}
                            {include file="system/fields_editor/slider.tpl" default=true}
                        {else}
                            {include file="system/fields_editor/slider.tpl"}
                        {/if}
                    </li>
                {/if}

                {if $item.type == 'param'}
                    <li {if $item.embed == '1'}class="item_embed"{/if}  id="field_{$item.id}" colname="col_{$item.id}" rel="param">
                    	<img class="form_tools_icons form_tools_icons_param" src="/admin/img/frames/e.gif" title="{$main->getText('sections', 'form_editor_tools_param')}" />
						<span class="fielditem_name">{$item.label}</span>

                    	{if $item.embed == '1'}
                            {include file="system/fields_editor/param.tpl" default=true}
                        {else}
                            {include file="system/fields_editor/param.tpl"}
                        {/if}
                    </li>
                {/if}

                {if $item.type == 'catalog'}
                    <li {if $item.embed == '1'}class="item_embed"{/if}  id="field_{$item.id}" colname="col_{$item.id}" rel="catalog">
                        <img class="form_tools_icons form_tools_icons_catalog" src="/admin/img/frames/e.gif" title="Каталог" />
                        <span class="fielditem_name">{$item.label}</span>

                        {if $item.embed == '1'}
                            {include file="system/fields_editor/catalog.tpl" default=true}
                        {else}
                            {include file="system/fields_editor/catalog.tpl"}
                        {/if}
                    </li>
                {/if}

                {if $item.type == 'textarea'}
                    <li {if $item.embed == '1'}class="item_embed"{/if}  id="field_{$item.id}" colname="col_{$item.id}" rel="textarea">
                        <img class="form_tools_icons form_tools_icons_text_area" src="/admin/img/frames/e.gif" title="{$main->getText('sections', 'form_editor_tools_textarea')}" />
						<span class="fielditem_name">{$item.label}</span>

                        {if $item.embed == '1'}
                            {include file="system/fields_editor/textarea.tpl" default=true}
                        {else}
                            {include file="system/fields_editor/textarea.tpl"}
                        {/if}
                    </li>
                {/if}

                {if $item.type == 'select'}
                    <li {if $item.embed == '1'}class="item_embed"{/if}  id="field_{$item.id}" colname="col_{$item.id}" rel="select">
                        <img class="form_tools_icons form_tools_icons_select" src="/admin/img/frames/e.gif" title="{$main->getText('sections', 'form_editor_tools_select')}" />
						<span class="fielditem_name">{$item.label}</span>

                        {if $item.embed == '1'}
                            {include file="system/fields_editor/select.tpl" default=true}
                        {else}
                            {include file="system/fields_editor/select.tpl"}
                        {/if}
                    </li>
                {/if}

                {if $item.type == 'multiselect'}
                    <li {if $item.embed == '1'}class="item_embed"{/if}  id="field_{$item.id}" colname="col_{$item.id}" rel="multiselect">
                        <img class="form_tools_icons form_tools_icons_multiselect" src="/admin/img/frames/e.gif" title="{$main->getText('sections', 'form_editor_tools_multiselect')}" />
						<span class="fielditem_name">{$item.label}</span>

                        {if $item.embed == '1'}
                            {include file="system/fields_editor/multiselect.tpl" default=true}
                        {else}
                            {include file="system/fields_editor/multiselect.tpl"}
                        {/if}
                    </li>
                {/if}

				{if $item.type == 'color_picker'}
                    <li {if $item.embed == '1'}class="item_embed"{/if}  id="field_{$item.id}" colname="col_{$item.id}" rel="color_picker">
                        <img class="form_tools_icons form_tools_icons_color_picker" src="/admin/img/frames/e.gif" title="{$main->getText('sections', 'form_editor_tools_color_picker')}" />
						<span class="fielditem_name">{$item.label}</span>

                        {if $item.embed == '1'}
                            {include file="system/fields_editor/color_picker.tpl" default=true}
                        {else}
                            {include file="system/fields_editor/color_picker.tpl"}
                        {/if}
                    </li>
                {/if}

				{if $item.type == 'calendar'}
                    <li {if $item.embed == '1'}class="item_embed"{/if}  id="field_{$item.id}" colname="col_{$item.id}" rel="calendar">
                        <img class="form_tools_icons form_tools_icons_calendar" src="/admin/img/frames/e.gif" title="{$main->getText('sections', 'form_editor_tools_calendar')}" />
						<span class="fielditem_name">{$item.label}</span>

                        {if $item.embed == '1'}
                            {include file="system/fields_editor/calendar.tpl" default=true}
                        {else}
                            {include file="system/fields_editor/calendar.tpl"}
                        {/if}
                    </li>
                {/if}

				{if $item.type == 'file'}
                    <li {if $item.embed == '1'}class="item_embed"{/if}  id="field_{$item.id}" colname="col_{$item.id}" rel="file">
                    	<img class="form_tools_icons form_tools_icons_file" src="/admin/img/frames/e.gif" title="{$main->getText('sections', 'form_editor_tools_file')}" />
						<span class="fielditem_name">{$item.label}</span>

                    	{if $item.embed == '1'}
                            {include file="system/fields_editor/file.tpl" default=true}
                        {else}
                            {include file="system/fields_editor/file.tpl"}
                        {/if}
                    </li>
                {/if}

				{if $item.type == 'multifile'}
                    <li {if $item.embed == '1'}class="item_embed"{/if}  id="field_{$item.id}" colname="col_{$item.id}" rel="multifile">
                    	<img class="form_tools_icons form_tools_icons_multifile" src="/admin/img/frames/e.gif" title="{$main->getText('sections', 'form_editor_tools_multifile')}" />
						<span class="fielditem_name">{$item.label}</span>

                    	{if $item.embed == '1'}
                            {include file="system/fields_editor/file.tpl" default=true}
                        {else}
                            {include file="system/fields_editor/file.tpl"}
                        {/if}
                    </li>
                {/if}

                {if $item.type == 'image'}
                    <li {if $item.embed == '1'}class="item_embed"{/if}  id="field_{$item.id}" colname="col_{$item.id}" rel="image">
                    	<img class="form_tools_icons form_tools_icons_image" src="/admin/img/frames/e.gif" title="{$main->getText('sections', 'form_editor_tools_image')}" />
						<span class="fielditem_name">{$item.label}</span>

                    	{if $item.embed == '1'}
                            {include file="system/fields_editor/image.tpl" default=true}
                        {else}
                            {include file="system/fields_editor/image.tpl"}
                        {/if}
                    </li>
                {/if}

				{if $item.type == 'gallery'}
                    <li {if $item.embed == '1'}class="item_embed"{/if}  id="field_{$item.id}" colname="col_{$item.id}" rel="gallery">
                    	<img class="form_tools_icons form_tools_icons_gallery" src="/admin/img/frames/e.gif" title="{$main->getText('sections', 'form_editor_tools_gallery')}" />
						<span class="fielditem_name">{$item.label}</span>

                    	{if $item.embed == '1'}
                            {include file="system/fields_editor/gallery.tpl" default=true}
                        {else}
                            {include file="system/fields_editor/gallery.tpl"}
                        {/if}
                    </li>
                {/if}

                {if $item.type == 'map'}
                    <li {if $item.embed == '1'}class="item_embed"{/if}  id="field_{$item.id}" colname="col_{$item.id}" rel="map">
                    	<img class="form_tools_icons form_tools_icons_map" src="/admin/img/frames/e.gif" title="{$main->getText('sections', 'form_editor_tools_map')}" />
						<span class="fielditem_name">{$item.label}</span>

                    	{if $item.embed == '1'}
                            {include file="system/fields_editor/map.tpl" default=true}
                        {else}
                            {include file="system/fields_editor/map.tpl"}
                        {/if}
                    </li>
                {/if}

                {if $item.type == 'separator'}
                    <li {if $item.embed == '1'}class="item_embed"{/if}  id="field_{$item.id}" colname="col_{$item.id}" rel="separator">
                        <img class="form_tools_icons form_tools_icons_splitter" src="/admin/img/frames/e.gif" title="{$main->getText('sections', 'form_editor_tools_splitter')}" />
						<span class="fielditem_name">{$item.label}</span>

                        {if $item.embed == '1'}
                            {include file="system/fields_editor/splitter.tpl" default=true}
                        {else}
                            {include file="system/fields_editor/splitter.tpl"}
                        {/if}
                    </li>
                {/if}
            {/foreach}
        </ul>

        <div class="buttons">
            <input class="button" type="submit" title="{$main->getText('form', 'form_button_append_title')}" name="ok" value="{$main->getText('form', 'form_button_append_text')}" />
            <input class="button" type="submit" title="{$main->getText('form', 'form_button_save_title')}" name="save" value="{$main->getText('form', 'form_button_save_text')}" />
        </div>
    </form>
</div>