<div class="breadcrumb">
    {foreach from=$core->page.breadcrumbs item="crumb"}
        {if $crumb.current}
            {$crumb.name}
        {else}
            <a href="{$crumb.path}">{$crumb.name}</a> <span class="color-gray">&gt;</span>
        {/if}
    {/foreach}
</div>