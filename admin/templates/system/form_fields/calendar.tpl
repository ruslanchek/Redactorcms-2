<div class="item_block">
    <label class="label" for="{$item.name}" title="{$item.help}">{$item.label}</label>
    <div class="cl"></div>

    <input autocomplete="off" onblur="calendar.blurInput('{$item.name}')" onfocus="calendar.focusInput('{$item.name}')" class="text calendar_date" type="text" id="{$item.name}" value="{$item.value|date:'date'}" tabindex="{$index+1}" />

    <div class="d-shadow-small calendar_picker_frame" id="calendar_frame_{$item.name}">
        <div class="d-shadow-small-wrap">
            <div class="calendar_frame" id="calendar_picker_instance_{$item.name}"></div>

            <div class="tb_block">
                <a rel="ok" class="tool_button blue_tb" href="javascript:void(0)">{$main->getText('form', 'form_tool_action_ok')}</a>
                <a class="tool_button gray_tb" href="javascript:void(0)">{$main->getText('form', 'form_tool_action_today')}</a>
                <div class="cl"></div>
            </div>

            <div class="d-sh-small-cn d-sh-small-tl"></div>
            <div class="d-sh-small-cn d-sh-small-tr"></div>
        </div>
        <div class="d-sh-small-cn d-sh-small-bl"></div>
        <div class="d-sh-small-cn d-sh-small-br"></div>
    </div>

    <div class="regular_button round_button_holder">
        <a href="javascript:void(0)" class="round_button" title="{$main->getText('form', 'form_button_calendar_date')}" onclick="calendar.openPicker('{$item.name}')"><span class="date_picker"></span></a>
    </div>

    <input autocomplete="off" onclick="timepicker.openPicker('{$item.name}')" class="text calendar_time" readonly="readonly" type="text" id="time_{$item.name}" value="{$item.value|date:'time'}" tabindex="{$index+1}" />

    <div class="d-shadow-small calendar_time_picker_frame" id="calendar_time_frame_{$item.name}">
        <div class="d-shadow-small-wrap">
            <div class="calendar-time_frame" id="calendar_time_picker_instance_{$item.name}">

                <div class="timepicker_block">
                    <div class="tpb_block">
                        <div class="tpb_controls">
                            <a href="javascript:void(0)" class="h-up"></a>
                            <a href="javascript:void(0)" class="m-up"></a>
                            <a href="javascript:void(0)" class="h-dn"></a>
                            <a href="javascript:void(0)" class="m-dn"></a>
                        </div>

                        <div class="tpb_digit h-1">1</div>
                        <div class="tpb_digit h-2">2</div>
                        <div class="tpb_colon">:</div>
                        <div class="tpb_digit m-1">4</div>
                        <div class="tpb_digit m-2">7</div>

                        <div class="cl"></div>
                    </div>
                </div>

                <div class="tb_block">
                    <a rel="ok" class="tool_button blue_tb" href="javascript:void(0)">{$main->getText('form', 'form_tool_action_ok')}</a>
                    <a class="tool_button gray_tb" href="javascript:void(0)">{$main->getText('form', 'form_tool_action_now')}</a>
                    <div class="cl"></div>
                </div>

            </div>
            <div class="d-sh-small-cn d-sh-small-tl"></div>
            <div class="d-sh-small-cn d-sh-small-tr"></div>
        </div>
        <div class="d-sh-small-cn d-sh-small-bl"></div>
        <div class="d-sh-small-cn d-sh-small-br"></div>
    </div>

    <div class="regular_button round_button_holder">
        <a href="javascript:void(0)" class="round_button" title="{$main->getText('form', 'form_button_calendar_time')}" onclick="timepicker.openPicker('{$item.name}')"><span class="time_picker"></span></a>
    </div>

    <input autocomplete="off" type="hidden" name="{$item.name}" id="parsed_{$item.name}" value="{$item.value}" />

    <div class="cl"></div>
</div>