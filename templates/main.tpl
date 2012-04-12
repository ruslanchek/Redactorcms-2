<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        {include file="include/common/head.tpl"}
    </head>
    <body>
        <div id="wrapper">
            <div id="header" class="site_width_limiter menu_spacing">
                <a href="/" id="logo"></a>

                <form class="search_form" action="/search" method="get">
                    {literal}
                    <input class="search_text unactive" type="text" name="q" value="Поиск на сайте"
                           onblur="if(this.value == ''){this.value = 'Поиск на сайте'; this.className='search_text unactive'}"
                           onfocus="if(this.value == 'Поиск на сайте'){this.value = ''; this.className='search_text'}" />
                    <input class="search_go" type="submit" value="" title="Найти" />
                    {/literal}
                </form>

                {include file="include/common/user_block.tpl"}
            </div>

            <div id="content" class="site_width_limiter menu_spacing">
                {include file="include/common/left_side_menu.tpl"}

                {$core->page.content}

                <div class="clear"></div>
            </div>

            <script src="http://maps.google.com/maps/api/js?sensor=false"></script>

            <script>
                core.projects.init();
            </script>
        </div>

        <div id="footer" class="site_width_limiter menu_spacing">
            {include file="include/common/footer.tpl"}
        </div>
    </body>
</html>