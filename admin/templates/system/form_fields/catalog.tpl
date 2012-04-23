<div class="item_block">
    <label class="label" for="{$item.name}" title="{$item.help}">{$item.label}</label>
    <input type="hidden" id="{$item.name}" name="{$item.name}" value="{$item.value|urlencode_my}" />

    <div><a href="javascript:void(0)" onclick="catalog.addParam('{$item.name}')">Добавить параметр</a></div>

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