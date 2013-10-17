<script type="text/javascript">
    {literal}
    var messages = {
        move_item: '{/literal}{$main->getText('structure', 'item_move_confirm_text')}{literal}'
    };
    {/literal}
</script>

<div class="tree_table">
    <div id="tools_container">
        <div id="item_tools">
            <div class="tools_inner">
                <a title="{$main->getText('structure', 'item_up')}" href="javascript:void(0)" onclick="turnUpItem($(this))" id="turnUpItem"><i class="icon-up-big"></i></a>
                <span id="turnUpItemUnactive"><i class="unactive icon-up-big"></i></span>

                <a title="{$main->getText('structure', 'item_down')}" href="javascript:void(0)" onclick="turnDownItem($(this))" id="turnDownItem"><i class="icon-down-big"></i></a>
                <span id="turnDownItemUnactive"><i class="unactive icon-down-big"></i></span>

                <a class="path-link" title="Перейти к узлу на сайте" href="" target="_blank"><i class="icon-export"></i></a>

                <a href="javascript:void(0)" title="Дублировать" onclick="dublicateItem(this)" id="dublicateItem"><i class="icon-docs"></i></a>
                <a href="javascript:void(0)" title="{$main->getText('structure', 'item_publish')}" onclick="publishItem(this)" id="publishItem"><i class="icon-eye"></i></a>
                <a href="javascript:void(0)" title="{$main->getText('structure', 'item_hide')}" onclick="hideItem(this)" id="hideItem"><i class="icon-eye-off"></i></a>
                <a href="javascript:void(0)" title="{$main->getText('structure', 'item_delete')}" onclick="delItem(this, '{$main->getText('structure', 'item_delete_confirm_text')}')" id="delItem"><i class="red icon-cancel"></i></a>
                <a href="javascript:void(0)" title="{$main->getText('structure', 'item_add')}" onclick="addChildItem(this)" id="addChildItem"><i class="icon-plus-squared"></i></a>
            </div>
        </div>
    </div>

    <ul class="tt_list" id="tag_tree">
        <li id="item_1" class="tree_item root {if $structure->getNodeData(1, 'publish') == 1}active{else}hided{/if}" data-url="/">
            <div class="item_container">
                <div class="item_container_inner">
                    <a href="/admin/?option=structure&suboption=edit&id=1">{$structure->getNodeData(1, 'name')}</a>
                </div>
            </div>
        </li>

        {$structure->getRenderedBranch()}
    </ul>
</div>