<div class="right_block">
    <h2>{$main->getText('common', 'actions')}</h2>
    <div class="inner">
        <ul class="rb_menu">
            <li>
                <a class="red_link" onclick="confirmMessage('{$main->getText('common', 'delete_oject_confirm')}', '/admin/?option=sections&suboption=content&id={$smarty.get.id}&action=delete&item_id={$smarty.get.item}')" href="javascript:void(0)">{$main->getText('sections_content', 'delete_item_label')}</a>
            </li>
            {*<li>
                <a href="/admin/?option=sections&suboption=content&action=copy&id={$main->item_data.id}">{$main->getText('sections_content', 'copy_item_label')}</a>
            </li>*}
        </ul>
    </div>
</div>

<div class="right_block">
    <h2>{$main->getText('sections', 'content_item_tools_info_header')}</h2>
    <div class="inner">
        <h3>{$main->getText('common', 'code_id')}</h3>
        <p>
            {$main->dataset.params.item_params.id}
        </p>

        <h3>{$main->getText('common', 'creator')}</h3>
        <p>
            {$sections->getUserStamp($main->dataset.params.item_params.creator_id)}<br>
            <span class="small">{$main->dataset.params.item_params.creation_date|date:'datetimefull'}</span>
        </p>

        {if $main->dataset.params.item_params.creation_date != $main->dataset.params.item_params.change_date}
            <h3>{$main->getText('common', 'cahnger')}</h3>
            <p>
                {$sections->getUserStamp($main->dataset.params.item_params.changer_id)}<br>
                <span class="small">{$main->dataset.params.item_params.change_date|date:'datetimefull'}</span>
            </p>
        {/if}
    </div>
</div>