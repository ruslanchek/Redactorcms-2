<!DOCTYPE html>
<html>
    {include file="include/common/head.tpl"}

    <body>
        {include file="include/common/header.tpl"}

        <div class="main-content limiter">
            <div class="row">
                <div class="twothird">
                    {include file="include/common/breadcrumbs.tpl"}

                    <h1>{$core->page.h1}</h1>
                    <hr>

                    {$core->page.content}
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