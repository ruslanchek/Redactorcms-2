//Explode string like PHP core explode() function
function explode(delimiter, string){
	var emptyArray = { 0: '' };

	if(arguments.length != 2 || typeof arguments[0] == 'undefined' || typeof arguments[1] == 'undefined'){
		return null;
	};

	if(delimiter === '' || delimiter === false || delimiter === null){
		return false;
	};

	if(typeof delimiter == 'function' || typeof delimiter == 'object' || typeof string == 'function' || typeof string == 'object'){
		return emptyArray;
	};

	if(delimiter === true){
		delimiter = '1';
	};

	return string.toString().split(delimiter.toString());
};

var core = {
    initPersonalEdit: function(){

    },

    binds: function(){
        $('.product_info .params .colors .color').live('click', function(){
            $('.product_info .params .colors .color').removeClass('active');
            $(this).addClass('active');
        });

        $('#edit_form').live('click', function(){
            core.initPersonalEdit();
        });
    },

    init: function(){
        this.binds();

        Cufon.replace('.hoog_font', { fontFamily: 'hoog' });
        Cufon.now();
    },

    resize: function(){

    },

    loadItems: {
        loading: false,
        page: 2,
        total_pages: false,

        setLoading: function(){
            this.loading = true;
            $('.loading').remove();
            $('#load_place').append('<div class="loading"></div>');
        },

        unsetLoading: function(){
            this.loading = false;
            $('.loading').fadeOut(300, function(){
                $('.loading').remove();
            });
        },

        loadMore: function(){
            if(!this.loading && (this.total_pages >= this.page || !this.total_pages)){
                $.ajax({
                    type: 'get',
                    data: {
                        page: this.page
                    },
                    url: this.url,
                    beforeSend: function(){
                        core.loadItems.setLoading();
                    },
                    dataType: 'json',
                    success: function(data){
                        core.loadItems.total_pages = data.total_pages;
                        core.loadItems.unsetLoading();

                        $('#load_place').append('<div class="new_loaded_data">'+data.html+'</div>');
                        $('.new_loaded_data:last').slideDown();

                        core.loadItems.page++;
                    }
                });
            };
        },

        init: function(url){
            this.url = url;

            $(window).scroll(function(){
                core.loadItems.current_top = $(window).scrollTop(),
                core.loadItems.overall_top = $(document).height() - $(window).height();

                if(core.loadItems.current_top == core.loadItems.overall_top){
                    core.loadItems.loadMore();
                };
            })
        }
    },

    map: {
        markers: new Object(),

        hashInit: function(){
            var hash = window.location.hash.substring(1, window.location.hash.length);

            if(hash > 0){
                this.clickMarker(hash);
            };
        },

        init: function(options){
            this.options = options;

            var latlng = new google.maps.LatLng(options.lat, options.lng);

            var myOptions = {
                zoom: 10,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            this.map = new google.maps.Map(document.getElementById("map"), myOptions);

            function ProjectionHelperOverlay(map){
                google.maps.OverlayView.call(this);
                this.setMap(map);
            };

            ProjectionHelperOverlay.prototype = new google.maps.OverlayView();
            ProjectionHelperOverlay.prototype.draw = function(){
                if(!this.ready){
                    this.ready = true;
                    google.maps.event.trigger(this, 'ready');
                };
            };

            this.proj = new ProjectionHelperOverlay(this.map);

            google.maps.event.addListener(this.map, 'drag', function() {
                $('.map_info_cloud').remove();
            });

            google.maps.event.addListener(this.map, 'zoom_changed', function() {
                $('.map_info_cloud').remove();
            });

            $('.map_info_cloud').live('click', function(){
                $(this).remove();
            });

            google.maps.event.addListenerOnce(this.map, 'idle', function(){
                core.map.hashInit();
            });
        },

        showInfo: function(marker, options){
            this.map.setCenter(marker.getPosition());

            var coords = this.proj.getProjection().fromLatLngToContainerPixel(marker.getPosition());
            var html = '<div class="map_info_cloud">'+marker.title+'</div>';

            $('.map_info_cloud').remove();
            $('#map').append(html);

            var info = $('.map_info_cloud');

            info.css({
                top: coords.y - 40 - info.height(),
                left: coords.x - 25
            });
        },

        clickMarker: function(id){
            google.maps.event.trigger(this.markers['marker_'+id], 'click');
            $('html, body').animate({scrollTop: $('#map').offset().top - 50}, 200);
        },

        addMarker: function(options){
            var latlng = new google.maps.LatLng(options.lat, options.lng);

            var image = new google.maps.MarkerImage(this.options.marker_icon + '?text='+options.id,
                new google.maps.Size(23, 38),
                new google.maps.Point(0, 0),
                new google.maps.Point(11, 38)
            );

            var shadow = new google.maps.MarkerImage('/img/marker_shadow.png',
                new google.maps.Size(35, 25),
                new google.maps.Point(0,0),
                new google.maps.Point(2, 24)
            );

            var shape = {
                coord: [0, 0, 23, 0, 23, 21, 12, 38, 0, 21],
                type: 'poly'
            };

            var marker = new google.maps.Marker({
                position    : latlng,
                map         : core.map.map,
                title       : options.title,
                shadow      : shadow,
                icon        : image,
                shape       : shape
            });

            google.maps.event.addListener(marker, 'click', function() {
                core.map.showInfo(marker, options);
            });

            this.markers['marker_'+options.id] = marker;
        }
    },

    projects: {
        close: function(prev_id){
			if(prev_id) {
				$('.overlay, #' + prev_id).fadeOut(200, function(){
					$('#' + prev_id).remove();
				});
			} else {
				$('.overlay, #' + prev_id + ', .pi_close, .pi_expand, .pi_decrease').fadeOut(200, function(){
					$('.overlay, .project_info, .pi_close, .pi_expand, .pi_decrease').remove();
				});
			}
        },

        showMap: function(data){
            $('.shortInfo, .authors, .projectInfoDescr, .projectInfoImg, .projectImgBig').hide();
            $('#project_map').show();
			$('.pages a').removeClass('active');
			$('#showMap').addClass('active');


            var marker_params = explode(';', data.marker);
            var map_params = explode(';', data.map_params),
                latlng = new google.maps.LatLng(marker_params[0], marker_params[1]);

            var myOptions = {
                zoom: parseInt(map_params[2]),
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false
            };

            var map = new google.maps.Map(document.getElementById("project_map"), myOptions);

            var image = new google.maps.MarkerImage('/marker.php',
                new google.maps.Size(23, 38),
                new google.maps.Point(0, 0),
                new google.maps.Point(11, 38)
            );

            var shadow = new google.maps.MarkerImage('/img/marker_shadow.png',
                new google.maps.Size(35, 25),
                new google.maps.Point(0,0),
                new google.maps.Point(2, 24)
            );

            var shape = {
                coord: [0, 0, 23, 0, 23, 21, 12, 38, 0, 21],
                type: 'poly'
            };

            var marker = new google.maps.Marker({
                position    : latlng,
                map         : map,
                title       : data.name,
                shadow      : shadow,
                icon        : image,
                shape       : shape
            });

            google.maps.event.addListener(marker, 'click', function() {
                map.panTo(marker.getPosition());
            });

            this.map = map;
            this.marker = marker;

            this.resizeMap();
        },

/*         hideMap: function(){
            $('.shortInfo, .authors, .projectInfoDescr, .projectInfoImg, .projectImgBig').show();
            $('#project_map').hide();
        }, */

        open: function(data,prev_id,curr_id){
            this.close(prev_id);

            $('html, body').animate({
                scrollTop: 0
            }, 600, "swing");

            var file = '',
                map_link = '',
                map_html = '';

            if(data.file_path && data.file_name && data.file_extension){
                file += '<a target="_blank" class="hoog_font" href="'+data.file_path + data.file_name + '.' + data.file_extension+'">PDF</a>';
            };

            if(data.marker){
                map_link = '<a class="hoog_font" href="#" id="showMap">На карте</a>';
                map_html = '<div id="project_map" style="display: none;"></div>';
            };
			if ($('.pi_expand').css('display') == 'none') {
				var pi_expand = true;
			}

            var html =  '<div class="overlay"></div>' +

                        '<a href="javascript:void(0)" class="pi_close"></a>' +
                        '<a href="javascript:core.projects.resize()" class="pi_expand"></a>' +
                        '<a href="javascript:core.projects.resize(1000,700)" class="pi_decrease"></a>' +

                        '<div class="project_info" id="' + curr_id + '">' +
                            map_html +
                            '<div class="pages">' +
                            '</div>' +
                            '<div class="modes">' +
                                map_link +
                                file +
                            '</div>' +
                        '</div>';


            $('body').prepend(html);
			if (pi_expand) {
				core.projects.resize();
			}

            $('#showMap').on('click', function(){
                core.projects.showMap(data);
            })
        },

        show: function(id,number){
            $.ajax({
                type: 'get',
                data: {
                    id: id,
					number:number
                },
                url: '/?ajax&action=getProject',
                beforeSend: function(){

                },
                dataType: 'json',
                success: function(data){
					core.projects.open(data,$('.project_info').attr('id'),number);

					var $links = '';
					var $img_id = data.images.split(',');


					$links += '<a ';
					if (number == $img_id[0] || !number) {
							$links += 'class="active" ';
					} else {
							$links += 'href="javascript:core.projects.show(' + id + ',' + $img_id[0] + ');"';
					}
					$links += '></a>';
					$links += '<a ';
					if (number == 'info') {
							$links += 'class="active" ';
					} else {
							$links += ' href="javascript:core.projects.show(' + id + ',\'info\');"';
					}
					$links += '></a>';

					for (i=1; i<$img_id.length; i++) {
						$links += '<a ';
						if (number == $img_id[i]) {
							$links += 'class="active" ';
						} else {
							$links += 'href="javascript:core.projects.show(' + id + ',' + $img_id[i] + ');"';
						}
							$links += '></a>';
					}
					$('.pages').prepend($links);
					if (number != 'info') {
						$('.project_info').prepend('<img src="' + data.path + data.name_img + '.' + data.extension + '" class="projectImgBig" height="' + data.height + '" width="' + data.width + '">');
					} else {
						$('.project_info').prepend('<img src="' + data.path + data.name_img + '.' + data.extension + '" width="250" height="250" class="projectInfoImg"><div class="shortInfo" style="color:#' + data.color + '"></div>');
						$('.project_info .shortInfo').prepend('<div class="nameProject">' + data.name + '</div>');
						$('.project_info .nameProject').after('<table class="shortInfoTable" style="color:#' + data.color + '"><tr><td width="150">ТИП:</td><td class="bold">' + data.type + '</td></tr><tr><td>ЗАКАЗЧИК:</td><td class="bold">' + data.customer + '</td></tr><tr><td>в сотрудничестве:</td><td class="bold">' + data.partners + '</td></tr><tr><td>местоположение:</td><td class="bold">' + data.city + '</td></tr><tr><td>стадия:</td><td class="bold">' + data.stage1 + data.stage2 + data.stage3 + data.stage4 + '</td></tr></table>');
						$('.shortInfo').after('<table class="authors"><tr><td width="110" style="color:#' + data.color + '"><b>АВТОРЫ ПРОЕКТА:</b> </td><td>' + data.authors + '</td></tr></table><div class="projectInfoDescr">' + data.description + '</div>');
					};
                }
            });
        },

        init: function(){
            $('a.project_item').live('click', function(){
                core.projects.show($(this).attr('rel'));
            });

            $('.pi_close').live('click', function(){
                core.projects.close();
            });
        },

        resizeMap: function(){
            $('#project_map').css({
                height: 0
            });

            $('#project_map').css({
                height: $('.project_info').height()
            });

            google.maps.event.trigger(this.map, 'resize');
            this.map.panTo(this.marker.getPosition());
        },

        resize: function(x, y){
			if ((x == undefined) && (y == undefined)) {
				$('.project_info').addClass('resize_info');
				//$('.projectImgBig').css({width:$('.projectImgBig').width,height:$('.projectImgBig').height});
 				$('.pi_expand').css({display:'none'});
				$('.pi_decrease').css({display:'block'});

                $('html, body').animate({
                    scrollTop: 0
                }, 600, "swing");

                if ($('#project_map').css('display') == 'block') {this.resizeMap();}
			} else {
 				$('.pi_expand').css({display:'block'});
				$('.pi_decrease').css({display:'none'});
				$('.project_info').removeClass('resize_info');

                $('html, body').animate({
                    scrollTop: 0
                }, 600, "swing");

                if ($('#project_map').css('display') == 'block') {this.resizeMap();}
			}
        }
    },

    avatar: {
        openDialog: function(){
            var html =  '<div class="overlay"></div>' +
                        '<div class="auth_window">' +
                            '<a href="javascript:void(0)" class="close_window" id="close_auth"></a>' +

                            '<form id="avatar_form" action="javascript:void(0)" method="post">' +
                                '<h2 class="uppercase">Изменение аватара</h2>' +
                                '<div class="form_message"><div></div></div>' +
                                '<a id="upload" class="submit" href="#" ы>Выберите картинку</a>' +
                                '<span id="progress1" style="display: none; width: 32px; float: left; height: 32px; background: url(/resources/img/loading.gif)"></span>' +
                            '</form>' +
                        '</div>';

            $('body').prepend(html);

            $('#upload').upload({
                name: 'file',
                method: 'post',
                enctype: 'multipart/form-data',
                action: '/?upload_userpic=true',
                onSubmit: function() {
                    $('#progress1').show();
                },
                onComplete: function(data) {
                    var result = JSON.parse(data),
                        classname;

                    if(result.status){
                        classname = 'ok';
                        $('.man_photo').html('<img src="/data/users/'+result['user_id']+'/userpic_150.jpg?'+Math.random()+'">');
                        $('.personal_button .userpic').html('<img src="/data/users/'+result['user_id']+'/userpic_25.jpg?'+Math.random()+'">')
                    }else{
                        classname = 'error';
                    };

                    $('#progress1').hide();
                    $('#avatar_form .form_message div').addClass(classname).text(result.message);
                }
            });
        }
    },

    auth: {
        remember: function(){
            $.ajax({
                url: '/?ajax&action=remember',
                type: 'post',
                dataType: 'json',
                data: {
                    email: $('#remember_form input[name="email"]').val()
                },
                success: function(data){
                    var status_class;

                    if(data.status){
                        status_class = 'ok';
                    }else{
                        status_class = 'error';
                    };

                    $('#remember_form .form_message').html('<div class="'+status_class+'">'+data.message+'</div>');
                }
            });
        },

        auth: function(){
            $.ajax({
                url: '/?ajax&action=login',
                type: 'post',
                dataType: 'json',
                data: {
                    login: $('#login_form input[name="email"]').val(),
                    password: $('#login_form input[name="password"]').val()
                },
                success: function(data){
                    var status_class;

                    if(data.status){
                        document.location.reload();
                        status_class = 'ok';
                    }else{
                        status_class = 'error';
                    };
                    $('#login_form .form_message').html('<div class="'+status_class+'">'+data.message+'</div>');
                }
            });
        },

        openAuthWindow: function(){
            var html =  '<div class="overlay"></div>' +
                        '<div class="auth_window">' +
                            '<a href="javascript:void(0)" class="close_window" id="close_auth"></a>' +

                            '<form id="login_form" action="javascript:void(0)" method="post">' +
                                '<h2 class="uppercase">Вход на сайт</h2>' +
                                '<div class="form_message"></div>' +
                                '<table class="login_form">' +
                                    '<tr>' +
                                        '<td>' +
                                            '<label>' +
                                                '<span class="uppercase">Электронная почта или логин</span>' +
                                                '<input class="text" type="text" name="email" />' +
                                            '</label>' +
                                            '<a href="/auth/register">Зарегистрироваться</a>' +
                                        '</td>' +
                                        '<td>' +
                                            '<label>' +
                                                '<span class="uppercase">Пароль</span>' +
                                                '<input class="text" type="password" name="password" />' +
                                            '</label>' +
                                            '<a href="javascript:void(0)" id="remind_form_trigger">Забыли пароль?</a>' +
                                        '</td>' +
                                        '<td>' +
                                            '<input class="submit" value="Войти" type="submit" />' +
                                        '</td>' +
                                    '</tr>' +
                                '</table>' +
                            '</form>' +

                            '<form id="remember_form" action="javascript:void(0)" method="post" style="display: none">' +
                                '<h2 class="uppercase">Напоминание пароля</h2>' +
                                '<div class="form_message"></div>' +
                                '<table class="login_form">' +
                                    '<tr>' +
                                        '<td>' +
                                            '<label>' +
                                                '<span class="uppercase">Электронная почта</span>' +
                                                '<input style="width: 348px;" class="text" type="text" name="email" />' +
                                            '</label>' +
                                            '<a href="javascript:void(0)" id="login_form_trigger">Войти на сайт</a>' +
                                        '</td>' +
                                        '<td>' +
                                            '<input style="width: 150px;" class="submit" value="Напомнить пароль" type="submit" />' +
                                        '</td>' +
                                    '</tr>' +
                                '</table>' +
                            '</form>' +

                            '<h2 class="uppercase">Войти как пользователь <span>Используйте свой аккаунт в социальной сети, чтобы создать профиль на DIgitalBakery</span></h2>' +
                            '<div class="social_list">' +
                                '<table>' +
                                    '<tr>' +
                                        //'<td><a href="#"><i class="go"></i><span>Google</span></a></td>' +
                                        //'<td><a href="#"><i class="ya"></i><span>Яндекс</span></a></td>' +
                                        '<td><a class="oauth_link" href="/?oauth&step=auth&provider=vk"><i class="vk"></i><span>Вконтакте</span></a></td>' +
                                        '<td><a class="oauth_link" href="/?oauth&step=auth&provider=fb"><i class="fb"></i><span>Facebook</span></a></td>' +
                                        //'<td><a href="#"><i class="lj"></i><span>LiveJournal</span></a></td>' +
                                        //'<td><a href="#"><i class="tw"></i><span>Twitter</span></a></td>' +
                                    '</tr>' +
                                '</table>' +
                            '</div>' +
                        '</div>';

            $('body').prepend(html);
        },

        init: function(){
            $('#login_form').live('submit', function(){
                core.auth.auth();
            });

            $('#remember_form').live('submit', function(){
                core.auth.remember();
            });

            $('#login_form_trigger').live('click', function(){
                $('#remember_form').hide();
                $('#login_form').show();
            });

            $('#remind_form_trigger').live('click', function(){
                $('#remember_form').show();
                $('#login_form').hide();
            });

            $('.login_button').live('click', function(){
                core.auth.openAuthWindow();
            });

            $('.personal_button').live('click', function(){
                $('.user_menu').fadeIn(100);
            });

            $('.user_menu').live('mouseleave', function(){
                $(this).hide();
            });

            $('#remind_password').live('click', function(){
                $('#login_form').hide();
            });

            $('#close_auth').live('click', function(){
                $('.overlay, .auth_window').remove();
            });
        }
    }
};

$(function(){
    core.init();
    core.auth.init();
});

$(window).resize(function(){
    core.resize();
});