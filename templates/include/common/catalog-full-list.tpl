{$catalog_groups = $core->getCatalogGroups()}

{$cl = count($catalog_groups)}
{$cs = ceil($cl / 4)}

<div class="units-row-end">
    {$i = 0}
    <div class="unit-20">
        <ul class="catalog-map">
        {foreach $catalog_groups as $group}
            {$i = $i + 1}

            <li>
                <a href="{$group.path}">{$group.name}</a>

                {$branch_data = $core->getCatalogBranchByGroupId($group.id)}

                {if count($branch_data) > 0}
                    {function name='catalog_branch' level=0}
                        <ul>
                            {foreach from=$data item="item" key="i"}
                                {if is_array($item)}
                                    <li {if $item.id == $core->page.id}class="active"{/if}>
                                        <a href="{$item.path}">{$item.name}</a>

                                        {if !empty($item.childrens)}
                                            {call name='catalog_branch' data=$item.childrens level=$level + 1}
                                        {/if}
                                    </li>
                                {else}
                                    <li {if $item.id == $core->page.id}class="active"{/if}>
                                        <a href="{$item.path}">{$item.name}</a>
                                    </li>
                                {/if}
                            {/foreach}
                        </ul>
                    {/function}

                    {call name='catalog_branch' data=$branch_data}
                {/if}
            </li>

            {if $i > $cs}
                </ul>
            </div>
                {$i = 0}
            <div class="unit-20">
                <ul class="catalog-map">
            {/if}
        {/foreach}
        </ul>
    </div>
</div>

