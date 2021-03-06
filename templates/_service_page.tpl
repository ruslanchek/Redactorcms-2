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
        <h1>{$core->page.h1}</h1>
    </div>

    <div class="inner-content">
        <div class="units-row-end">
            <div class="unit-25">
                <nav class="nav-side">
                    <a href="/">Главная страница</a>
                    <a href="/search" {if $core->page.id == 50}class="active"{/if}>Поиск по сайту</a>
                    <a href="/sitemap" {if $core->page.id == 70}class="active"{/if}>Карта сайта</a>
                </nav>
            </div>

            <div class="unit-75">
                {$core->page.content}
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    {include file="include/common/footer.tpl"}
</footer>
</body>
</html>