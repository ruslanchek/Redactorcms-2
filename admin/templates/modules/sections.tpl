<h1>{$main->h1}</h1>

{if $main->module_mode eq 'list'}
    {include file="modules/sections.list.tpl"}
{/if}

{if $main->module_mode eq 'edit'}
    <script type="text/javascript">
        var field_editor_messages = new Array();
        field_editor_messages['edit_title_prefix'] = '{$main->getText('sections', 'edit_title_prefix')}';
        field_editor_messages['edit_accept_settings'] = '{$main->getText('sections', 'edit_accept_settings')}';

        var fieldsEditor = new FieldsEditor(field_editor_messages);
    </script>

    <div class="left_col">
    {include file="modules/sections.edit_fields.tpl"}
    </div>

    <div class="right_col">
    {include file="modules/sections.edit_fields.tools.tpl"}
    </div>
    
    <div class="cl"></div>

    <script type="text/javascript">
        fieldsEditor.init();
    </script>
{/if}

{if $main->module_mode eq 'content'}
    {include file="modules/sections.content.tpl"}
{/if}

{if $main->module_mode eq 'edit_content'}
    <div class="left_col">
        {include file="system/form.tpl"}
    </div>

    <div class="right_col">
    {include file="modules/sections.edit_content.tools.tpl"}
    </div>
    
    <div class="cl"></div>
{/if}