<!DOCTYPE html>
<html>
<head>
    {include file="include/common/head.tpl"}

    <link href='//api.tiles.mapbox.com/mapbox.js/v1.5.0/mapbox.css' rel='stylesheet' />
    <script src='//api.tiles.mapbox.com/mapbox.js/v1.5.0/mapbox.js'></script>
</head>

<body>
<div class="limiter">
    <header class="header">
        {include file="include/common/header.tpl" mainpage=false}
    </header>

    <div class="page-banner pb-{rand(1, 5)}">
        <h1>{$core->page.h1}</h1>
    </div>

    <div class="inner-content">
        <div class="units-row-end">
            <div class="unit-66">
                <nav class="nav-tabs" data-toggle="tabs" data-height="equal">
                    <ul>
                        <li><a id="msk-tab" href="#MSK">Москва</a></li>
                        <li><a id="spb-tab" class="active" href="#SPB">Санкт-Перербург</a></li>
                        
                    </ul>
                </nav>

                <div id="SPB">
                    {$core->getPage(73)}
                </div>

                <div id="MSK">
                    {$core->getPage(114)}
                </div>
            </div>

            <div class="unit-33">
                <div class="form contacts-form" id="feedback-form-contacts">
                    <h2>Написать письмо</h2>

                    <div class="form-message"></div>

                    <form action="#" id="feedback-form">
                        <div class="form-items">
                            <input type="text" name="feedback_name" placeholder="Имя" />
                            <input type="email" name="feedback_email" placeholder="Электронная почта" />
                            <input type="tel" name="feedback_phone" placeholder="Телефон" />

                            <textarea name="feedback_message" rows="5" placeholder="Сообщение"></textarea>

                            <p><small>Все поля обязательны для заполнения</small></p>

                            <div class="submit-block">
                                <input class="button" type="submit" value="Отправить письмо" />
                            </div>
                        </div>
                    </form>
                </div>

                {*<br/>
                <img src="/resources/img/sdn-building.jpg" alt="Фасад">
                <em>Так выглядит наше здание</em>*}
            </div>
        </div>
    </div>
</div>

<div class="map" id="spb-map">
    <script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=k8kybgnBaK7IBIitcEy87s3uztJdDMbU&width=100%&height=450"></script>
</div>

<div class="map" style="display: none" id="msk-map">
    <script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=dZ-2ypScRi2atTk2_ftd54rxLPBs_EFI&width=100%&height=450"></script>
</div>

<script>
    $(function(){
        feedback.init();

        $('#spb-tab').on('click.map', function(){
            $('#spb-map').show();
            $('#msk-map').hide();
        });

        $('#msk-tab').on('click.map', function(){
            $('#msk-map').show();
            $('#spb-map').hide();
        });
    });
</script>

{include file="include/common/news-shortlist.tpl"}

<footer class="footer">
    {include file="include/common/footer.tpl"}
</footer>
</body>
</html>