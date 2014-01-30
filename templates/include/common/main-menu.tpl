{function name=manimenu level=0}
    {foreach from=$data item="item" key="i"}
        {if is_array($item)}
            {if $level == 0}
            <span class="item">
            {/if}
                <a href="{$item.path}" {if $item.id == $core->page.id || $item.id == $core->page.pid}class="active-a"{/if}>{$item.name}</a>

                <nav class="sub">
                    {if !empty($item.childrens) && $level == 0}
                        {call name=manimenu data=$item.childrens level=$level + 1}
                    {/if}
                </nav>
            {if $level == 0}
            </span>
            {/if}
        {else}
            <span class="item">
                <a href="{$item.path}">{$item.name}</a>
            </span>
        {/if}
    {/foreach}
{/function}

{call name=manimenu data=$core->getBranchMenu(1, 3)}