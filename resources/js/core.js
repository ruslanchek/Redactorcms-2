var slider = {
	delay: 8000,
	interval: null,
	current: 0,
	total: 0,

	next: function () {
		var next;
		
		if(this.current + 1 <= this.total){
			next = this.current + 1;
		}else{
			next = 1;
		}
		
		this.goTo(next);
	},
	
	goTo: function (id) {
		if(id === this.current){
			return;
		}
	
		this.pause();
	
		$('.slider .pager a').removeClass('active');
		$('.slider .pager a[data-id="' + id + '"]').addClass('active');
		
		$next = $('.slider .slide[data-id="' + id + '"]');
		$prev = $('.slider .slide.active');
		
		$('.slider .slide').css({
			zIndex: 1
		});
		
		$next.css({
			zIndex: 3
		});
		
		$next.fadeIn(500, function() {
			$prev.removeClass('active').fadeOut(300);
			$next.addClass('active');
			slider.start();
		});
		
		this.current = id;
	},
	
	start: function () {
        this.pause();
        this.interval = setInterval(function () {
            slider.next();
        }, this.delay);
    },

    pause: function () {
        clearInterval(this.interval);
    },
	
	init: function() {
		this.start();
		this.total = $('.slider .slide').length;
		
		$('.slider').on('mouseenter', function () {
            slider.pause();
        });

        $('.slider').on('mouseleave', function () {
            slider.start();
        });
        
        $('.slider .pager a').on('click', function (e) {
        	slider.goTo($(this).data('id'));
        
        	e.preventDefault();
        });
        
        $('.slider .slide').on('click', function () {
        	document.location.href = $(this).data('gourl');
        });
	}
}

var map = {
	map: null,
	
	init: function () {
		this.map = L.mapbox.map('map', 'stackdatanetwork.ge2hgiko', {scrollWheelZoom: false}).setView([60.073932214200794, 30.252914428710938], 10);
	}
}

var main_menu = {
	init: function () {
		$('nav.main span.item').hover(function(){
			$(this).find('nav.sub').slideDown(125);
			$(this).find('>a').addClass('active');
		}, function(){
			$(this).find('nav.sub').fadeOut(75);
			$(this).find('>a').removeClass('active');
		});
	}
};


var tariffs = {
    selectGroup: function (id) {

    },

    order: function(name) {
        order.openWindow(name);
    },

    init: function () {
        $('.tariffs .tariff-col').hover(function () {
            $('.tariffs .blue').addClass('hover');
        }, function () {
            $('.tariffs .blue').removeClass('hover');
        });

        $('.tariff-order').on('click', function (e) {
            var name = $(this).data('tariff');

            tariffs.order(name);

            e.preventDefault();
        });

        $('.tariffs nav a.item').on('click', function(e) {
            tariffs.selectGroup($(this).data('id'));

            $('.tariffs nav a.item').removeClass('active');
            $(this).addClass('active');

            $('.tariffs .groups .group').removeClass('active');
            $('.tariffs .groups .group[data-id="' + $(this).data('id') + '"]').addClass('active');

            e.preventDefault();
        });
    }
}

var callme = {
    closeWindow: function () {
        $('body').off('keyup');
        $('.close-window').off('click');

        $('.window').animate({
            top: '-100%'
        }, 600, function () {
            $('.overlay').fadeOut();
            $('.window').remove();
        });
    },

    formActions: function () {
        $('.window form').off('submit').on('submit', function (e) {
            e.preventDefault();

            var data = {
                phone: $('.window input[name="phone"]').val(),
                name: $('.window  input[name="name"]').val(),
                when: $('.window  select[name="when"]').val(),
                from: $('.window  select[name="from"]').val(),
                to: $('.window  select[name="to"]').val()
            };

            $.ajax({
                url: '/send_callme.php',
                type: 'POST',
                dataType: 'json',
                data: data,
                beforeSend: function(){
                    $('.window .form-message').removeClass('success error').slideUp(100);
                    $('.window input[type="submit"]').attr('disabled', 'disabled').prop('disabled', 'disabled');
                },
                success: function (data) {
                    if (data.status) {
                        $('.window .form-items').slideUp(200);
                        $('.window .form-message').addClass('success').html(data.message).slideDown(100);
                        $('.window .content').css({
                            padding: '20px 20px 0',
                            height: 0
                        });

                        setTimeout(function(){
                            callme.closeWindow();
                        }, 1000);
                    } else {
                        $('.window .form-message').addClass('error').html(data.message).slideDown(100);
                        $('.window input[type="submit"]').removeAttr('disabled').removeProp('disabled', 'disabled');
                    }
                },
                error: function () {
                    $('.window .form-message').addClass('error').html('Ошибка сервера!').slideDown(100);
                    $('.window input[type="submit"]').removeAttr('disabled').removeProp('disabled', 'disabled');
                }
            });
        });
    },

    openWindow: function () {
        this.closeWindow();
        order.closeWindow();
        visit.closeWindow();

        var html = '<div class="overlay"></div>' +
            '<div class="window">' +
            '<div class="head">' +
            '<h1>Заказ обратного звонка</h1>' +
            '<a class="close-window" href="#">Закрыть <span class="close"></span></a>' +
            '</div>' +

            '<div class="content">' +
            '<form action="">' +
            '<div class="form-message"></div>' +

            '<div class="form-items">'+
            '<input type="text" placeholder="Имя" name="name" />' +
            '<input type="tel" placeholder="Телефон" name="phone">' +

            '<div class="units-row">' +
            '<div class="unit-30 color-gray-light">' +
            'Когда<br>' +
            '<select name="when" id="when">' +
            '<option value="0">Сегодня</option>' +
            '<option value="1">Завтра</option>' +
            '<option value="2">Послезавтра</option>' +
            '</select>' +
            '</div>' +


            '<div class="unit-20 color-gray-light">' +
            'С<br><select name="from">' +
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
            '</div>' +

            '<div class="unit-30 color-gray-light">' +
            'До<br><select name="to">' +
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
            '</div>' +
            '</div>' +

            '<small>Все поля обязательны для заполнения</small>' +

            '<input class="button" type="submit" value="Отправить заявку" />' +
            '</div>'+
            '</form>' +
            '</div>' +
            '</div>';

        $('body').prepend(html);

        $('input[type="tel"]').mask("+7 (999) 999-99-99");

        this.formActions();

        $('body').off().on('keyup', function (e) {
            if (e.keyCode == 27) {
                callme.closeWindow();
            }
        });

        $('.window').show().animate({
            opacity: 1,
            top: '50%',
            marginTop: '-' + ($('.window').height() / 2) - 20 + 'px'
        }, 600);

        $('.window .close-window').on('click', function (e) {
            e.preventDefault();
            callme.closeWindow();
        });
    },

    binds: function () {
        $('.call-me-opener').on('click', function (e) {
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

var order = {
    closeWindow: function () {
        $('body').off('keyup');
        $('.close-window').off('click');

        $('.window').animate({
            top: '-100%'
        }, 600, function () {
            $('.overlay').fadeOut();
            $('.window').remove();
        });
    },

    formActions: function () {
        $('.window form').off('submit').on('submit', function (e) {
            e.preventDefault();

            var data = {
                phone: $('.window input[name="phone"]').val(),
                name: $('.window  input[name="name"]').val(),
                email: $('.window  input[name="email"]').val(),
                tariff: $('.window  input[name="tariff"]').val()
            };

            $.ajax({
                url: '/send_order.php',
                type: 'POST',
                dataType: 'json',
                data: data,
                beforeSend: function(){
                    $('.window .form-message').removeClass('success error').slideUp(100);
                    $('.window input[type="submit"]').attr('disabled', 'disabled').prop('disabled', 'disabled');
                },
                success: function (data) {
                    if (data.status) {
                        $('.window .form-items').slideUp(200);
                        $('.window .form-message').addClass('success').html(data.message).slideDown(100);
                        $('.window .content').css({
                            padding: '20px 20px 0',
                            height: 0
                        });

                        setTimeout(function(){
                            order.closeWindow();
                        }, 1000);
                    } else {
                        $('.window .form-message').addClass('error').html(data.message).slideDown(100);
                        $('.window input[type="submit"]').removeAttr('disabled').removeProp('disabled', 'disabled');
                    }
                },
                error: function () {
                    $('.window .form-message').addClass('error').html('Ошибка сервера!').slideDown(100);
                    $('.window input[type="submit"]').removeAttr('disabled').removeProp('disabled', 'disabled');
                }
            });
        });
    },

    openWindow: function (tariff) {
        callme.closeWindow();
        visit.closeWindow();

        var html = '<div class="overlay"></div>' +

            '<div class="window">' +
            '<div class="head">' +
            '<h1>Заказ тарифа</h1>' +
            '<a class="close-window" href="#">Закрыть <span class="close"></span></a>' +
            '</div>' +

            '<div class="content">' +
            '<form action="">' +
            '<div class="form-message"></div>' +

            '<div class="form-items">'+
            '<input type="text" placeholder="Имя" name="name" />' +

            '<div class="units-row-end">' +
            '<div class="unit-50">' +
            '<input type="tel" placeholder="Телефон" name="phone">' +
            '</div>' +

            '<div class="unit-50">' +
            '<input type="email" placeholder="E-mail" name="email">' +
            '</div>' +
            '</div>' +

            '<input type="text" readonly placeholder="Тариф" name="tariff" value="' + tariff + '" />' +

            '<small>Все поля обязательны для заполнения</small>' +

            '<input class="button" type="submit" value="Заказать" />' +
            '</div>'+
            '</form>' +
            '</div>' +
            '</div>';

        $('body').prepend(html);

        $('input[type="tel"]').mask("+7 (999) 999-99-99");

        this.formActions();

        $('body').off().on('keyup', function (e) {
            if (e.keyCode == 27) {
                order.closeWindow();
            }
        });

        $('.window').show().animate({
            opacity: 1,
            top: '50%',
            marginTop: '-' + ($('.window').height() / 2) - 20 + 'px'
        }, 600);

        $('.window .close-window').on('click', function (e) {
            e.preventDefault();
            order.closeWindow();
        });
    },

    init: function () {
        this.binds();
    }
};

var visit = {
    closeWindow: function () {
        $('body').off('keyup');
        $('.close-window').off('click');

        $('.window').animate({
            top: '-100%'
        }, 600, function () {
            $('.overlay').fadeOut();
            $('.window').remove();
        });
    },

    formActions: function () {
        $('.window form').off('submit').on('submit', function (e) {
            e.preventDefault();

            var data = {
                phone: $('.window input[name="phone"]').val(),
                name: $('.window  input[name="name"]').val(),
                email: $('.window  input[name="email"]').val(),
                message: $('.window  textarea[name="message"]').val()
            };

            $.ajax({
                url: '/send_visit.php',
                type: 'POST',
                dataType: 'json',
                data: data,
                beforeSend: function(){
                    $('.window .form-message').removeClass('success error').slideUp(100);
                    $('.window input[type="submit"]').attr('disabled', 'disabled').prop('disabled', 'disabled');
                },
                success: function (data) {
                    if (data.status) {
                        $('.window .form-items').slideUp(200);
                        $('.window .form-message').addClass('success').html(data.message).slideDown(100);
                        $('.window .content').css({
                            padding: '20px 20px 0',
                            height: 0
                        });

                        setTimeout(function(){
                            visit.closeWindow();
                        }, 1000);
                    } else {
                        $('.window .form-message').addClass('error').html(data.message).slideDown(100);
                        $('.window input[type="submit"]').removeAttr('disabled').removeProp('disabled', 'disabled');
                    }
                },
                error: function () {
                    $('.window .form-message').addClass('error').html('Ошибка сервера!').slideDown(100);
                    $('.window input[type="submit"]').removeAttr('disabled').removeProp('disabled', 'disabled');
                }
            });
        });
    },

    openWindow: function () {
        callme.closeWindow();
        order.closeWindow();

        var html = '<div class="overlay"></div>' +

                    '<div class="window">' +
                        '<div class="head">' +
                            '<h1>Запись на посещение датацентра</h1>' +
                            '<a class="close-window" href="#">Закрыть <span class="close"></span></a>' +
                        '</div>' +

                        '<div class="content">' +
                            '<form action="">' +
                                '<div class="form-message"></div>' +

                                '<div class="form-items">'+
                                    '<input type="text" placeholder="Имя" name="name" />' +

                                    '<div class="units-row-end">' +
                                        '<div class="unit-50">' +
                                            '<input type="tel" placeholder="Телефон" name="phone">' +
                                        '</div>' +

                                        '<div class="unit-50">' +
                                            '<input type="email" placeholder="E-mail" name="email">' +
                                        '</div>' +
                                    '</div>' +

                                    '<textarea name="message">Здравствуйте, я хотел бы записаться на экскурсию в МДЦ СДН</textarea>'+

                                    '<small>Все поля обязательны для заполнения</small>' +

                                    '<input class="button" type="submit" value="Отправить заявку" />' +
                                '</div>'+
                            '</form>' +
                        '</div>' +
                    '</div>';

        $('body').prepend(html);

        $('input[type="tel"]').mask("+7 (999) 999-99-99");

        this.formActions();

        $('body').off().on('keyup', function (e) {
            if (e.keyCode == 27) {
                visit.closeWindow();
            }
        });

        $('.window').show().animate({
            opacity: 1,
            top: '50%',
            marginTop: '-' + ($('.window').height() / 2) - 20 + 'px'
        }, 600);

        $('.window .close-window').on('click', function (e) {
            e.preventDefault();
            visit.closeWindow();
        });
    },

    binds: function () {
        $('.visit-opener').on('click', function (e) {
            e.preventDefault();
            visit.openWindow();
        });
    },

    init: function () {
        this.binds();
    }
};

var feedback_window = {
    closeWindow: function () {
        $('body').off('keyup');
        $('.close-window').off('click');

        $('.window').animate({
            top: '-100%'
        }, 600, function () {
            $('.overlay').fadeOut();
            $('.window').remove();
        });
    },

    formActions: function () {
        $('.window form').off('submit').on('submit', function (e) {
            e.preventDefault();

            var data = {
                phone: $('.window input[name="phone"]').val(),
                name: $('.window  input[name="name"]').val(),
                email: $('.window  input[name="email"]').val(),
                message: $('.window  textarea[name="message"]').val()
            };

            $.ajax({
                url: '/send.php',
                type: 'POST',
                dataType: 'json',
                data: data,
                beforeSend: function(){
                    $('.window .form-message').removeClass('success error').slideUp(100);
                    $('.window input[type="submit"]').attr('disabled', 'disabled').prop('disabled', 'disabled');
                },
                success: function (data) {
                    if (data.status) {
                        $('.window .form-items').slideUp(200);
                        $('.window .form-message').addClass('success').html(data.message).slideDown(100);
                        $('.window .content').css({
                            padding: '20px 20px 0',
                            height: 0
                        });

                        setTimeout(function(){
                            visit.closeWindow();
                        }, 1000);
                    } else {
                        $('.window .form-message').addClass('error').html(data.message).slideDown(100);
                        $('.window input[type="submit"]').removeAttr('disabled').removeProp('disabled', 'disabled');
                    }
                },
                error: function () {
                    $('.window .form-message').addClass('error').html('Ошибка сервера!').slideDown(100);
                    $('.window input[type="submit"]').removeAttr('disabled').removeProp('disabled', 'disabled');
                }
            });
        });
    },

    openWindow: function () {
        callme.closeWindow();
        order.closeWindow();

        var html = '<div class="overlay"></div>' +

            '<div class="window">' +
            '<div class="head">' +
            '<h1>Письмо</h1>' +
            '<a class="close-window" href="#">Закрыть <span class="close"></span></a>' +
            '</div>' +

            '<div class="content">' +
            '<form action="">' +
            '<div class="form-message"></div>' +

            '<div class="form-items">'+
            '<input type="text" placeholder="Имя" name="name" />' +

            '<div class="units-row-end">' +
            '<div class="unit-50">' +
            '<input type="tel" placeholder="Телефон" name="phone">' +
            '</div>' +

            '<div class="unit-50">' +
            '<input type="email" placeholder="E-mail" name="email">' +
            '</div>' +
            '</div>' +

            '<textarea name="message" placeholder="Сообщение"></textarea>'+

            '<small>Все поля обязательны для заполнения</small>' +

            '<input class="button" type="submit" value="Отправить" />' +
            '</div>'+
            '</form>' +
            '</div>' +
            '</div>';

        $('body').prepend(html);

        $('input[type="tel"]').mask("+7 (999) 999-99-99");

        this.formActions();

        $('body').off().on('keyup', function (e) {
            if (e.keyCode == 27) {
                feedback_window.closeWindow();
            }
        });

        $('.window').show().animate({
            opacity: 1,
            top: '50%',
            marginTop: '-' + ($('.window').height() / 2) - 20 + 'px'
        }, 600);

        $('.window .close-window').on('click', function (e) {
            e.preventDefault();
            feedback_window.closeWindow();
        });
    },

    binds: function () {
        $('.feedback-opener').on('click', function (e) {
            e.preventDefault();
            feedback_window.openWindow();
        });
    },

    init: function () {
        this.binds();
    }
};

var visit_clients = {
    formProcessing: function(){
        var data = {},
            $form = $('form#visit-client-form');

        $form.find('input[type="text"], input[type="email"], input[type="tel"], input[type="checkbox"], textarea').each(function(){
            if($(this).attr('type') == 'checkbox'){
                if($(this).prop('checked') == true){
                    data[$(this).attr('name')] = '1';
                }else{
                    data[$(this).attr('name')] = '0';
                }
            }else{
                data[$(this).attr('name')] = $(this).val();
            }

            //output += 'if($' + $(this).attr('name') + ' && $' + $(this).attr('name') + ' != \'\'){ $message .= \'<p><b>' + $(this).prev().text() + "</b>: ' . " + $(this).attr('name') + " . '</p>'; };\n";
        });

        //console.log(output)

        $.ajax({
            url: '/?ajax&action=visit',
            data: data,
            type: 'POST',
            beforeSend: function(){
                $form.find('.form-message').slideUp(100);
                $form.find('input[type="submit"]').attr('disabled', 'disabled');
                $form.find('input, textarea').removeClass('input-error');
            },
            success: function(data){
                var classname = '',
                    message = '';

                if(data.status == true){
                    classname = 'success';
                    message = 'Спасибо, заявка принята!';
                    $form.find('.form-items').hide();
                }else{
                    classname = 'error';
                    message = 'Проверьте правильность заполнения формы';
                }

                if(data.fields.length > 0){
                    for(var i = 0, l = data.fields.length; i < l; i++){
                        if($('#' + data.fields[i]).data('req') == true){
                            $('#' + data.fields[i]).addClass('input-error');
                        }
                    }
                }

                $form.find('input[type="submit"]').removeAttr('disabled');
                $form.find('.form-message').addClass(classname).html(message).slideDown(100);
            },
            error: function(){
                $form.find('.form-message').addClass('error').html('Внутренняя ошибка сервера').slideDown(100);
                $form.find('input[type="submit"]').removeAttr('disabled');
            }
        });
    },

    init: function(){
        var date = new Date();

        date.setDate(date.getDate() + 1);

        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear();

        if(d < 10) {
            d = '0' + d.toString();
        }

        m = m + 1;

        if(m < 10) {
            m = '0' + m.toString();
        }

        $('#form_date').attr('placeholder', d + '.' + m + '.' + y).mask("99.99.9999");
        $('#form_time').mask("99:99");

        $('form#visit-client-form').on('submit', function(e){
            e.preventDefault();
            visit_clients.formProcessing();
        });
    }
};

var subscribe_form = {
    init: function(){
        $('form#subscribe').on('submit', function(e){
            e.preventDefault();

            $.ajax({
                url: '/?ajax&action=subscribe',
                data: {
                    email: $('input[name="subscribe_email"]').val()
                },
                type: 'POST',
                beforeSend: function(){
                    $('form#subscribe .form-message').slideUp(100);
                    $('form#subscribe input[type="submit"]').attr('disabled', 'disabled');
                },
                success: function(data){
                    var classname = '';

                    if(data.status == true){
                        classname = 'success';
                    }else{
                        classname = 'error';
                    }

                    $('form#subscribe input[type="submit"]').removeAttr('disabled');
                    $('form#subscribe .form-message').addClass(classname).html(data.message).slideDown(100);
                    $('form#subscribe .fields').hide();
                },
                error: function(){
                    $('form#subscribe .form-message').addClass('error').html('Внутренняя ошибка сервера').slideDown(100);
                    $('form#subscribe input[type="submit"]').removeAttr('disabled');
                }
            });
        });
    }
};

var feedback = {
    formActions: function () {
        $('#feedback-form').on('submit', function (e) {
            e.preventDefault();

            var data = {
                phone: $('.contacts-form input[name="feedback_phone"]').val(),
                name: $('.contacts-form input[name="feedback_name"]').val(),
                email: $('.contacts-form input[name="feedback_email"]').val(),
                message: $('.contacts-form textarea[name="feedback_message"]').val()
            };

            $.ajax({
                url: '/send.php',
                type: 'POST',
                dataType: 'json',
                data: data,
                beforeSend: function(){
                    $('.contacts-form .form-message').removeClass('success error').slideUp(100);
                    $('.contacts-form input[type="submit"]').attr('disabled', 'disabled').prop('disabled', 'disabled');
                },
                success: function (data) {
                    if (data.status) {
                        $('.contacts-form .form-items').slideUp(200);
                        $('.contacts-form .form-message').addClass('success').html(data.message).slideDown(100);
                        $('.contacts-form .content').css({
                            padding: '20px 20px 0',
                            height: 0
                        });
                    } else {
                        $('.contacts-form .form-message').addClass('error').html(data.message).slideDown(100);
                        $('.contacts-form input[type="submit"]').removeAttr('disabled').removeProp('disabled', 'disabled');
                    }
                },
                error: function () {
                    $('.contacts-form .form-message').addClass('error').html('Ошибка сервера!').slideDown(100);
                    $('.contacts-form input[type="submit"]').removeAttr('disabled').removeProp('disabled', 'disabled');
                }
            });
        });
    },

    init: function () {
        this.formActions();
    }
}

$(function(){
    main_menu.init();
    
    $('input[type="tel"]').mask("+9 (999) 999-99-99");
    $('.fancybox').fancybox({
        padding: 0,
        helpers: {
            overlay : {
                closeClick : true,  // if true, fancyBox will be closed when user clicks on the overlay
                speedOut   : 200,   // duration of fadeOut animation
                showEarly  : true,  // indicates if should be opened immediately or wait until the content is ready
                css        : {},    // custom CSS properties
                locked     : true   // if true, the content will be locked into overlay
            },
            title : {
                type : 'outside' // 'float', 'inside', 'outside' or 'over'
            }
        }
    });

    callme.init();
    visit.init();
    feedback_window.init();
});