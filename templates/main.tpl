<!DOCTYPE html>
<html>
<head>
    {include file=\\\"include/common/head.tpl\\\"}
</head>
<body>sss
<div class=\\\"wrapper\\\">
    <header class=\\\"header header-mainpage\\\">
        {include file=\\\"include/common/header.tpl\\\" mainpage=true}

        <div class=\\\"search\\\">
            <form action=\\\"/search\\\">
                <input type=\\\"text\\\" name=\\\"sq\\\" placeholder=\\\"Поиск\\\"/>
                <input class=\\\"btn\\\" type=\\\"submit\\\" value=\\\"Найти\\\"/>
            </form>
        </div>
    </header>

    {include file=\\\"include/common/slider.tpl\\\"}

    <div class=\\\"content\\\">
        <div class=\\\"units-row\\\">
            <div class=\\\"unit-80\\\">
                {$mainpage_text = $core->getPage(76)}

                {if $mainpage_text}
                    {$mainpage_text}
                    <hr>
                {/if}

                <h2 class=\\\"uppercase\\\">Каталог</h2>

                {include file=\\\"include/common/catalog-full-list.tpl\\\"}

                <hr>

                <h2 class=\\\"uppercase\\\">Производители</h2>

                {include file=\\\"include/common/makers-short.tpl\\\" items=$core->getMakers(16)}

                <br>

                <div class=\\\"text-centered\\\">
                    <a class=\\\"btn\\\" href=\\\"/makers\\\">Все производители</a>
                </div>

                <br>
                <br>
            </div>

            <div class=\\\"unit-20\\\">
                {include file=\\\"include/common/order.tpl\\\"}

                {include file=\\\"include/common/news-shortlist.tpl\\\"}
            </div>
        </div>
    </div>

    <footer class=\\\"footer\\\">
        {include file=\\\"include/common/footer.tpl\\\"}
    </footer>
</div>

{$core->getConstant(\\\'scripts\\\', \\\'body_code\\\')}

</body>
</html>