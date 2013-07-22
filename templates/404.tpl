<!DOCTYPE html>
<html>
    <head>
        <title>Ошибка 404</title>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="страница не найдена" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="/resources/css/kube.css">
        <link rel="stylesheet" type="text/css" href="/resources/css/master.css">
        <link rel="stylesheet" type="text/css" href="/resources/css/halflings.css">

        <script type="text/javascript" src="/resources/js/jquery.js"></script>
        <script type="text/javascript" src="/resources/js/core.js"></script>

        {literal}
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script>
            var head = document.getElementsByTagName('head')[0], style = document.createElement('style');
            style.type = 'text/css';
            style.styleSheet.cssText = ':before,:after{content:none !important';
            head.appendChild(style);
            setTimeout(function(){ head.removeChild(style); }, 0);
        </script>
        <![endif]-->
        {/literal}

        {$core->getConstant('scripts', 'head_code')}
    </head>

    <body>
        {include file="include/common/header.tpl"}

        <div class="main-content limiter">
            <h1>
                Ошибка 404
            </h1>

            <p>Страница не найдена.</p>
            <p><a href="/">Вернуться на главную</a></p>
        </div>

        {include file="include/common/footer.tpl"}
    </body>
</html>