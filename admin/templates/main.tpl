<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title>{$main->title}</title>

        <link rel="shortcut icon" type="image/x-icon" href="/admin/img/icons/favicon.ico">

        {foreach from=$main->addition_css item=item}
        <link rel="stylesheet" type="text/css" href="{$item}" media="all" />
        {/foreach}

        <link rel="stylesheet" type="text/css" href="/admin/css/style.css" media="all" />

        <script type="text/javascript" src="/admin/js/jquery.js"></script>
        <script type="text/javascript" src="/admin/js/color_animation.js"></script>
        <script type="text/javascript" src="/admin/js/extends.js"></script>
        <script type="text/javascript" src="/admin/js/cookie.js"></script>
        <script type="text/javascript" src="/admin/js/ui.js"></script>

        {foreach from=$main->addition_js item=item}
        <script type="text/javascript" src="{$item}"></script>
        {/foreach}

        <script type="text/javascript" src="/admin/js/actions.js"></script>
    </head>

    <body>
        <div id="wrapper">
            <header id="header">
                {include file="inc.top.tpl"}
                {include file="inc.top_menu.tpl"}
            </header>

            <div id="content" class="overall_padding">
                {assign var="module_name" value=$main->module_name}
                {include file="modules/$module_name.tpl"}
            </div>
        </div>

        <footer id="footer">
            <div class="overall_padding">
                {include file="inc.footer.tpl"}
            </div>
        </footer>
    </body>
</html>