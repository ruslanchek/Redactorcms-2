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
</div>

<br/>

{include file="include/common/tariffs.tpl"}

{include file="include/common/news-shortlist.tpl"}

<footer class="footer">
    {include file="include/common/footer.tpl"}
</footer>
</body>
</html>