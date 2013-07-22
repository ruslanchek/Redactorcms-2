<div class="breadcrumbs">
    {foreach from=$core->page.breadcrumbs item="crumb"}
        {if $crumb.current}
            <span class="gray">{$crumb.name}</span>
        {else}
            <a class="black-link" href="{$crumb.path}">{$crumb.name}</a> <span class="gray">&rarr;</span>
        {/if}
    {/foreach}
</div>