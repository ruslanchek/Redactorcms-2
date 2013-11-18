{$image = $core->getItemSingleImage('section_22', $core->page.item.id, 'col_158')}

{if $image}
<img class="maker-logo-inline" style="margin-bottom: 20px" src="{$image.path|escape}{$image.name|escape}_sq.{$image.extension|escape}" alt="{$item.name|escape}"/>
{/if}

{$core->page.item.full_text}

<div class="clear"></div>

<hr/>

{include file="include/common/catalog-groups-list.tpl" items=$core->getMakerGroups()}