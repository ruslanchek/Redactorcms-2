<!DOCTYPE html>
<html>
<head>
    {include file="include/common/head.tpl"}
</head>
<body>
<div class="wrapper">
    <header class="header">
        {include file="include/common/header.tpl"}
    </header>

    <div class="content">
        <div class="units-row">
            <div class="unit-80">
                {include file="include/common/breadcrumbs.tpl"}

                <h1>{$core->page.h1}</h1>

                {$core->page.content}
            </div>

            <div class="unit-20">
                {include file="include/common/order.tpl"}
            </div>
        </div>
    </div>

    <footer class="footer">
        {include file="include/common/footer.tpl"}
    </footer>
</div>

{$core->getConstant('scripts', 'body_code')}

</body>
</html>