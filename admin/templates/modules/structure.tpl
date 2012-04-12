<h1>{$main->h1}</h1>

{if $main->module_mode eq 'menu'}
    {if $smarty.get.action == 'edit'}
        <div class="left_col">
            {include file="system/form.tpl"}
        </div>

        <div class="right_col">
        {include file="modules/structure.edit_menu.tools.tpl"}
        </div>

        <div class="cl"></div>
    {else}
        {include file="system/section_content.tpl"}
    {/if}

{else}

    {if $main->module_mode eq 'tree'}
        <div class="left_col">
        {include file="modules/structure.tree.tpl"}
        </div>

        <div class="right_col">
        {include file="modules/structure.tree.tools.tpl"}
        </div>
    {/if}

    {if $main->module_mode eq 'edit'}
        <div class="left_col">
        {include file="modules/structure.edit.tpl"}
        </div>

        <div class="right_col">
        {include file="modules/structure.edit.tools.tpl"}
        </div>
    {/if}
{/if}

<div class="cl"></div>