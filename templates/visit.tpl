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
        <div class="form contacts-form" id="feedback-form-contacts">


            <form action="#" id="visit-client-form" class="forms forms-columnar">

                <div class="form-items">
                    <div class="units-row-end">
                        <div class="unit-50">
                            <h3>Компания</h3>
                            <p>
                                <label for="form_company">Компания <i class="req">*</i></label>
                                <input type="text" name="form_company" id="form_company" data-req="true"/>
                            </p>

                            <p>
                                <label for="form_doc">Номер договора <i class="req">*</i></label>
                                <input type="text" name="form_doc" id="form_doc" data-req="true"/>
                            </p>

                            <p>
                                <label for="form_sender_name">Ф.И.О. отправителя <i class="req">*</i></label>
                                <input type="text" name="form_sender_name" id="form_sender_name" data-req="true" />
                            </p>

                            <p>
                                <label for="form_email">E-mail <i class="req">*</i></label>
                                <input type="text" name="form_email" id="form_email" data-req="true" />
                            </p>
                        </div>

                        <div class="unit-50">
                            <h3>Автомобиль</h3>
                            <p>
                                <label for="form_car_make">Марка</label>
                                <input type="text" name="form_car_make" id="form_car_make" />
                            </p>

                            <p>
                                <label for="form_car_colour">Цвет</label>
                                <input type="text" name="form_car_colour" id="form_car_colour" />
                            </p>

                            <p>
                                <label for="form_car_id">Гос. номер</label>
                                <input type="text" name="form_car_id" id="form_car_id" />
                            </p>
                        </div>
                    </div>

                    <br/>
                    <br/>

                    <div class="units-row-end">
                        <div class="unit-50">
                            <h3>Посетитель 1</h3>
                            <p>
                                <label for="visitor_name_1">Ф.И.О. посетителя <i class="req">*</i></label>
                                <input type="text" name="visitor_name_1" id="visitor_name_1" data-req="true" />
                            </p>

                            <p>
                                <label for="visitor_word_1">Кодовое слово <i class="req">*</i></label>
                                <input type="text" name="visitor_word_1" id="visitor_word_1" data-req="true" />
                            </p>
                        </div>

                        <div class="unit-50">
                            <h3>Посетитель 2</h3>
                            <p>
                                <label for="visitor_name_2">Ф.И.О. посетителя</label>
                                <input type="text" name="visitor_name_2" id="visitor_name_2" />
                            </p>

                            <p>
                                <label for="visitor_word_2">Кодовое слово</label>
                                <input type="text" name="visitor_word_2" id="visitor_word_2" />
                            </p>
                        </div>
                    </div>

                    <br/>
                    <br/>

                    <div class="units-row-end">
                        <div class="unit-50">
                            <h3>Дата/время прибытия</h3>
                            <p>
                                <label for="form_date">Дата прибытия <i class="req">*</i></label>
                                <input type="text" name="form_date" id="form_date" data-req="true" />
                            </p>

                            <p>
                                <label for="form_time">Время прибытия <i class="req">*</i></label>
                                <input type="text" name="form_time" id="form_time" data-req="true"/>
                            </p>
                        </div>

                        <div class="unit-50">
                            <h3>Продолжительность работ</h3>
                            <p>
                                <label for="form_duration">Планируемая продолжительность работ в часах <i class="req">*</i></label>
                                <input type="text" name="form_duration" id="form_duration" data-req="true" />
                            </p>
                        </div>
                    </div>

                    <br/>
                    <br/>

                    <div class="units-row-end">
                        <div class="unit-50">
                            <h3>Вывоз оборудования</h3>
                            <p>
                                <label for="form_gear_in">Планируется вывоз оборудования</label>
                                <input class="stylish" type="checkbox" name="form_gear_in" id="form_gear_in" value="1" />
                            </p>

                            <p>
                                <label for="form_gear_in_count">Количество мест (упаковок)</label>
                                <input type="text" name="form_gear_in_count" id="form_gear_in_count" />
                            </p>
                        </div>

                        <div class="unit-50">
                            <h3>Ввоз оборудования</h3>
                            <p>
                                <label for="form_gear_out">Планируется ввоз оборудования</label>
                                <input class="stylish" type="checkbox" name="form_gear_out" id="form_gear_out" value="1" />
                            </p>

                            <p>
                                <label for="form_gear_out_count">Количество мест (упаковок)</label>
                                <input type="text" name="form_gear_out_count" id="form_gear_out_count" />
                            </p>
                        </div>
                    </div>

                    <br/>
                    <br/>

                    <h3>Дополнительно</h3>

                    <p>
                        <label for="form_message">Дополнительная информация</label>
                        <textarea class="width-100" style="width: 97%" name="form_message" id="form_message" rows="5" placeholder="Например: Необходимость порта для подключения; выделения IP-адреса; демонтаж сервера Клиента и перенос в Клиентскую комнату; переключения порта подключения оборудования Клиента в клиентскую комнату, предоставление IP KVM"></textarea>
                    </p>

                    <p><small><i class="req">*</i> Поля отмеченные звездочками &mdash; обязательны для заполнения</small></p>

                    <div class="submit-block">
                        <input class="button" style="width: 1000px" type="submit" value="Отправить заявку" />
                    </div>
                </div>

                <div class="form-message" style="margin: 0; width: auto"></div>
            </form>
        </div>
    </div>
</div>

{include file="include/common/news-shortlist.tpl"}

<script>
    $(function(){
        visit_clients.init();
    });
</script>

<footer class="footer">
    {include file="include/common/footer.tpl"}
</footer>
</body>
</html>