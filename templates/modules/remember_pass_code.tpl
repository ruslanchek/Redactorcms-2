{if $core->page.form.message}
    Status: {if $core->page.form.status}OK{else}ERROR{/if}; Message: {$core->page.form.message}
{/if}