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
                        <td>{$val_i.2}</td>
                        <td>{$key_i}</td>
                        <td>
                            {if $val_i.1 == 'text'}
                                <input class="text_input" type="text" value="{$val_i.0}" name="{$key_i}" />
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
