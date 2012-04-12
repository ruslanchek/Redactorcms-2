{assign var="filelist" value=$main->getImagesList(0, $item.name, $main->dataset.params.table, $main->dataset.params.item_params.id)}
    <div class="item_block">
        <label class="label" for="{$item.name}" title="{$item.help}">{$item.label}</label>
        <div class="cl"></div>

        <div class="upload_tools" id="file_list_{$item.name}_uploader" {if $filelist}style="display: none;"{/if}>
            <div id="{$item.name}"></div>
            <div class="cl"></div>

            <script type="text/javascript">
                createImagesUploader(
                    '{$item.name}',
                    '{$item.folder}',
                    '0',
                    {$main->dataset.params.item_params.id},
                    '{$main->dataset.params.table}',
                    false,
                    '{$item.thumbs}'
                );
            </script>
        </div>

        {if $filelist}
        <div class="gallery" id="file_list_{$item.name}">
            {foreach from=$filelist item=file name=filelist}
                <div class="image">
                    <a href="{$file.path}{$file.name}{if $file.extension}.{$file.extension}{/if}" target="_blank">
                        <img src="{$file.path}._thumb_{$file.name}{if $file.extension}.{$file.extension}{/if}"/>
                    </a>

                    <div class="image_tools">
                        <div class="it_buttons">
                            <a title="{$main->getText('form', 'form_button_delete_image')}" onclick="deleteImage('{$file.id}', 'file_list_{$item.name}', true, '{$item.thumbs}');" href="javascript:void(0)" class="del_button">{$main->getText('common', 'delete')}</a>
                        </div>
                    </div>
                </div>

                <div class="single_image_info">
                    <h3><strong><a target="_blank" href="{$file.path}{$file.name}{if $file.extension}.{$file.extension}{/if}">{$file.name}{if $file.extension}.{$file.extension}{/if}</a></strong></h3>
                    <table cellpadding="0" cellspacing="0" border="0" class="image_info_tab">
                        <tr>
                            <th>{$main->getText('form', 'form_image_date')}</th>
                            <td>{$file.date|date:"datetime"}</td>
                        </tr>
                        <tr>
                            <th>{$main->getText('form', 'form_image_size')}</th>
                            <td>{$file.size|filesize}</td>
                        </tr>
                        <tr>
                            <th>{$main->getText('form', 'form_image_dimensions')}</th>
                            <td>{$file.width} x {$file.height}</td>
                        </tr>
                    </table>
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