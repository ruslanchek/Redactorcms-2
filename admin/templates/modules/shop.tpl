<h1>{$main->h1}</h1>

{if $main->module_mode eq 'goods'}
    {if $smarty.get.action == 'edit'}
        <div class="left_col">
            {include file="system/form.tpl"}
        </div>

        <div class="right_col">
        {include file="modules/shop.goods.edit.tools.tpl"}
        </div>

        <div class="cl"></div>
    {else}
        {include file="system/section_content.tpl"}
    {/if}
{elseif $main->module_mode eq 'categories'}
    {if $smarty.get.action == 'edit'}
        <div class="left_col">
            {include file="system/form.tpl"}
        </div>

        <div class="right_col">
        {include file="modules/shop.categories.edit.tools.tpl"}
        </div>

        <div class="cl"></div>
    {else}
        {include file="system/section_content.tpl"}
    {/if}
{/if}