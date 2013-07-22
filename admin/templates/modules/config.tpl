<h1>{$main->h1}</h1>

<div class="list_table config_table">
    <form action="/admin/?option=config&suboption=constants&action=save_params" method="POST">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            {foreach $main->constants as $key => $val}
                <tr>
                    <th colspan="3" align="left">{$main->getText('contstants', $key)}</th>
                </tr>

                {foreach $main->constants[$key] as $key_i => $val_i}
                <tr>
                    <td width="30%">{$val_i.2}</td>
                    <td width="15%">{$key_i}</td>
                    <td width="55%">
                        {if $val_i.1 == 'text'}
                            <input class="text_input" type="text" value="{$val_i.0|urldecode|stripcslashes|escape}" name="{$key_i|escape}" />
                        {/if}

                        {if $val_i.1 == 'textarea'}
                            <textarea name="{$key_i|escape}" class="textarea">{$val_i.0|urldecode|stripcslashes}</textarea>
                        {/if}
                    </td>
                </tr>
                {/foreach}
            {/foreach}
        </table>

        <div class="buttons">
            <input class="button" type="submit" title="{$main->getText('form', 'form_button_save_title')}" value="{$main->getText('form', 'form_button_save_text')}" />
        </div>

        <div class="form_end"></div>
    </form>
</div>
