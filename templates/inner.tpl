<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        {include file="include/common/head.tpl"}
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <!-- Be sure to leave the brand out there if you want it shown -->
                    <a class="brand" href="/">Project name</a>

                    <!-- Everything you want hidden at 940px or less, place within here -->
                    <div class="nav-collapse">
                        {include file="include/common/main_menu.tpl"}
                        {include file="include/common/user_block.tpl"}
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="span3">
                    {include file="include/common/second_level_menu.tpl"}
                    {include file="include/common/news_short.tpl"}
                </div>
                <div class="span9">
                    {include file="include/common/breadcrumbs.tpl"}

                    <div class="page-header">
                        <h1>{$core->page.h1}</h1>
                    </div>

                    {$core->page.content}
                </div>
            </div>

            <hr />

            <footer>
                {include file="include/common/footer.tpl"}
            </footer>
        </div>
    </body>
</html>