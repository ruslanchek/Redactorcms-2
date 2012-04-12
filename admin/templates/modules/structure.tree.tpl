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
                <div class="upndown">
                    <a class="icon_action icon_move_up_instance" title="{$main->getText('structure', 'item_up')}" href="javascript:void(0)" onclick="turnUpItem($(this))" id="turnUpItem"></a>
                    <span class="icon_action icon_move_up_instance_unactive" id="turnUpItemUnactive"></span>

                    <a class="icon_action icon_move_down_instance" title="{$main->getText('structure', 'item_down')}" href="javascript:void(0)" onclick="turnDownItem($(this))" id="turnDownItem"></a>
                    <span class="icon_action icon_move_down_instance_unactive" id="turnDownItemUnactive"></span>
                </div>

                <a class="icon_action icon_show_instance" href="javascript:void(0)" title="{$main->getText('structure', 'item_publish')}" onclick="publishItem(this)" id="publishItem"></a>
                <a class="icon_action icon_hide_instance" href="javascript:void(0)" title="{$main->getText('structure', 'item_hide')}" onclick="hideItem(this)" id="hideItem"></a>
                <a class="icon_action icon_delete_instance" href="javascript:void(0)" title="{$main->getText('structure', 'item_delete')}" onclick="delItem(this, '{$main->getText('structure', 'item_delete_confirm_text')}')" id="delItem"></a>
                <a class="icon_action icon_add_instance" href="javascript:void(0)" title="{$main->getText('structure', 'item_add')}" onclick="addChildItem(this)" id="addChildItem"></a>
            </div>
        </div>
    </div>

    <ul class="tt_list" id="tag_tree">
        <li id="item_1" class="tree_item root {if $structure->getNodeData(1, 'publish') == 1}active{else}hided{/if}">
            <div class="item_container">
                <div class="item_container_inner">
                    <a href="/admin/?option=structure&suboption=edit&id=1">{$structure->getNodeData(1, 'name')}</a>
                    <span class="path">/</span>
                    <a href="/" target="_blank" class="path">/</a>
                </div>
            </div>
        </li>

        {$structure->getRenderedBranch()}
    </ul>
</div>