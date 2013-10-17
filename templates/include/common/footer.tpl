&copy;

{if $core->getConstant('common', 'start_year') < date('Y')}
    {$core->getConstant('common', 'start_year')}&ndash;
{/if}

{date('Y')}

{$core->getConstant('common', 'brand_name')}

<br>

<a href="mailto:{$core->getConstant('common', 'main_email')|escape}" class="black-link">
    {$core->getConstant('common', 'main_email')}
</a>