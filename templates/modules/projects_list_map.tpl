{if $core->page.data.list.items}
    <div id="map"></div>

    <script>
        {literal}core.map.init({lat: 55.7, lng: 37.5, marker_icon: '/marker.php'});{/literal}
    </script>

    <script>
        {foreach from=$core->page.data.list.items item=item}
            {$marker = $core->getMapMarkers($item.id)}
            {if $marker.id > 0}
                core.map.addMarker({literal}{{/literal}id: {$item.id}, lat: {$marker.lat}, lng: {$marker.lng}, title: '{$item.name|escape}'{literal}}{/literal});
            {/if}
        {/foreach}
    </script>

    {foreach from=$core->getCities() item=city}
        {$i = 0}
        {$i = $i + 1}

        <h1 class="uppercase">{$city.city}</h1>

        {$items = $core->projectsByCities($city.city)}
        {foreach from=$items.items item=item}
            <div class="div_float_30">{$item.id}. <a class="dashed" href="javascript:void(0)" onclick="core.map.clickMarker({$item.id})">{$item.name}</a></div>
        {/foreach}

        {if $i == 3}
            <div class="clear"></div>
            {$i = 0}
        {/if}
        <div class="clear"></div>
        <br>
    {/foreach}
{/if}