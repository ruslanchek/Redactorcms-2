<div class="right_block">
    <h2>{$main->getText('common', 'actions')}</h2>
    <div class="inner">
        <ul class="rb_menu">
            <li>
                <a class="red_link" onclick="confirmMessage('{$main->getText('common', 'delete_oject_confirm')}', '{$main->content_list_delete_link}{$main->dataset.params.item_params.id}')" href="javascript:void(0)">{$main->getText('common', 'delete_oject')}</a>
            </li>
            <li>
                <a href="javascript:void(0)" class="dashed" onclick="users.generatePassword('{$smarty.get.suboption}', '{$main->dataset.params.item_params.id}', '{$main->item_data.email}')">Сгенирировать пароль</a>
            </li>
        </ul>
    </div>
</div>


<div class="right_block">
    <h2>{$main->getText('users', 'item_tools_info_header')}</h2>
    <div class="inner">
        <h3>{$main->getText('common', 'code_id')}</h3>
        <p>
            {$main->dataset.params.item_params.id}
        </p>

        <h3>{$main->getText('users', 'last_label')}</h3>
        <p>
            {$main->item_data.last_login|date:"datetime"}
        </p>
    </div>
</div>