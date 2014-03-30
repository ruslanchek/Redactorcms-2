<!DOCTYPE html>
<html>
<head>
    {include file="include/common/head.tpl"}
</head>

<body>
<div class="limiter">
    <header class="header">
        {include file="include/common/header.tpl" mainpage=false}
    </header>

    <div class="page-banner pb-{rand(1, 5)}">
        {include file="include/common/breadcrumbs.tpl"}

        {$h1 = ""}

        {foreach $core->getInlineMenu(3, $pid) as $item}
            {if $item.id == $core->page.id}
                {$h1 = $item.name}
            {/if}
        {/foreach}

        {if $h1 == ''}
            {foreach $core->getInlineMenu(3, $pid) as $item}
                {if $item.id == $core->page.pid}
                    {$h1 = $item.name}
                {/if}
            {/foreach}
        {/if}

        <h1>{$h1}</h1>
    </div>

    <div class="inner-content">
        <div class="units-row-end">
            <div class="unit-25">
                <nav class="nav-side">
                    <a href="/market-press" {if $core->page.id == 17}class="active"{/if}>Маркет-пресс</a>
                    {include file="include/common/menu-second-level.tpl" pid=17}
                </nav>
            </div>

            <div class="unit-75">
                {$core->page.content}
            </div>
        </div>
    </div>
</div>

{include file="include/common/news-shortlist.tpl"}

<footer class="footer">
    {include file="include/common/footer.tpl"}
</footer>
</body>
</html>