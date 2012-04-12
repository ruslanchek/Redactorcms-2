<div class="right_block">
    <h2>{$main->getText('structure', 'item_status_header')}</h2>
    <div class="inner">
        <h3>{$main->getText('common', 'code_id')}</h3>
        <p>
            {$main->item_data.id}
        </p>

        <h3>{$main->getText('structure', 'item_status_param_physical_path')}</h3>
        <p>
            <a href="{$main->item_data.path}">{$main->item_data.path}</a>
        </p>
    </div>
</div>