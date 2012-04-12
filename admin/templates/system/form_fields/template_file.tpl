<div class="item_block">
    <label class="label" for="{$item.name}" title="{$item.help}">{$item.label}</label>
    <input class="text" type="text" id="{$item.name}" name="{$item.name}" value="{$item.value|escape}" tabindex="{$index+1}" />

    {*<div class="form_items_list_container white_holder" id="browser_frame_{$item.name}"></div>

    <script type="text/javascript">
        template_selector.createBrowser('{$item.name}', '{$item.root_dir}');
    </script>*}
</div>