var feedback = {
    closeWindow: function () {
        $('body').off('keyup');
        $('.feedback-window .close').off('click');

        $('.feedback-window').animate({
            top: '-100%'
        }, 600, function () {
            $('.feedback-window').remove();
        });
    },

    formActions: function () {
        $('#feedback-form').off('submit').on('submit', function (e) {
            e.preventDefault();

            var data = {
                contacts: $('#email').val(),
                message: $('#message').val(),
                name: $('#name').val()
            };

            $.ajax({
                url: '/send.php',
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function (data) {
                    if (data.status) {
                        $('#feedback-form').hide(200);
                        $('.feedback_message').html('<div id="ok_message"><b>' + data.message + '</b></div>');
                    } else {
                        $('.feedback_message').html('<div id="error_message"><b>' + data.message + '</b></div>');
                    }
                    ;
                },
                error: function () {
                    $('.feedback_message').html('<div id="error_message"><b>Ошибка передачи данных!</b></div>');
                }
            });
        });
    },

    openWindow: function () {
        this.closeWindow();
        request.closeWindow();
        callme.closeWindow();

        var html = '<div class="feedback-window">' +
            '<a class="close btn" href="javascript:void(0)">X</a>' +
            '<h2>Разместить заявку</h2>' +

            '<hr>' +

            '<div class="feedback_message"></div>' +

            '<form method="post" action="" id="feedback-form" class="forms">' +
            '<fieldset class="liner">' +
            '<ul>' +
            '<li>' +
            '<label for="name" class="bold">Имя</label>' +
            '<input class="width-100" type="text" name="name" id="name">' +
            '</li>' +

            '<li>' +
            '<label for="email" class="bold">Контактная информация</label>' +
            '<input type="email" name="email" class="width-100" id="email">' +
            '<div class="descr">Телефон или e-mail</div>' +
            '</li>' +

            '<li>' +
            '<label for="message" class="bold">Вопрос или пожелание</label>' +
            '<textarea id="message" name="message" class="width-100" style="height: 100px;"></textarea>' +
            '</li>' +

            '<li>' +
            '<input type="submit" class="button button-orange" value="Отправить">' +
            '</li>' +
            '</ul>' +
            '</fieldset>' +
            '</form>' +
            '</div>';

        $('body').prepend(html);

        this.formActions();

        $('body').off().on('keyup', function (e) {
            if (e.keyCode == 27) {
                feedback.closeWindow();
            }
        });

        $('.feedback-window').show();

        $('.feedback-window').animate({
            top: '50%',
            marginTop: '-' + ($('.feedback-window').height() / 2) - 20 + 'px'
        }, 600);

        $('.feedback-window .close').on('click', function (e) {
            e.preventDefault();
            feedback.closeWindow();
        });
    },

    binds: function () {
        $('#feedback-opener').on('click', function (e) {
            e.preventDefault();

            if ($('.feedback-window').length > 0) {
                feedback.closeWindow();
            } else {
                feedback.openWindow();
            }
        });

        if (document.location.hash == '#feedback') {
            this.openWindow();
        }
    },

    init: function () {
        this.binds();
    }
};

var request = {
    closeWindow: function () {
        $('body').off('keyup');
        $('.request-window .close').off('click');

        $('.request-window').animate({
            top: '-100%'
        }, 600, function () {
            $('.request-window').remove();
        });
    },

    formActions: function () {
        $('#request-form').off('submit').on('submit', function (e) {
            e.preventDefault();

            var data = {
                email: $('#email').val(),
                name: $('#name').val(),
                type: $('input[type="radio"]:checked').val()
            };

            $.ajax({
                url: '/?ajax&action=priceDemand',
                type: 'POST',
                data: data,
                success: function (data) {
                    if (data == 'true') {
                        $('#request-form').hide(200);
                        $('.request_message').html('<div id="ok_message"><b>Спасибо за обращение, ожидайте письмо с прайс-листом</b></div>');
                    }else{
                        $('.request_message').html('<div id="error_message"><b>Ошибка передачи данных!</b></div>');
                    }
                },
                error: function () {
                    $('.request_message').html('<div id="error_message"><b>Ошибка передачи данных!</b></div>');
                }
            });
        });
    },

    openWindow: function () {
        this.closeWindow();
        feedback.closeWindow();
        callme.closeWindow();

        var html = '<div class="request-window">' +
            '<a class="close btn" href="javascript:void(0)">X</a>' +
            '<h2>Форма заказа прайс-листа</h2>' +

            '<hr>' +

            '<div class="request_message"></div>' +

            '<form method="post" action="" id="request-form" class="forms">' +
            '<fieldset class="liner">' +
            '<ul>' +
            '<li>' +
            '<label for="name" class="bold">Имя</label>' +
            '<input class="width-100" type="text" name="name" id="name">' +
            '</li>' +

            '<li>' +
            '<label for="email" class="bold">E-mail</label>' +
            '<input type="email" name="email" class="width-100" id="email">' +
            '</li>' +

            '<li>' +
            '<label class="bold">Категория</label>' +
            '<label><input type="radio" name="type" value="1" id="type1" checked> Кабель</label>' +
            '<label><input type="radio" name="type" value="2" id="type2"> Металлопрокат</label>' +
            '</li>' +

            '<li>' +
            '<input type="submit" class="button button-orange" value="Отправить">' +
            '</li>' +
            '</ul>' +
            '</fieldset>' +
            '</form>' +
            '</div>';

        $('body').prepend(html);

        this.formActions();

        $('body').off().on('keyup', function (e) {
            if (e.keyCode == 27) {
                request.closeWindow();
            }
        });

        $('.request-window').show();

        $('.request-window').animate({
            top: '50%',
            marginTop: '-' + ($('.request-window').height() / 2) - 20 + 'px'
        }, 600);

        $('.request-window .close').on('click', function (e) {
            e.preventDefault();
            request.closeWindow();
        });
    },

    binds: function () {
        $('#request-opener').on('click', function (e) {
            e.preventDefault();

            if ($('.request-window').length > 0) {
                request.closeWindow();
            } else {
                request.openWindow();
            }
        });
    },

    init: function () {
        this.binds();
    }
};

var callme = {
    closeWindow: function () {
        $('body').off('keyup');
        $('.call-me-window .close').off('click');

        $('.call-me-window').animate({
            top: '-100%'
        }, 600, function () {
            $('.call-me-window').remove();
        });
    },

    formActions: function () {
        $('#call-me-form').off('submit').on('submit', function (e) {
            e.preventDefault();

            var data = {
                phone: $('#phone').val(),
                reason: $('#reason').val(),
                name: $('#name').val(),
                when: $('#when').val(),
                from: $('#from').val(),
                to: $('#to').val()
            };

            $.ajax({
                url: '/send_callme.php',
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function (data) {
                    if (data.status) {
                        $('#call-me-form').hide(200);
                        $('.feedback_message').html('<div id="ok_message"><b>' + data.message + '</b></div>');
                    } else {
                        $('.feedback_message').html('<div id="error_message"><b>' + data.message + '</b></div>');
                    }
                },
                error: function () {
                    $('.feedback_message').html('<div id="error_message"><b>Ошибка передачи данных!</b></div>');
                }
            });
        });
    },

    openWindow: function () {
        feedback.closeWindow();
        request.closeWindow();
        this.closeWindow();

        var html = '<div class="call-me-window">' +
            '<a class="close btn" href="javascript:void(0)">X</a>' +
            '<h2>Заказать обратный звонок</h2>' +

            '<hr>' +

            '<div class="feedback_message"></div>' +

            '<form method="post" action="" id="call-me-form" class="forms">' +
            '<fieldset class="liner">' +
            '<ul>' +
            '<li>' +
            '<label for="name" class="bold">Имя</label>' +
            '<input class="width-100" type="text" name="name" id="name">' +
            '</li>' +

            '<li>' +
            '<label for="name" class="bold">Телефон</label>' +
            '<input class="width-100" type="text" name="phone" id="phone">' +
            '</li>' +

            '<div class="row">' +

            '<div class="twothird">' +
            '<ul class="multicolumn">' +
            '<label for="when" class="bold">Когда вам позвонить?</label>' +
            '<li>' +
            '<select name="when" id="when">' +
            '<option value="0">Сегодня</option>' +
            '<option value="1">Завтра</option>' +
            '<option value="2">Послезавтра</option>' +
            '</select>' +
            '</li>' +
            '<li>' +
            'С <select name="from" id="from">' +
            '<option>10:00</option>' +
            '<option>11:00</option>' +
            '<option>12:00</option>' +
            '<option>13:00</option>' +
            '<option>14:00</option>' +
            '<option>15:00</option>' +
            '<option>16:00</option>' +
            '<option>17:00</option>' +
            '<option>18:00</option>' +
            '<option>19:00</option>' +
            '</select>' +
            '</li>' +
            '<li>' +
            'До <select name="to" id="to">' +
            '<option>11:00</option>' +
            '<option>12:00</option>' +
            '<option>13:00</option>' +
            '<option>14:00</option>' +
            '<option>15:00</option>' +
            '<option>16:00</option>' +
            '<option>17:00</option>' +
            '<option>18:00</option>' +
            '<option>19:00</option>' +
            '<option selected>20:00</option>' +
            '</select>' +
            '</li>' +
            '</ul>' +
            '</div>' +
            '</div>' +

            '<li>' +
            '<input type="submit" class="button button-orange" value="Отправить">' +
            '</li>' +
            '</ul>' +
            '</fieldset>' +
            '</form>' +
            '</div>';

        $('body').prepend(html);

        this.formActions();

        $('body').off().on('keyup', function (e) {
            if (e.keyCode == 27) {
                callme.closeWindow();
            }
        });

        $('.call-me-window').show();

        $('.call-me-window').animate({
            top: '50%',
            marginTop: '-' + ($('.call-me-window').height() / 2) - 20 + 'px'
        }, 600);

        $('.call-me-window .close').on('click', function (e) {
            e.preventDefault();
            callme.closeWindow();
        });
    },

    binds: function () {
        $('#call-me-opener').on('click', function (e) {
            e.preventDefault();

            if ($('.call-me-window').length > 0) {
                callme.closeWindow();
            } else {
                callme.openWindow();
            }
        });

        if (document.location.hash == '#call-me') {
            this.openWindow();
        }
    },

    init: function () {
        this.binds();
    }
};

var slider = {
    item_width: 0,
    items_count: 0,
    overlall_width: 0,
    num: 1,
    interval: null,
    interval_delay: 6500,

    slideTo: function(num){

        this.num = parseInt(num);

        $('.slider .items-container').stop().animate({
            marginLeft: -slider.item_width * (slider.num - 1)
        }, 500, function(){
            $('.slider .item').removeClass('active');
            $('.slider .item[data-num="'+num+'"]').addClass('active');

            $('.slider .pagination a').removeClass('active');
            $('.slider .pagination a[data-num="'+num+'"]').addClass('active');
        });
    },

    slideLeft: function(){
        var n = this.num - 1;

        if(n < 1){
            n = this.items_count - 1;
        }

        this.slideTo(n);
    },

    slideRight: function(){
        var n = this.num + 1;

        if(n > this.items_count){
            n = 1
        }

        this.slideTo(n);
    },

    startInt: function(){
        if(this.interval){
            clearInterval(this.interval);
        }

        this.interval = setInterval(function(){
            slider.slideRight();
        }, this.interval_delay);
    },

    clearInt: function(){
        clearInterval(this.interval);
    },

    drawPagination: function(){
        if(this.items_count > 1){
            var html = '', i = 0;

            while(i < this.items_count){
                html += '<a href="#" data-num="'+(i + 1)+'" class="transform-linear-500' + ((i + 1 == 1) ? ' active' : '') +'"></a>';
                i++;
            }

            $('.slider .pagination').html(html);
            $('.slider .pagination a').on('click', function(e){
                slider.slideTo($(this).data('num'));
                e.preventDefault();
            });
        }
    },

    setSizes: function(){
        this.item_width     = $('.slider').width();
        this.overall_width  = (this.items_count * this.item_width) + this.items_count;

        var $itemsholder = $('.slider .items-container');

        $itemsholder.css({
            width: this.overall_width
        });

        $itemsholder.css({
            marginLeft: -slider.item_width * (slider.num - 1)
        });
    },

    init: function(){
        this.items_count = $('.slider .item').length;

        this.drawPagination();
        this.setSizes();
        this.startInt();

        $('.slider').on('mouseenter', function(){
            slider.clearInt();
        }).on('mouseleave', function(){
            slider.startInt();
        });
    }
};

$(function(){
    slider.init();
    feedback.init();
    callme.init();
    request.init();
});