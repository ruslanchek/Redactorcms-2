var slider = {
    items_count: 0,
    interval: null,
    page: 0,

    showPage: function (page) {
        page = parseInt(page);

        if(this.page < page && page > 0){
            var $next = $('.slider .slider-block:eq(' + page + ')');
            var $a = $('.slider .slider-block.active');

            $a.removeClass('active');
            $a.addClass('right');

            $next.addClass('active');
        }else{
            var $next = $('.slider .slider-block:eq(' + page + ')');
            var $a = $('.slider .slider-block.active');

            $('.slider .slider-block').removeClass('right');

            $a.removeClass('active').removeClass('right');
            $next.addClass('active').removeClass('right');
        }

        $('.slider .content').addClass('old');

        setTimeout(function () {
            $('.slider .content').removeClass('ready').removeClass('old');
            $('.slider .content h2').html($('.slider .slider-block:eq(' + page + ') .h2').html());
            $('.slider .content .text').html($('.slider .slider-block:eq(' + page + ') .announce').html());
        }, 300);

        $('.slider .pager a').removeClass('active');
        $('.slider .pager a:eq(' + page + ')').addClass('active');

        slider.pause();

        setTimeout(function () {
            slider.start();
            $('.slider .content').addClass('ready');
        }, 600);

        this.page = page;
    },

    nextPage: function () {
        var page;

        if (this.page == this.items_count - 1) {
            page = 0;
        } else {
            page = parseInt(this.page) + 1;
        }

        this.showPage(page);
    },

    start: function () {
        this.pause();

        this.interval = setInterval(function () {
            slider.nextPage();
        }, 6000);
    },

    pause: function () {
        clearInterval(this.interval);
    },

    createPager: function () {
        var html = '', i = 0;

        while (i < this.items_count) {
            html += '<a rel="' + i + '" href="#"><i></i></a>';
            i++;
        }

        $('.slider .pager').html(html);
        $('.slider .pager a:eq(0)').addClass('active');

        $('.slider .pager a').on('click', function (e) {
            e.preventDefault();
            slider.showPage($(this).attr('rel'));
        });
    },

    init: function () {
        this.items_count = $('.slider .slider-block').length;
        this.createPager();
        this.start();

        $('.slider .items-viewport').on('mouseenter', function () {
            slider.pause();
        });

        $('.slider .items-viewport').on('mouseleave', function () {
            slider.start();
        });

        $('.slider .slider-block').on('click', function () {
            document.location.href = $(this).data('url');
        });

        $('.slider .slider-block:eq(0) .content').addClass('ready');
    }
};

var order = {
    send: function(){
        var data = {
            maker: $('#order-maker').val(),
            name: $('#order-name').val(),
            company: $('#order-company').val(),
            phone: $('#order-phone').val()
        };

        $.ajax({
            url: '/send.php',
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function (data) {
                if (data.status) {
                    $('#order-form').hide(200);
                    $('.order-form-message').html('<div class="ok_message"><b>' + data.message + '</b></div>');
                } else {
                    $('.order-form-message').html('<div class="error_message"><b>' + data.message + '</b></div>');
                }
            },
            error: function () {
                $('.order-form-message').html('<div class="error_message"><b>Ошибка передачи данных!</b></div>');
            }
        });
    },

    init: function () {
        $('#order-form').on('submit', function(e){
            order.send();

            e.preventDefault();
        });
    }
};

var callback = {
    hide: function () {
        $('#callme-window').remove();
        $('body').off('keyup.callme');
        core.removeOverlay();
    },

    show: function () {
        core.createOverlay();

        var html = '<div id="callme-window" class="order-block float-free">' +
            '<a class="close-btn" href="#" title="Закрыть окно"></a>' +
            '<h2 class="uppercase">Обратный звонок</h2>' +

            /*'<label for="when" class="bold">Когда вам позвонить?</label>' +*/

            /*'<select name="when" id="when">' +
             '<option value="0">Сегодня</option>' +
             '<option value="1">Завтра</option>' +
             '<option value="2">Послезавтра</option>' +
             '</select>' +

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

             'До <select name="to" id="to">' +
             '<option>11:00</option>' +
             '<option>12:00</option>' +
             '<option>13:00</option>' +
             '<option>14:00</option>' +
             '<option>15:00</option>' +
             '<option>16:00</option>' +
             '<option>17:00</option>' +
             '<option>18:00</option>' +
             '<option selected="">19:00</option>' +
             '</select>' +*/

            '<div class="callme-form-message"></div>' +
            '<form id="callme-form" action="#">' +
            '<input type="text" placeholder="Ваше имя" id="name" />' +
            '<input type="text" placeholder="Телефон" id="phone" />' +

            '<div class="units-row">' +
            '<div class="unit-40">' +
            '<label>' +
            '<span>Когда позвонить?</span><br>' +
            '<select name="when" id="when">' +
            '<option value="0">Сегодня</option>' +
            '<option value="1">Завтра</option>' +
            '<option value="2">Послезавтра</option>' +
            '</select>' +
            '</label>' +
            '</div>' +
            '<div class="unit-30">' +
            '<span>Во сколько?</span><br>' +
            'С <select name="from" id="from">' +
            '<option selected>10:00</option>' +
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

            '<div class="unit-30">' +
            '<br>' +
            'До <select name="to" id="to">' +
            '<option>10:00</option>' +
            '<option>11:00</option>' +
            '<option>12:00</option>' +
            '<option>13:00</option>' +
            '<option>14:00</option>' +
            '<option>15:00</option>' +
            '<option>16:00</option>' +
            '<option>17:00</option>' +
            '<option>18:00</option>' +
            '<option selected>19:00</option>' +
            '</select>' +
            '</div>' +
            '</div>' +


            '<input type="submit" class="btn btn-yellow" value="Отправить заявку" />' +
            '</form>' +
            '</div>';

        $('body').append(html);

        $('#callme-form input:first').focus();

        $('#callme-form').on('submit', function (e) {
            e.preventDefault();

            callback.send();
        });

        $('body').on('keyup.callme', function (e) {
            if (e.keyCode == 27) {
                callback.hide();
            }
        });

        $('#callme-window .close-btn').on('click', function () {
            callback.hide();
        });
    },

    send: function(){
        var data = {
            phone: $('#phone').val(),
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
                    $('#callme-form').hide(200);
                    $('.callme-form-message').html('<div class="ok_message"><b>' + data.message + '</b></div>');
                } else {
                    $('.callme-form-message').html('<div class="error_message"><b>' + data.message + '</b></div>');
                }
            },
            error: function () {
                $('.callme-form-message').html('<div class="error_message"><b>Ошибка передачи данных!</b></div>');
            }
        });
    },

    init: function () {
        $('.callback-button').on('click', function (e) {
            e.preventDefault();

            callback.show();
        });
    }
};

var photoroll = {
    roll_pic_width: 95,
    roll_pic_margin: 17,
    roll_capacity: 5,
    roll_overall_width: 0,

    picture_pic_width: 582,
    picture_overall_width: 0,
    picture_max_height: 0,

    pictures_count: 0,
    current_photo_index: 1,

    setSizes: function () {
        this.roll_overall_width = this.pictures_count * (this.roll_pic_width + this.roll_pic_margin) + 2;
        this.picture_overall_width = this.pictures_count * this.picture_pic_width + 2;

        this.$c.find('.roll-container').css({
            width: photoroll.roll_overall_width
        });
    },

    counts: function () {
        this.pictures_count = this.$c.find('.picture .photo, .picture .info-block').length;
    },

    rollTo: function (index) {
        if (index <= 1) {
            index = 1;
            this.$c.find('.arrow.left').addClass('unactive');
        } else {
            this.$c.find('.arrow.left').removeClass('unactive');
        }

        if (index >= this.pictures_count) {
            index = this.pictures_count;
            this.$c.find('.arrow.right').addClass('unactive');
        } else {
            this.$c.find('.arrow.right').removeClass('unactive');
        }

        index = parseInt(index);

        this.current_photo_index = parseInt(index);

        this.$c.find('.roll .photo, .picture .photo').removeClass('active');
        this.$c.find('.roll .photo[rel="' + index + '"], .picture .photo[rel="' + index + '"]').addClass('active');

        var rc = this.$c.find('.roll-container'),
            rc_left = 0,

            pc = this.$c.find('.picture-container'),
            pc_left = -(this.picture_pic_width * (index - 1));

        if (index > 3 && index < this.pictures_count - 2) {
            rc_left = -((this.roll_pic_width + this.roll_pic_margin) * (index - 3));

        } else if (index > 3 && index >= this.pictures_count - 2) {
            rc_left = -((this.roll_pic_width + this.roll_pic_margin) * (this.pictures_count - this.roll_capacity));

        } else {
            rc_left = 0;
        }

        if (this.pictures_count <= this.roll_capacity) {
            rc_left = 0;
        }

        rc.stop().animate({
            marginLeft: rc_left
        }, 300);

        pc.stop().animate({
            marginLeft: pc_left
        }, 300);

        var $item;

        if(this.$c.find('.picture .info-block[rel="' + index + '"]').length > 0){
            $item = this.$c.find('.picture .info-block[rel="' + index + '"]');
        }else{
            $item = this.$c.find('.picture .photo[rel="' + index + '"]');
        }

        this.$c.find('.picture-viewport').animate({
            height: $item.data('height')
        }, 300)
    },

    rollLeft: function () {
        this.rollTo(this.current_photo_index - 1);
    },

    rollRight: function () {
        this.rollTo(this.current_photo_index + 1);
    },

    rollCycle: function () {
        if(this.current_photo_index + 1 > this.pictures_count){
            this.rollTo(1);
        }else{
            this.rollTo(this.current_photo_index + 1);
        }
    },

    inits: function () {
        this.$c = $('.photo-roll');
        this.$c.find('.roll .photo:first').addClass('active');
        this.$c.find('.arrow.left').addClass('unactive');
        this.picture_max_height = 0;

        this.$c.find('.roll .photo').each(function (i) {
            $(this).attr('rel', i + 1);
        });

        this.$c.find('.picture .photo, .picture .info-block').each(function (i) {
            $(this).attr('rel', i + 1);

            if($(this).hasClass('info-block')){
                $(this).data('height', $(this).height());

                if(photoroll.picture_max_height < $(this).height()){
                    photoroll.picture_max_height = $(this).height();
                }
            }else{
                $(this).data('height', $(this).find('img').height());

                if(photoroll.picture_max_height < $(this).find('img').height()){
                    photoroll.picture_max_height = $(this).find('img').height();
                }
            }
        });

        var $fitem;

        if(this.$c.find('.picture .picture-container').children(':first').hasClass('info-block')){
            $fitem = this.$c.find('.picture .info-block:first');
        }else{
            $fitem = this.$c.find('.picture .photo:first');
        }

        $fitem.addClass('active');

        this.$c.find('.picture-viewport').css({
            height: $fitem.data('height')
        });

        this.$c.find('.picture .photo').on('click', function(e){
            e.preventDefault();
            photoroll.rollCycle();
        });
    },

    binds: function () {
        this.$c.find('.arrow.left').on('click', function (e) {
            photoroll.rollLeft();
            e.preventDefault();
        });

        this.$c.find('.arrow.right').on('click', function (e) {
            photoroll.rollRight();
            e.preventDefault();
        });

        this.$c.find('.roll .photo').on('click', function (e) {
            photoroll.rollTo($(this).attr('rel'));
            e.preventDefault();
        });
    },

    init: function () {
        $(window).on('load.photoroll', function(){
            photoroll.inits();
            photoroll.counts();
            photoroll.setSizes();
            photoroll.binds();
        });
    }
};

var catalog_tree = {
    init: function (selector) {
        $(selector).treeview({
            animated: 'fast',
            collapsed: false,
            persist: 'cookie',
            cookieId: 'treeview-black',
            toggle: function () {

            }
        });
    }
};

var to_the_top = {
    init: function () {
        $('body').prepend('<div class="to-the-top" title="Прокрутить страницу наверх"></div>');

        $('.to-the-top').css({
            left: $('.wrapper').offset().left + $('.wrapper').width() + 59
        });

        $('.to-the-top').on('click', function () {
            $('html, body').animate({
                scrollTop: 0
            }, 600, "swing");
        });

        $(window).on('scroll', function () {
            var st = $(window).scrollTop();

            if (st > 0) {
                $('.to-the-top').fadeIn(200);
            } else {
                $('.to-the-top').fadeOut(200);
            }
        });
    }
};

var fancybox_inits = {
    init: function () {
        $('.fancybox').fancybox({
            padding: 5
        });
    }
};

var core = {
    createOverlay: function () {
        $('body').append('<div class="overlay-global"></div>');

        $('.overlay-global').css({
            display: 'block'
        }).animate({
            opacity: 0.75
        }, 300);
    },

    removeOverlay: function () {
        $('.overlay-global').animate({
            opacity: 0
        }, 300, function () {
            $('.overlay-global').remove();
        });
    },

    init: function () {
        slider.init();
        callback.init();
        order.init();
        photoroll.init();
        to_the_top.init();
        fancybox_inits.init();
    }
};

$(function () {
    core.init();
});