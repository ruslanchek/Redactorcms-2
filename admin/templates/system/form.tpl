{include file="system/scripts/form_calendar_words.tpl"}
{include file="system/scripts/form_validator_rules.tpl"}
{include file="system/scripts/form_texts.tpl"}

<div class="form">
    {if $main->form_error.condition > 0}
    <div class="result_message {if $main->form_error.condition == 2}error{/if}{if $main->form_error.condition == 1}ok{/if}">
        {$main->form_error.message}
    </div>
    {/if}

    {$avp = ''}

    <form action="{$main->dataset.params.form_action}" method="{$main->dataset.params.method}" enctype="{$main->dataset.params.enctype}" id="form">
        {foreach from=$main->dataset.data item=item key=index}
            {if !$item.no_edit}
                {include file="system/form_fields/`$item.type`.tpl"}
            {/if}
        {/foreach}

      	<div class="buttons">
          	{if !$main->dataset.params.no_ok_button}
            <input class="button" type="submit" title="{$main->getText('form', 'form_button_append_title')}" name="ok" value="{$main->getText('form', 'form_button_append_text')}" />
            {/if}
            <input class="button" type="submit" title="{$main->getText('form', 'form_button_save_title')}" name="save" value="{$main->getText('form', 'form_button_save_text')}" />
      	</div>
    </form>
</div>