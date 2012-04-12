{if $main->ajax_content == 'include'}
    {include file="$ajax_include" new=$smarty.get.new}
{else}
    {$main->ajax_content}
{/if}
