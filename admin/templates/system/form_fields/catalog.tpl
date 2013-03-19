<div class="item_block">
    <label class="label" for="{$item.name}" title="{$item.help}">{$item.label}</label>
    <input type="hidden" id="{$item.name}" name="{$item.name}" value="{$item.value|urlencode_my}" />

    <div>
        <a class="paste_params_button" href="javascript:void(0)" onclick="catalog.pasteParams('{$item.name}')">Экспорт</a>
        <a class="copy_params_button" href="javascript:void(0)" onclick="catalog.copyParams('{$item.name}')">Импорт</a>
        <a class="add_param_button" href="javascript:void(0)" onclick="catalog.addParam('{$item.name}')">Добавить +</a>
    </div>

    <div class="form_items_list_container white_holder related_list" id="catalog_{$item.name}">
        <table cellpadding="0" cellspacing="0" border="0">
            <tr class="thead">
                <th width="1%">№</th>
                <th width="39%">Параметр</th>
                <th width="60%">Значение</th>
                <th></th>
                <th></th>
            </tr>
        </table>
    </div>

    <script type="text/javascript">
        catalog.init('{$item.name}');
    </script>
</div>