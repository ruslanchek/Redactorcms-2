{function name=sitemap level=0}
    <ul data-level="{$level}">
        {foreach from=$data item="item" key="i"}
            {if is_array($item)}
                <li>
                    <a href="{$item.path}">{$item.name}</a>

                    {if !empty($item.childrens)}
                        {call name=sitemap data=$item.childrens level=$level + 1}
                    {/if}
                </li>
            {else}
                <li>
                    <a href="{$item.path}">{$item.name}</a>
                </li>
            {/if}
        {/foreach}
    </ul>
{/function}

{call name=sitemap data=$core->page.data}