<div class="item_block">
    <label class="label" for="{$item.name}" title="{$item.help}">{$item.label}</label>
    <div class="cl"></div>

    <span class="hex_color_input_prefix"><span>#</span></span>
    <input class="text color_picker_input required" type="text" id="{$item.name}" name="{$item.name}" value="{$item.value}" tabindex="{$index+1}" />

    <div class="color_preview" style="background-color: #{$item.value};"></div>

    <div class="d-shadow-small color_picker_frame" id="color_picker_frame_{$item.name}">
        <div class="d-shadow-small-wrap">
            <div class="calendar_frame" id="color_picker_instance_{$item.name}"></div>
            <div class="d-sh-small-cn d-sh-small-tl"></div>
            <div class="d-sh-small-cn d-sh-small-tr"></div>
        </div>
        <div class="d-sh-small-cn d-sh-small-bl"></div>
        <div class="d-sh-small-cn d-sh-small-br"></div>
    </div>

    <div class="regular_button round_button_holder">
        <a href="javascript:void(0)" class="round_button" title="{$main->getText('form', 'form_button_color_picker')}" onclick="colorpicker.openPicker('{$item.name}')">
            <span class="color_picker"></span>
        </a>
    </div>

    <script type="text/javascript">
        $('#color_picker_instance_{$item.name}').farbtastic('#{$item.name}');
        colorpicker.setHexColorValidatorListener('{$item.name}');
    </script>

    <div class="cl"></div>
</div>