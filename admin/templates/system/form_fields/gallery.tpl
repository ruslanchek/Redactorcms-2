{assign var="filelist" value=$main->getImagesList(1, $item.name, $main->dataset.params.table, $main->dataset.params.item_params.id)}

<div class="item_block">
    <label class="label" for="{$item.name}" title="{$item.help}">{$item.label}</label>
    <div class="cl"></div>

    <div class="upload_tools">
        <div id="{$item.name}"></div>
        <div class="cl"></div>

        <script type="text/javascript">
            createImagesUploader(
                '{$item.name}',
                '{$item.folder}',
                '1',
                {$main->dataset.params.item_params.id},
                '{$main->dataset.params.table}',
                true,
                '{$item.thumbs}'
            );
        </script>
    </div>

    {if $filelist}
    <div class="gallery" id="file_list_{$item.name}">
        {foreach from=$filelist item=file name=filelist}
            <div rel="{$file.id}" class="image">
                <a href="{$file.path}{$file.name}{if $file.extension}.{$file.extension}{/if}" target="_blank">
                    <img src="{$file.path}._thumb_{$file.name}{if $file.extension}.{$file.extension}{/if}"/>
                </a>

                <div class="image_tools">
                    <span class="handler_grid" title="Перетащите картирку для изменения порядка сортировки"></span>
                    <div class="it_buttons">
                        <a title="{$main->getText('form', 'form_button_edit_image')}" onclick="editImage('{$file.id}', '{$file.path}', '{$file.name}{if $file.extension}.{$file.extension}{/if}', '{$file.size|filesize}', '{$file.width} x {$file.height}', '{$file.date|date:"datetime"}');" href="javascript:void(0)" class="edit_button">{$main->getText('common', 'edit')}</a>
                        <a title="{$main->getText('form', 'form_button_delete_image')}" onclick="deleteImage('{$file.id}', 'file_list_{$item.name}', false, '{$item.thumbs}');" href="javascript:void(0)" class="del_button">{$main->getText('common', 'delete')}</a>
                    </div>
                </div>
            </div>
        {/foreach}
        <div class="cl"></div>
    </div>
    <script type="text/javascript">
        initUploadedPhoto('{$item.name}');
    </script>
    {else}
    <div class="gallery" id="file_list_{$item.name}">
        <div class="cl"></div>
    </div>
    {/if}
</div>