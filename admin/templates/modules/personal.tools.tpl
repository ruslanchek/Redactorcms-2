<div class="right_block">
    <h2>{$main->getText('personal', 'user_status_header')}</h2>
    <div class="inner">
        <h3>{$main->getText('personal', 'user_status_param_last_login')}</span></h3>
        <p>
            <span class="nowrap">{$main->item_data.last|date:'datetimefull'}</span>
            {if $main->item_data.ip != '0'}({$personal->encodeIp($main->item_data.ip)}){/if}
        </p>
    </div>
</div>