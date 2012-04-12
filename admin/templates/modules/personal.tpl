<h1>{$main->h1}</h1>

<div class="left_col">
    {if $main->module_mode eq 'settings'}
        {include file="modules/personal.settings.tpl"}
    {/if}

    {if $main->module_mode eq 'password_change'}
        {include file="modules/personal.password_change.tpl"}
    {/if}
</div>

<div class="right_col">
    {include file="modules/personal.tools.tpl"}
</div>

<div class="cl"></div>