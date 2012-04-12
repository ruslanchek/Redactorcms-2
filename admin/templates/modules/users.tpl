<h1>{$main->h1}</h1>

{if $main->module_mode eq 'system_users'}
    {if $smarty.get.action == 'edit'}
        <div class="left_col">
            {include file="system/form.tpl"}
        </div>

        <div class="right_col">
        {include file="modules/users.system_users.edit.tools.tpl"}
        </div>

        <div class="cl"></div>
    {else}
        {include file="system/section_content.tpl"}
    {/if}

{elseif $main->module_mode eq 'groups'}

    {if $smarty.get.action == 'edit'}
        <div class="left_col">
            {include file="system/form.tpl"}
        </div>

        <div class="right_col">
        {include file="modules/users.groups.edit.tools.tpl"}
        </div>

        <div class="cl"></div>
    {else}
        {include file="system/section_content.tpl"}
    {/if}

{elseif $main->module_mode eq 'public_users'}

    {if $smarty.get.action == 'edit'}
        <div class="left_col">
            {include file="system/form.tpl"}
        </div>

        <div class="right_col">
        {include file="modules/users.public_users.edit.tools.tpl"}
        </div>

        <div class="cl"></div>
    {else}
        {include file="system/section_content.tpl"}
    {/if}
{/if}