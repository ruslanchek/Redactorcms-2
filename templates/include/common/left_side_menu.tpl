{* Главное меню *}
{*<ul id="left_menu">
    {foreach from=$core->getInlineMenu(3, 1) item=item}
        <li class="hoog_font">
            {if $item.id == $core->page.id}
                <b>{$item.name}</b>
            {else}
                <a href="{$item.path}">{$item.name}</a>
            {/if}
        </li>
    {/foreach}
</ul>*}

<div class="menu_left">
    <div class="ml-inner">
        {function name=menu level=0}
        <ul class="level{$level}">
            {foreach from=$data item="entry" key="i"}
                {if is_array($entry) && ($core->page.pid == $entry.id || $core->page.id == $entry.id)}
                    <li>
                        {if $level > 0}&mdash; {/if}{if $core->page.id == $entry.id}<b>{$entry.name}</b>{else}<a href="{$entry.path}">{$entry.name}</a>{/if}
                        {if !empty($entry.childrens)}
                            {call name=menu data=$entry.childrens level=$level+1}
                        {/if}
                    </li>
                {else}
                    <li>
                        {if $level > 0}&mdash; {/if}{if $core->page.id == $entry.id}<b>{$entry.name}</b>{else}<a href="{$entry.path}">{$entry.name}</a>{/if}
                    </li>
                {/if}
            {/foreach}
        </ul>
        {/function}
        {call name=menu data=$core->getBranchMenu(1, 4)}
    </div>
</div>