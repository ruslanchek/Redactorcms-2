<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
    {include file="include/common/head.tpl"}

    <body>
        <div id="wrapper">
        {include file="include/common/top.tpl"}

        {include file="include/common/top_menu.tpl"}

            <div id="content">
                <div class="left_col">
                    {include file="include/common/left_side_menu.tpl"}

                    {include file="include/common/chart.tpl"}
                </div>

                <div class="right_col">
                    {include file="include/common/breadcrumbs.tpl"}

                    <div class="page-header">
                        <h1>{$core->page.h1}</h1>
                    </div>

                    <div class="content_c">
                        {include file="include/common/second_level_menu.tpl"}
                        {$core->page.content}
                    </div>
                </div>

                <div class="clear"></div>
            </div>
        </div>

        {include file="include/common/footer.tpl"}
    </body>
</html>