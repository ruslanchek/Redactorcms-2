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

                <div id="load_place">
                    {$core->page.content}
                </div>

                <div class="clear"></div>
            </div>
        </div>

        <div id="footer" class="site_width_limiter menu_spacing">
            {include file="include/common/footer.tpl"}
        </div>

        {if $core->page.continuous}
        <script>
            core.loadItems.init('{$core->page.loading_url}');
        </script>
        {/if}
    </body>
</html>