<div class="right_block">
    <h2>{$main->getText('common', 'actions')}</h2>
    <div class="inner">
        <ul class="rb_menu">
            <li>
                <a class="red_link" onclick="confirmMessage('{$main->getText('common', 'delete_oject_confirm')}', '{$main->content_list_delete_link}{$main->dataset.params.item_params.id}')" href="javascript:void(0)">{$main->getText('common', 'delete_oject')}</a>
            </li>
        </ul>
    </div>
</div>