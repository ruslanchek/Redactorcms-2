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
                    <span class="brand">Project name</span>

                    <!-- Everything you want hidden at 940px or less, place within here -->
                    <div class="nav-collapse">
                        {include file="include/common/main_menu.tpl"}
                        {include file="include/common/user_block.tpl"}
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="hero-unit">
                <h1>Heading</h1>
                    <p>Tagline</p>
                    <p>
                        <a class="btn btn-primary btn-large">
                        <Lea></Lea>rn more
                    </a>
                </p>
            </div>
            {$core->page.content}

            <div class="row">
                {$last_n = $core->getLastNewsItemsData(4)}

                {if $last_n}
                    {foreach $last_n as $item}
                    <div class="span3">
                        <h3>{$item.name}</h3>
                        <em>{$item.date|date:"datetime"}</em>
                        {$item.announce}
                        <a class="btn" href="/news/?item={$item.id}">Читать далее</a>
                    </div>
                    {/foreach}
                {/if}
            </div>

            <hr />

            <footer>
                {include file="include/common/footer.tpl"}
            </footer>
        </div>
    </body>
</html>