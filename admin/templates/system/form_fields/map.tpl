{assign var="markers" value=$sections->getMarkers($main->item_data.id, $main->dataset.params.item_params.id, $item.name)}
<div class="item_block">
    <label class="label" for="{$item.name}" title="{$item.help}">{$item.label}</label>
    <input type="hidden" id="{$item.name}" name="{$item.name}" value="{$item.value}" />
    <div class="white_holder map_holder">
        <div class="map" id="map_{$item.name}"></div>
        <div class="map_tools">
            <label>
                Поиск
                <input type="search" id="geolocation_q_{$item.name}">
            </label>

            <input class="button" type="button" value="Найти" onclick="gmaps_edit.geolocation('{$item.name}')">
            <br><br><br>

            <label>
                {$main->getText('gmaps', 'latitude')}
                <input type="text" id="map_lat_{$item.name}">
            </label>

            <label>
                {$main->getText('gmaps', 'longitude')}
                <input type="text" id="map_lng_{$item.name}">
            </label>

            <label>
                {$main->getText('gmaps', 'zoom')}
                <input type="text" id="map_zoom_{$item.name}">
            </label>

            <input class="button" type="button" value="{$main->getText('common', 'refresh')}" onclick="gmaps_edit.refreshData('{$item.name}')">

            <div class="add_marker">
                <a class="dashed" href="javascript:void(0)" onclick="gmaps_edit.newMarker('{$item.name}', '{$main->dataset.params.item_params.id}', '{$main->item_data.id}')">{$main->getText('gmaps', 'add_marker')}</a>
            </div>
        </div>
        <div class="cl"></div>

        <script type="text/javascript">
            gmaps_edit.init('{$item.name}');
            {foreach from=$markers item=marker key=i}
                gmaps_edit.addMarker('{$item.name}', '{$i}', '{$marker.data.0}', '{$marker.data.1}', '{$i+1}', '{$marker.id}');
            {/foreach}
        </script>

        <div class="related_list markers_list" rel="{$item.name}" {if !$markers}style="display: none"{/if}>
            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <thead>
                    <tr>
                        <th width="1%"></th>
                        <th width="1%"></th>
                        <th width="1%">{$main->getText('gmaps', 'latitude')}</th>
                        <th>{$main->getText('gmaps', 'longitude')}</th>
                        <th width="1%"></th>
                        <th width="1%"></th>
                    </tr>
                </thead>
                <tbody class="marker_stack" rel="{$item.name}">
                    {foreach from=$markers item=marker key=i}
                    <tr class="marker_row" rel="{$marker.id}">
                        <td align="center">
                            {$i+1}
                        </td>
                        <td>
                            <a class="icon_action icon_marker_instance" href="javascript:void(0)" onclick="gmaps_edit.focusMarker('{$item.name}', '{$i}')"></a>
                        </td>
                        <td>
                            <span class="marker_lat nowrap" rel="{$i}">{$marker.data.0}</span>
                        </td>
                        <td>
                            <span class="marker_lng nowrap" rel="{$i}">{$marker.data.1}</span>
                        </td>
                        <td>
                            <a href="javascript:void(0)" class="icon_action icon_edit_instance" title="{$main->getText('common', 'edit')}" onclick="gmaps_edit.editMarker('{$item.name}', '{$i}', '{$marker.id}')"></a>
                        </td>
                        <td>
                            <a href="javascript:void(0)" class="icon_action icon_delete_instance" title="{$main->getText('common', 'delete')}" onclick="gmaps_edit.deleteMarker('{$item.name}', '{$i}', '{$marker.id}')"></a>
                        </td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
    </div>
</div>