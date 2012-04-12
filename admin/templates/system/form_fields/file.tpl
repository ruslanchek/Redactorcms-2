{assign var="filelist" value=$main->getFilesList(0, $item.name, $main->dataset.params.table, $main->dataset.params.item_params.id)}

<div class="item_block">
     <label class="label" for="{$item.name}" title="{$item.help}">
        {$item.label}
        <em>
            {foreach from=$item.extensions item=extension}
                {if $extension@first}({/if}{$extension.value}{if !$extension@last}, {else}){/if}
            {/foreach}
        </em>
    </label>

    <div class="cl"></div>

    <div class="upload_tools" {if $filelist}style="display: none;"{/if}>
        <div id="{$item.name}"></div>
        <div class="cl"></div>

        <script type="text/javascript">
            createUploader(
                '{$item.name}',
                '{$item.folder}',
                '0',
                {$main->dataset.params.item_params.id},
                '{$main->dataset.params.table}',
                [{foreach from=$item.extensions item=extension}'{$extension.value}'{if !$extension@last},{/if}{/foreach}],
                false
            );
        </script>
    </div>

    {if $filelist}
    <div class="form_items_list_container white_holder related_list" id="file_list_{$item.name}">
        <table cellpadding="0" cellspacing="0" border="0">
            <tr>
                <th width="1%"></th>
                <th width="60%">{$main->getText('form', 'files_header_file')}</th>
                <th width="37%">{$main->getText('form', 'files_header_date')}</th>
                <th width="1%">{$main->getText('form', 'files_header_size')}</th>
                <th width="1%"></th>
            </tr>
            {foreach from=$filelist item=file name=filelist}
            <tr>
                <td width="1%">
                    <a class="icon_action icon_file_instance" href="{$file.path}{$file.name}{if $file.extension}.{$file.extension}{/if}" target="_blank"></a>
                </td>
                <td>
                    <a href="{$file.path}{$file.name}{if $file.extension}.{$file.extension}{/if}" target="_blank">{$file.name}</a>.{$file.extension}
                </td>
                <td width="1%" class="nowrap">
                    {$file.date|date:"datetime"}
                </td>
                <td width="1%" class="nowrap">
                    {$file.size|filesize}
                </td>
                <td width="1%">
                    <a title="{$main->getText('form', 'form_button_delete_file')}" onclick="deleteFile('{$file.id}', $(this), 'file_list_{$item.name}');" href="javascript:void(0)" class="icon_action icon_delete_instance"></a>
                </td>
            </tr>
            {/foreach}
        </table>
    </div>
    <script type="text/javascript">
        initUploadedTable('file_list_{$item.name}');
    </script>
    {/if}
</div>