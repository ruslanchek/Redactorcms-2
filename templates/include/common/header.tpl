{if !$mainpage}
    <a class="logo" href="/" title="{$core->getConstant('common', 'brand_name')|escape}"></a>
{else}
    <span class="logo" title="{$core->getConstant('common', 'brand_name')|escape}"></span>
{/if}

<div class="phone">{$core->getConstant('common', 'main_phone')}</div>
<a class="callback-button btn btn-yellow" href="#">Обратный звонок</a>

{include file="include/common/main-menu.tpl"}

<div class="valutes">
    <span class="item"><strong>USD</strong> {$core->getConstant('valutes', 'usd')}</span>
    <span class="item"><strong>EUR</strong> {$core->getConstant('valutes', 'eur')}</span>
</div>