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
                    <a href="/search">Поиск по сайту</a>
                    <a href="/sitemap">Карта сайта</a>
                </nav>
            </div>

            <div class="unit-75">
                Запрашиваемая вами страница не найдена. Возможно ее удалили, или же вы перешли по некорректной ссылке.
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