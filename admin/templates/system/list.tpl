{assign var='cols_count' value=6}

<div class="list_table">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="{$main->module_name}_table" rel="{$main->item_data.id}">
        {if $main->content_list}
        <thead>
            <tr>
                <th width="1%" align="center">
                    <input type="checkbox" class="checkbox" id="list_checkbox_master" autocomplete="off" />
                </th>

                <th width="1%" align="center">
                    <a href="{$main->getListSortingLink('id', true)}">{$main->getText('list', 'colname_id')}</a>
                    {$main->getListSortingArrow('id')}
                </th>

                <th align="left">
                    <a href="{$main->getListSortingLink('name', true)}">{$main->getText('list', 'colname_name')}</a>
                    {$main->getListSortingArrow('name')}
                </th>

                {foreach from=$main->list_items item=col}
                    {$cols_count = $cols_count+1}
                    <th align="left">
                        <a href="{$main->getListSortingLink($col.col_name)}">{$col.name}</a>
                        {$main->getListSortingArrow($col.col_name)}
                    </th>
                {/foreach}

                {if !$main->vars.list_no_sortable}
                <th width="1%" align="center">
                    <a href="{$main->getListSortingLink('sort', true)}">{$main->getText('list', 'colname_sort')}</a>
                    {$main->getListSortingArrow('sort')}
                </th>
                {/if}

                <th width="1%"></th>

                {if !$main->vars.list_no_publish}
                <th width="1%" align="left">
                    <span class="sort_arr_with_icon">
                        {$main->getListSortingArrow('publish')}
                    </span>
                    <a class="icon_action icon_hide_instance" title="{$main->getText('list', 'show_item_help')}/{$main->getText('list', 'hide_item_help')}" href="{$main->getListSortingLink('publish', true)}"></a>
                </th>
                {/if}

                <th width="1%"></th>
            </tr>
        </thead>
        {/if}

        {*if $main->content_list}
            <tr>
                <td class="" width="1%" align="center">
                    <input type="checkbox" class="checkbox" id="list_checkbox_master" autocomplete="off" />
                </td>

                <td width="1%" align="center">
                    <input type="text" class="search_list_field" id="search_id" />
                </td>

                <td align="left">
                    <input type="text" class="search_list_field" id="search_name" />
                </td>

                {foreach from=$main->list_items item=col}
                    {$cols_count = $cols_count+1}
                    <td align="left">
                        <input type="text" class="search_list_field" id="search_{$col.col_name}" />
                    </td>
                {/foreach}

                {if !$main->vars.list_no_sortable}
                <td width="1%" align="center">
                    <a href="{$main->getListSortingLink('sort', true)}">{$main->getText('list', 'colname_sort')}</a>
                    {$main->getListSortingArrow('sort')}
                </td>
                {/if}

                {if !$main->vars.list_no_publish}
                <td width="1%" align="left">
                    <span class="sort_arr_with_icon">
                        {$main->getListSortingArrow('publish')}
                    </span>
                    <a class="icon_action icon_hide_instance" title="{$main->getText('list', 'show_item_help')}/{$main->getText('list', 'hide_item_help')}" href="{$main->getListSortingLink('publish', true)}"></a>
                </td>
                {/if}

                <td width="1%"></td>
            </tr>
        {/if*}

        {if $main->content_list}
        <tbody>
            {foreach from=$main->content_list item=item key=i}
                <tr{if $item.publish == '0'} class="unactive"{/if} iid="{$item.id}">
                    <td align="center">
                        <input publish="{if $item.publish == '1'}1{else}0{/if}" iid="{$item.id}" type="checkbox" name="item[{$item.id}]" class="checkbox" autocomplete="off" />
                    </td>
                    <td align="center">{$item.id}</td>
                    <td align="left">
                        <a title="{$main->getText('list', 'edit_item_help')}" href="{$main->content_list_edit_link}{$item.id}{if $smarty.get.page}&page={$smarty.get.page}{/if}">{$item.name}</a>
                    </td>

                    {foreach from=$main->list_items item=col}

                    <td>
                        {if $col.type == 'select' && $col.options_source == '1'}
                            {if $item[$col.col_name]}
                                {$main->getLisOptionNameById($item[$col.col_name], $col.options_table)}
                            {else}
                                {$main->getText('list', 'zero_selection')}
                            {/if}

                        {elseif $col.type == 'select' && $col.options_source == '0'}
                            {if $item[$col.col_name]}
                                {$main->getLisOptionNameByArrayGiven($item[$col.col_name], $col.options_custom)}
                            {else}
                                {$main->getText('list', 'zero_selection')}
                            {/if}

                        {elseif $col.type == 'multiselect' && $col.options_source == '0'}
                            {if $item[$col.col_name]}
                                {$main->getLisOptionsNamesByArrayGiven($item[$col.col_name], $col.options_custom)}
                            {else}
                                {$main->getText('list', 'zero_selection')}
                            {/if}

                        {elseif $col.type == 'select'}
                            {$main->getText('list', 'zero_selection')}

                        {elseif $col.type == 'color_picker'}
                            <span class="color_list_item" style="background-color: #{$item[$col.col_name]};" title="#{$item[$col.col_name]}"></span>

                        {elseif $col.type == 'calendar'}
                            <span class="nowrap">{$item[$col.col_name]|date:'datetime'}</span>

                        {elseif $col.type == 'param'}
                            {if $item[$col.col_name]}
                                {if $col.prefix}<span class="prefix">{$col.prefix}</span>&nbsp;{/if}<span class="param">{$item[$col.col_name]}</span>{if $col.suffix}&nbsp;<span class="suffix">{$col.suffix}</span>{/if}
                            {else}
                                {$main->getText('list', 'zero_selection')}
                            {/if}

                        {elseif $col.type == 'multifile'}
                            <span class="nowrap">
                                {if $item[$col.col_name] > 0}
                                    {$item[$col.col_name]}
                                    {$item[$col.col_name]|pluralform:array(
                                        $main->getText('list', 'files_plural_1'),
                                        $main->getText('list', 'files_plural_3'),
                                        $main->getText('list', 'files_plural_5')
                                    )}
                                {else}
                                    {$main->getText('list', 'zero_selection')}
                                {/if}
                            </span>

                        {elseif $col.type == 'gallery'}
                            <span class="nowrap">
                                {if $item[$col.col_name] > 0}
                                    {$item[$col.col_name]}
                                    {$item[$col.col_name]|pluralform:array(
                                        $main->getText('list', 'images_plural_1'),
                                        $main->getText('list', 'images_plural_3'),
                                        $main->getText('list', 'images_plural_5')
                                    )}
                                {else}
                                    {$main->getText('list', 'zero_selection')}
                                {/if}
                            </span>

                        {elseif $col.type == 'file'}
                            {if $item[$col.col_name] > 0}
                                {assign var="file" value=$sections->getRowFile($item.id, $main->dataset.params.table, $col.col_name)}
                                <a href="{$file.path}{$file.name}.{$file.extension}" target="_blank">{$file.name}.{$file.extension}</a>
                            {else}
                                {$main->getText('list', 'zero_selection')}
                            {/if}
                            
                        {elseif $col.type == 'image'}
                            {if $item[$col.col_name] > 0}
                                {assign var="file" value=$main->getRowImage($item.id, $main->content_list_table, $col.col_name)}

                                <a class="list_image_holder" href="{$file.path}{$file.name}.{$file.extension}" target="_blank"><img src="{$file.path}._thumb_list_{$file.name}.{$file.extension}" /></a>
                            {else}
                                {$main->getText('list', 'zero_selection')}
                            {/if}

                        {elseif $col.type == 'checkbox'}
                            {if $item[$col.col_name] == 1}
                                <a mode="1" class="switcher switcher_on" href="javascript:void(0)" onclick="list.switchItemState($(this), '{$main->content_list_table}', '{$col.col_name}', '{$item.id}')"></a>
                            {else}
                                <a mode="0" class="switcher switcher_off" href="javascript:void(0)" onclick="list.switchItemState($(this), '{$main->content_list_table}', '{$col.col_name}', '{$item.id}')"></a>
                            {/if}

                        {elseif $col.type == 'text'}
                            {if $item[$col.col_name]}
                                {$item[$col.col_name]}
                            {else}
                                {$main->getText('list', 'zero_selection')}
                            {/if}

                        {elseif $col.type == 'url'}
                            {if $item[$col.col_name]}
                                {if $col.mode == 1}
                                    <a target="_blank" href="{$item[$col.col_name]}">{$item[$col.col_name]}</a>
                                {else}
                                    {$item[$col.col_name]}
                                {/if}
                            {else}
                                {$main->getText('list', 'zero_selection')}
                            {/if}
            
                        {else}
                            {$item[$col.col_name]}

                        {/if}
                    </td>
                    {/foreach}

                    {if !$main->vars.list_no_sortable}
                    <td>
                        <div class="sorting">
                            <input iid="{$item.id}" type="text" value="{$item.sort}" maxlength="4" tabindex="{$i+1}" />
                            <div class="upndown">
                                <a class="icon_action icon_move_up_instance" title="{$main->getText('list', 'up_help')}" href="javascript:void(0)" onclick="list.upItem('{$item.id}', '{$main->content_list_up_link}{$main->item_data.id}')"></a>
                                <a class="icon_action icon_move_down_instance" title="{$main->getText('list', 'down_help')}" href="javascript:void(0)" onclick="list.downItem('{$item.id}', '{$main->content_list_up_link}{$main->item_data.id}')"></a>
                            </div>
                        </div>
                    </td>
                    {/if}

                    {if $main->module_name == 'sections'}
                    <td>
                        <a href="{$main->content_list_copy_link}{$item.id}" class="icon_action icon_copy_instance" title="Копировать запись"></a>
                    </td>
                    {/if}

                    {if !$main->vars.list_no_publish}
                    <td>
                        {if $item.publish == '0'}
                            <a class="icon_action icon_show_instance" title="{$main->getText('list', 'show_item_help')}" href="{$main->content_list_show_link}{$item.id}"></a>
                        {else}
                            <a class="icon_action icon_hide_instance" title="{$main->getText('list', 'hide_item_help')}" href="{$main->content_list_hide_link}{$item.id}"></a>
                        {/if}
                    </td>
                    {/if}

                    <td>
                        <a class="icon_action icon_delete_instance" title="{$main->getText('list', 'delete_item_help')}" href="javascript:void(0)" onclick="confirmMessage('{$main->getText('list', 'confirm_delete_text')}', '{$main->content_list_delete_link}{$item.id}')"></a>
                    </td>
                </tr>
            {/foreach}
        </tbody>
        {else}
        <tbody>
            <tr class="unactive empty">
                <td>&nbsp;</td>
                <td align="center" colspan="{$cols_count-2}">{$main->getText('list', 'empty_list')}</td>
                <td>&nbsp;</td>
            </tr>
        </tbody>
        {/if}
    </table>
</div>

{include file="system/pager.tpl"}
<script type="text/javascript">list.init('{$main->item_data.id}')</script>

