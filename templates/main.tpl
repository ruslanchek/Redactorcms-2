<!DOCTYPE html>
<html>
    {include file="include/common/head.tpl"}

    <body>
        <header class="header-mainpage">
            <div class="inner-block limiter">
                <div class="top">
                    <span class="logo"></span>

                    {include file="include/common/header-phone.tpl"}
                    {include file="include/common/main_menu.tpl"}
                </div>

                {include file="include/common/slider.tpl"}

                <div class="row">
                    <div class="threefifth centered text-centered">
                        {$core->getPage(67)}
                    </div>
                </div>
            </div>
        </header>

        <div class="main-content limiter">
            <div class="row">
                <div class="third">
                    {$core->getPage(65)}
                </div>

                <div class="third">
                    {$core->getPage(66)}
                </div>

                <div class="third">
                    {include file="include/common/price-demand.tpl"}
                    {include file="include/common/events-shortlist.tpl"}
                    {include file="include/common/news-shortlist.tpl"}
                </div>
            </div>
        </div>

        {include file="include/common/footer.tpl"}
    </body>
</html>