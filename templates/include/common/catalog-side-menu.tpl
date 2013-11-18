<div class="unit-20">
    <nav class="nav-side">
        <h2>Каталог</h2>

        {function name=catalog_side_menu level=0}
            <ul data-level="{$level}" {if $level == 0}class="catalog-map" id="tree"{/if}>
                {foreach from=$data item="item" key="i"}
                    {if is_array($item)}
                        <li {if $item.id == $core->page.id || $item.id == $core->page.pid}class="active"{/if}>
                            <a href="{$item.path}">{$item.name}</a>

                            {if !empty($item.childrens)}
                                {call name=catalog_side_menu data=$item.childrens level=$level + 1}
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

        {call name=catalog_side_menu data=$core->getCatalogFullList()}
    </nav>
</div>

<script type="text/javascript">
    $(function(){
        catalog_tree.init('#tree');
    });
</script>