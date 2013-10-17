<!DOCTYPE html>
<html>
<head>
    {include file="include/common/head.tpl"}
</head>
<body>
<div class="wrapper">
    <header class="header header">
        {include file="include/common/header.tpl"}
    </header>

    <div class="content">
        {include file="include/common/breadcrumbs.tpl"}

        <div class="units-row">
            <div class="unit-40">
                <h1>{$core->page.h1}</h1>

                {$core->page.content}
            </div>

            <div class="unit-60">
                <div class="map-container" style="height: {$core->getConstant('yandex_maps', 'height')|escape}px">
                    <script type="text/javascript" charset="utf-8" src="{$core->getConstant('yandex_maps', 'src')|escape}&width={$core->getConstant('yandex_maps', 'width')|escape}&height={$core->getConstant('yandex_maps', 'height')|escape}"></script>
                </div>
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