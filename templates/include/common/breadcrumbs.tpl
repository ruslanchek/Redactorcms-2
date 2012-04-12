<ul class="breadcrumb">
    {foreach from=$core->page.breadcrumbs item="crumb"}
        {if $crumb.current}
            <li class="active">{$crumb.name}</li>
        {else}
            <li>
                <a href="{$crumb.path}">{$crumb.name}</a> <span class="divider">/</span>
            </li>
        {/if}
    {/foreach}
</ul>