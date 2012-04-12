<div class="right_block">
    <h2>{$main->getText('sections', 'filter_header')}</h2>
    <div class="inner">
        <a class="back_button" href="/admin/?option=sections&suboption=list">{$main->getText('sections', 'title_sections_list')}</a>
        <form>
            <div class="filter_item">
                <label>{$main->getText('sections', 'filter_how_to_show_label')}</label>
                <select autocomplete="off" name="filter_how_items" id="filter_how_items">
                    <option>10 {$main->getText('sections', 'filter_how_to_show_suffix')}</option>
                    <option>25 {$main->getText('sections', 'filter_how_to_show_suffix')}</option>
                    <option>50 {$main->getText('sections', 'filter_how_to_show_suffix')}</option>
                    <option>100 {$main->getText('sections', 'filter_how_to_show_suffix')}</option>
                    <option>{$main->getText('sections', 'filter_show_all_items')}</option>
                </select>
            </div>

            <div class="filter_item">
                <label>
                    <input type="checkbox" checked="checked" autocomplete="off" name="filter_show_hidden" id="filter_show_hidden" />
                    {$main->getText('sections', 'filter_show_hidden_label')}
                </label>
            </div>

            <div class="filter_item">
                <label>
                    <input type="checkbox" checked="checked" autocomplete="off" name="filter_show_active" id="filter_show_active" />
                    {$main->getText('sections', 'filter_show_active_label')}
                </label>
            </div>
        </form>

        <ul class="left_tools_menu">
            <li>
                <a href="/admin/?option=sections&suboption=content&action=create&id={$main->item_data.id}"><span class="icon add_instance"></span>{$main->getText('sections', 'create_new_item')}</a>
            </li>
            <li>
                <a href="javascript:void(0)"><span class="icon delete_instance"></span>{$main->getText('sections', 'delete_selected_items')}</a>
            </li>
            <li>
                <a href="/admin/?option=sections&suboption=content_search&id={$main->item_data.id}"><span class="icon search_instance"></span>{$main->getText('sections', 'search_items')}</a>
            </li>
        </ul>

        <a class="params_button" href="/admin/?option=sections&suboption=edit&id={$main->item_data.id}">{$main->getText('sections', 'title_section_params')}</a>
    </div>
</div>