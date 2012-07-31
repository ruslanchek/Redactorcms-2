//Text editor init
var editors = new Array();
var editors_index = 0;

function initEditor(obj, locale, dom_id){
    var id = dom_id.substr(4, dom_id.length);

	if(locale == 'ru_RU'){
		var lang = 'ru';
	}else{
		var lang = 'en';
	};

    editors[editors_index] = {
        id: id,
        obj: obj,
        instance: obj.redactor({
            resize          : true,
            focus           : false,
            lang            : lang,
            toolbar         : 'default',
            typo            : '/admin/?action=typo',
            imageUpload     : '/admin/?action=upload&type=image',
            fileUpload      : '/admin/?action=upload&type=file'
        })
    };

    $('.typo[rel="'+dom_id+'"]').attr('index', editors_index).click(function(){
        editors[$(this).attr('index')].instance.typo();
    });

    editors_index++;
};

//Tags input
function initTagsInput(id){
    $('#'+id).tagsInput({
        'autocomplete_url' : '/admin/?ajax=true&action=search_tag',
        'autocomplete' : { selectFirst : true, width : '158px', autoFill : true },
        'unique' : true,
        'defaultText': '',
        'width' : '100%',
        'autoFill' : false,
        'height' : 'auto'
    });
};

function checkUniqueField(col, id, table){
    $('#'+col).rules("add", {
        remote: {
            url: "/admin/?ajax=true&action=check_presence",
            type: "POST",
            data: {
                value: function(){
                    return $('#'+col).val();
                },
                col: col,
                id: id,
                table: table
            }
        },
        messages: {
           remote: errors['form_error_that_field_is_unique']
        }
    });
}

//Get color form range
function getFadedColor(min, max, val){
    var sFadeStartColor = "#c40000";
    var sFadeFinishColor = "#009cff";
    var aRGBStart = sFadeStartColor.replace("#","").match(/.{2}/g);
    var aRGBFinish = sFadeFinishColor.replace("#","").match(/.{2}/g);

    var n = 99;
    var i = Math.floor(val / ((max-min) / 100));

    var finishPercent = i/n;
    var startPercent = 1 - finishPercent;

    var R,G,B;

    R = Math.floor( ('0x'+aRGBStart[0]) * startPercent + ('0x'+aRGBFinish[0]) * finishPercent );
    G = Math.floor( ('0x'+aRGBStart[1]) * startPercent + ('0x'+aRGBFinish[1]) * finishPercent );
    B = Math.floor( ('0x'+aRGBStart[2]) * startPercent + ('0x'+aRGBFinish[2]) * finishPercent );

    return 'rgb('+R+ ',' + G + ',' + B +')';
};

//Slider
function initSlider(id, val, min, max, step){
    $('#amount_'+id).css({
        color: getFadedColor(min, max, val)
    })

    $('#slider_'+id).slider({
        value: val,
        min: min,
        max: max,
        step: step,
        slide: function(event, ui){
            $('#'+id).val(ui.value);
            $('#amount_'+id).text(ui.value).css({
                color: getFadedColor(min, max, ui.value)
            });
        }
    }).before('<span class="min">'+min+'</span><span class="max">'+max+'</span>');
};

//Create files uploader instance
function createUploader(item_name, item_folder, type, relative_id, relative_table, extensions, multiple){
    var uploader = new qq.FileUploader({
        element: document.getElementById(item_name),
        action: '/admin/?action=upload&upload_method=qq',
        debug: false,
        multiple: multiple,
        params: {
            type: type,
            relative_id: relative_id,
            relative_table: relative_table,
            form_item: item_name,
            folder: item_folder,
            mode: 'files'
        },
        text: uploader_texts,
        allowedExtensions: extensions,
        sizeLimit: 104857600,
        minSizeLimit: 1,
        onComplete: function(id, fileName, responseJSON){
            if(responseJSON.success && multiple == false){
                $('.upload_tools #'+item_name).find('.regular_button, .qq-upload-drop-area').remove();
            };
        }
    });
};

//Create images uploader instance
function createImagesUploader(item_name, item_folder, type, relative_id, relative_table, multiple, copies_params_str){
    var uploader = new qq.FileUploader({
        element: document.getElementById(item_name),
        action: '/admin/?action=upload&upload_method=qq',
        debug: false,
        multiple: multiple,
        params: {
            type: type,
            relative_id: relative_id,
            relative_table: relative_table,
            form_item: item_name,
            folder: item_folder,
            mode: 'images',
            copies_params_str: copies_params_str
        },
        text: uploader_texts,
        allowedExtensions: ['jpg', 'jpeg', 'gif', 'png'],
        sizeLimit: 104857600,
        minSizeLimit: 1,
        onComplete: function(id, fileName, responseJSON){
            if(responseJSON.success){
                var uploaded_file = '/data/images/'+relative_table+'/'+relative_id+'/'+item_folder+'/'+fileName;
                var uploaded_thumb = escapeUrl('/data/images/'+relative_table+'/'+relative_id+'/'+item_folder+'/._thumb_'+fileName);

                var html = '<div class="image just_uploaded" id="new_image_'+id+'">' +
                                '<a target="_blank" href="'+uploaded_file+'">' +
                                    '<img src="'+uploaded_thumb+'">' +
                                '</a>' +
                            '</div>';

                $('#file_list_'+item_name).prepend(html);
                $('#file_list_'+item_name).find('#new_image_'+id).show(200);
                $('#file_list_'+item_name+'_uploader').find('.qq-upload-button').remove();
            };
        }
    });
};

function sendGallerySortParams(sort_params){
    $.ajax({
        type: 'POST',
        url: '/admin/?ajax=true&action=apply_gallery_sort',
        data: {
            sort_params : JSON.stringify(sort_params)
        }
    });
};

//Initialize an uploaded photo view
function initUploadedPhoto(photo_view_id){
	$('#file_list_'+photo_view_id+' .image').hover(function(){
		$(this).find('.image_tools').css({
			height: $(this).height() + 2
		}).show();
		
		$(this).find('.it_buttons').css({
			top: $(this).height()/2 - $(this).find('.it_buttons').height()/2
		});

        $(this).addClass('hovered');
	},function(){
		$(this).find('.image_tools').hide();
        $(this).removeClass('hovered');
	});

    $('#file_list_'+photo_view_id).sortable({
        items   : '.image',
        handle  : '.handler_grid',
        revert  : true,
        update  : function(event, ui){
            var sort_params = [], i = 0;
            $('#file_list_'+photo_view_id).find('.image').each(function(){
                i++;
                sort_params.push({
                    id      : parseInt($(this).attr('rel')),
                    sort    : i
                });
            });

            sendGallerySortParams(sort_params);
        }
    });
};

//Initialize an uploaded files table
function initUploadedTable(file_list_id){
    var list = $('#'+file_list_id);
    var i = list.find('tr:not(:first)').length;

    if(i>0){
    	list.find('tr').hover(function(){
    		$(this).addClass('hovered');
    	}, function(){
    		$(this).removeClass('hovered');
    	});
    }else{
        list.hide();
        list.prev().show();
    };
};

//Delete file from the form list
function deleteFile(id, obj, file_list_id){
    if(confirm(uploader_texts.delete_file_confirm)){
        $.ajax({
            type: 'GET',
            url: '/admin/',
            data: {
                ajax:       'true',
                action:  	'delete_file',
                file_id:    id
            },
            success: function(){
                obj.parent().parent().remove();
                initUploadedTable(file_list_id);
            }
        });
    };
};

//Delete image from the form list
function deleteImage(id, file_list_id, single, thumbs){
    if(confirm(uploader_texts.delete_image_confirm)){
        $.ajax({
            type: 'GET',
            url: '/admin/',
            data: {
                ajax:       'true',
                action:  	'delete_image',
                file_id:    id,
                thumbs:     thumbs
            },
            success: function(){
                if(single){
                    $('#'+file_list_id).find('.single_image_info, .image').hide(150, function(){
                        $('#'+file_list_id).find('.single_image_info, .image').remove();
                    });
                }else{
                    $('div.image[rel="'+id+'"]').hide(150, function(){
                        $('div.image[rel="'+id+'"]').remove();
                    });
                };

                $('#'+file_list_id+'_uploader').show();
            }
        });
    };
};

//File info edit tool
function editFile(id, path, filename, size, date){
    var callback = function(){
        this.init = function(data){
            console.log(data)

            var file = path + filename;

            if(data.name == null){
                data.name = '';
            };

            if(data.desc == null){
                data.desc = '';
            };

            var editor_html =   '<div class="ie_container">' +
                                    '<form action="javascript:void(0)" id="image_editor_form">' +
                                        '<strong><a target="_blank" href="' + file + '">' + filename + '</a></strong>' +
                                        '<table cellpadding="0" cellspacing="0" border="0">' +
                                            '<tr>' +
                                                '<th>' + uploader_texts.form_image_date + '</th>' +
                                                '<td>' + date + '</td>' +
                                            '</tr>' +
                                            '<tr>' +
                                                '<th>' + uploader_texts.form_image_size + '</th>' +
                                                '<td>' + size + '</td>' +
                                            '</tr>' +
                                        '</table>' +
                                        '<div>' +
                                            '<label>Название<input autocomplete="off" class="text" type="text" id="ie_name" value="' + data.name + '" /></label>' +
                                            '<label>Описание<textarea autocomplete="off" class="area" id="ie_desc">' + data.desc + '</textarea></label>' +
                                            '<input class="button" id="ie_save" type="submit" value="' + uploader_texts.form_button_save_text + '" />' +
                                        '</div>' +
                                    '</form>' +
                                '</div>';

            var window = new Window();
            window.createModal('Редактирование файла', editor_html, 500);

            $('#image_editor_form').off('submit').on('submit', function(){
                saveFileinfo(id, 'files', window);
            });
        };
    };

    getFileInfo(id, 'files', callback);
}

//File info edit tool
function editImage(id, path, filename, size, dimensions, date){
    var callback = function(){
        this.init = function(data){
            var file = path + filename,
                thumb = path + '._thumb_' + filename;

            if(data.name == null){
                data.name = '';
            };

            if(data.desc == null){
                data.desc = '';
            };

            var editor_html =   '<div class="ie_container">' +
                                    '<form action="javascript:void(0)" id="image_editor_form">' +
                                        '<div class="thumb"><a target="_blank" href="' + file + '"><img src="'+ thumb +'" /></a></div>' +
                                        '<strong><a target="_blank" href="' + file + '">' + filename + '</a></strong>' +
                                        '<table cellpadding="0" cellspacing="0" border="0">' +
                                            '<tr>' +
                                                '<th>' + uploader_texts.form_image_date + '</th>' +
                                                '<td>' + date + '</td>' +
                                            '</tr>' +
                                            '<tr>' +
                                                '<th>' + uploader_texts.form_image_size + '</th>' +
                                                '<td>' + size + '</td>' +
                                            '</tr>' +
                                            '<tr>' +
                                                '<th>' + uploader_texts.form_image_dimensions + '</th>' +
                                                '<td>' + dimensions + '</td>' +
                                            '</tr>' +
                                        '</table>' +
                                        '<div class="cl"></div>' +
                                        '<div class="form_content">' +
                                            '<label>' +
                                                uploader_texts.form_edit_image_name_label +
                                                '<input autocomplete="off" class="text" type="text" id="ie_name" value="' + data.name + '" />' +
                                            '</label>' +

                                            '<label>' +
                                                uploader_texts.form_edit_image_desc_label +
                                                '<textarea autocomplete="off" class="area" id="ie_desc">' + data.desc + '</textarea>' +
                                            '</label>' +

                                            '<input class="button" id="ie_save" type="submit" value="' + uploader_texts.form_button_save_text + '" />' +
                                        '</div>' +
                                    '</form>' +
                                '</div>';

            var window = new Window();
            // TODO : Сделать так, чтобы сначала загружалось окошко, потом в него с оборажением лоудинг-анимации грузилось вся хрень
            window.createModal(uploader_texts.form_edit_image, editor_html, 500);

            $('#image_editor_form').off('submit').on('submit', function(){
                saveFileinfo(id, 'images', window);
            });
        };
    };

    getFileInfo(id, 'images', callback);
};

//Get file info
function getFileInfo(id, type, callback){
    $.ajax({
        type: 'GET',
        url: '/admin/?ajax=true&action=get_fileinfo',
        dataType:   'json',
        data: {
            id:    id,
            type:  type
        },
        success: function(data){
            console.log(data);
            var fn = new callback();
            fn.init(data);
        }
    });
};

//File info save
function saveFileinfo(id, type, window){
    var name = $('#ie_name').val(),
        desc = $('#ie_desc').val();
	
	$.ajax({
        type: 'POST',
        url: '/admin/?ajax=true&action=save_fileinfo',
        data: {
            id:         id,
            name:		name,
            desc:		desc,
            type:       type
        },
        beforeSend: function(){
            window.setLoading();
        },
        success: function(data){
            $('#file_info_'+id).slideUp(200);
            $('#file_row_'+id).removeClass('active');
            window.setMessage(true, 'Данные сохранены');
            window.unSetLoading();
        },
        error: function(){
            window.setMessage(false, 'Ошибка передачи данных');
            window.unSetLoading();
        }
    });
};

//Calendar functions
function Calendar(){
	this.convertDate = function(date){
		var parsed_date = explode('-', date);
		return parsed_date[2]+'.'+parsed_date[1]+'.'+parsed_date[0];
	};

    this.blurInput = function(id_name){
        var date = $('#'+id_name).val();

        if(!date){
            var recover_date = $('#parsed_'+id_name).val();
            
            recover_date = recover_date.substr(0, recover_date.length - 9);
            recover_date = explode('-', recover_date);
            date = recover_date[2] + '-' + recover_date[1] + '-' + recover_date[0];
        };
        
        var parsed_date = explode('-', date);

        if(parsed_date[1] > 12){
            parsed_date[1] = 12;
        };

        if(parsed_date[1] < 1){
            parsed_date[1] = 1;
        };

        if(parsed_date[0] > 31){
            parsed_date[0] = 31;
        };

        if(parsed_date[0] < 1){
            parsed_date[0] = 1;
        };

        var unmask_date = parsed_date[0] + '-' + parsed_date[1] + '-' + parsed_date[2];
        parsed_date = parsed_date[2] + '-' + parsed_date[1] + '-' + parsed_date[0];

        var val = this.convertHumanDateFromString(unmask_date);
        $('#'+id_name).val(val);

        var raw_date = parsed_date + calendar.getCurrentTime(id_name);
        $('#parsed_'+id_name).val(raw_date);

        $('#'+id_name).unmask();
    };

    this.focusInput = function(id_name){
        $('#' + id_name).mask('99-99-9999');
    };

    this.convertHumanDate = function(date){
		var parsed_date = explode('-', date);
		return parsed_date[2]+' '+date_names.months_genitive_case[parseInt(parsed_date[1]-1)].toLowerCase()+', '+parsed_date[0];
	};

    this.convertHumanDateFromString = function(date){
		var parsed_date = explode('-', date);
		return parsed_date[0]+' '+date_names.months_genitive_case[parseInt(parsed_date[1]-1)].toLowerCase()+', '+parsed_date[2];
	};

	this.parseZeroLeading = function(i){
		if(i < 10){
			return '0'+i;
		}else{
			return i;
		};
	};

	this.cutZeroLeading = function(i){
		if(i.substr(0, 1) == '0'){
			return i.substr(1, i.length);
		}else{
			return i;
		};
	};

	this.getCurrentTime = function(id_name){
		return ' '+$('#time_'+id_name).val()+':00';
	};

	this.setCurrentDate = function(id_name, related_item, cdate){
		if(cdate){
			var pcdate = cdate;
			var cut = 1;
		}else{
			var dt = new Date();
			var pcdate = dt.getFullYear() + '-' +this.parseZeroLeading(dt.getMonth()) + '-' +this.parseZeroLeading(dt.getDay());
			var cut = 0;
		};

		$('#calendar_picker_instance_'+id_name).calendarLite({
			showYear: true,
        	linkFormat: 'javascript:void(0)',
			months: date_names.months_nominative_case,
            days: date_names.days,
			prevArrow: '',
            nextArrow: '',
			cut: cut,
			currentDate: pcdate,
			dateFormat: '{%yyyy}-{%mm}-{%dd}',
			onSelect: function(date){
				related_item.val(calendar.cutZeroLeading(calendar.convertHumanDate(date)));
				$('#parsed_'+id_name).val(date + calendar.getCurrentTime(id_name));
				//$('#calendar_frame_'+id_name).fadeOut(150);
				calendar.setCurrentDate(id_name, related_item, $('#parsed_'+id_name).val().substr(0, 10));
            }
        }).find('th:gt(4)').addClass('weekend');

		if(!cdate){
			$('#calendar_picker_instance_'+id_name).find('td.curr').removeClass('curr').addClass('sel').find('a').click();
		};
	};
	
	this.openPicker = function(id_name){
        
		$('.d-shadow-small').fadeOut(150);
		$('body').unbind('click');

		var size = 192;
		var related_item = $('#'+id_name);
		
		$('#calendar_frame_'+id_name).css({
			width: size,
			marginLeft: related_item.width()+27
		}).fadeIn(150, function(){

			$('#calendar_frame_'+id_name).mouseenter(function(){
				$('body').unbind('click');
			});

			$('#calendar_frame_'+id_name).mouseleave(function(){
				$('body').bind('click', function(){
					$('#calendar_frame_'+id_name).fadeOut(150);
				});
			});
		});

		var cdate = $('#parsed_'+id_name).val().substr(0, 10);
		this.setCurrentDate(id_name, related_item, cdate);

		$('#calendar_frame_'+id_name).find('.tool_button').unbind('mouseup').unbind('mouseleave').unbind('mousedown').unbind('click').hover(function(){
			$(this).addClass('hovered');

		}, function(){
			$(this).removeClass('hovered');
			$(this).removeClass('pressed');
			
		}).mousedown(function(){
			$(this).addClass('pressed');
			
		}).mouseup(function(){
			$(this).removeClass('pressed');

		}).click(function(){
			if($(this).attr('rel') != 'ok'){
				calendar.setCurrentDate(id_name, related_item, false);
			}else{
				$('#calendar_frame_'+id_name).fadeOut(150);
			};
		});

		$(window).bind('resize', function(){
            $('#calendar_frame_'+id_name).css({
				marginLeft: related_item.width()+27
			});
        });
	};
};

//Calendar object init
var calendar = new Calendar();

//Timepicker functions
function Timepicker(){
	this.getTime = function(time_instance){
		var time = {
			h1: time_instance[0].substr(0, 1),
			h2: time_instance[0].substr(1, 1),
			m1: time_instance[1].substr(0, 1),
			m2: time_instance[1].substr(1, 1)
		};
		return time;
	};

	this.parseZeroLeading = function(i){
		if(i < 10){
			return '0'+i;
		}else{
			return i;
		};
	};

	this.showTime = function(id_name){
		var d = $('#parsed_'+id_name).val();
		var t = explode(':', d.substr(11, 5));
		var time = this.getTime(t);

		$('#calendar_time_picker_instance_'+id_name).find('.h-1').text(time.h1);
		$('#calendar_time_picker_instance_'+id_name).find('.h-2').text(time.h2);
		$('#calendar_time_picker_instance_'+id_name).find('.m-1').text(time.m1);
		$('#calendar_time_picker_instance_'+id_name).find('.m-2').text(time.m2);

		$('#time_'+id_name).val(time.h1+time.h2+':'+time.m1+time.m2);
	};

	this.changeHour = function(time, obj, d, mode){
		var result = time.h1+time.h2;

		if(result.substr(0,1) == '0'){
			result = result.substr(1,1);
		};

		result = parseInt(result);

		if(mode == 0){
			result = result-1;
		}else{
			result = result+1;
		};

		if(result > 23){
			result = 0;
		};

		if(result < 0){
			result = 23;
		};

		var stime = time.m1+time.m2;

		if(stime.substr(0,1) == '0'){
			stime = stime.substr(1,1);
		};

		obj.val(d.substr(0, 11)+this.parseZeroLeading(result)+':'+this.parseZeroLeading(stime)+':00');
	};

	this.changeMinute = function(time, obj, d, mode){
		var result = time.m1+time.m2;

		if(result.substr(0,1) == '0'){
			result = result.substr(1,1);
		};

		result = parseInt(result);

		if(mode == 0){
			result = result-1;
		}else{
			result = result+1;
		};

		if(result > 59){
			result = 0;
		};

		if(result < 0){
			result = 59;
		};

		var stime = time.h1+time.h2;

		if(stime.substr(0,1) == '0'){
			stime = stime.substr(1,1);
		};

		obj.val(d.substr(0, 11)+this.parseZeroLeading(stime)+':'+this.parseZeroLeading(result)+':00');
	};

	this.changeTime = function(id_name, part, action){
		var d = $('#parsed_'+id_name);
		var t = explode(':', d.val().substr(11, 5));
		var time = this.getTime(t);

		if(part == 0){
			if(action == 0){
				this.changeHour(time, d, d.val(), 1);
			}else{
				this.changeHour(time, d, d.val(), 0);
			};
		}else{
			if(action == 0){
				this.changeMinute(time, d, d.val(), 1);
			}else{
				this.changeMinute(time, d, d.val(), 0);
			};
		};

		this.showTime(id_name);
	};

	this.bindControls = function(id_name){
		$('#calendar_time_picker_instance_'+id_name).find('.tpb_controls a').bind('click', function(){
			if($(this).attr('class') == 'h-up'){
				timepicker.changeTime(id_name, 0, 0);
			};

			if($(this).attr('class') == 'h-dn'){
				timepicker.changeTime(id_name, 0, 1);
			};

			if($(this).attr('class') == 'm-up'){
				timepicker.changeTime(id_name, 1, 0);
			};

			if($(this).attr('class') == 'm-dn'){
				timepicker.changeTime(id_name, 1, 1);
			};
		});

		$('#calendar_time_picker_instance_'+id_name).find('.tpb_controls a').bind('mouseenter', function(){
			if($(this).attr('class') == 'h-up'){
				$('#calendar_time_picker_instance_'+id_name).find('.h-1, .h-2').addClass('up_hovered');
			};

			if($(this).attr('class') == 'm-up'){
				$('#calendar_time_picker_instance_'+id_name).find('.m-1, .m-2').addClass('up_hovered');
			};

			if($(this).attr('class') == 'h-dn'){
				$('#calendar_time_picker_instance_'+id_name).find('.h-1, .h-2').addClass('dn_hovered');
			};

			if($(this).attr('class') == 'm-dn'){
				$('#calendar_time_picker_instance_'+id_name).find('.m-1, .m-2').addClass('dn_hovered');
			};
		});

		$('#calendar_time_picker_instance_'+id_name).find('.tpb_controls a').bind('mouseleave', function(){
			if($(this).attr('class') == 'h-up'){
				$('#calendar_time_picker_instance_'+id_name).find('.h-1, .h-2').removeClass('up_hovered');
			};

			if($(this).attr('class') == 'm-up'){
				$('#calendar_time_picker_instance_'+id_name).find('.m-1, .m-2').removeClass('up_hovered');
			};

			if($(this).attr('class') == 'h-dn'){
				$('#calendar_time_picker_instance_'+id_name).find('.h-1, .h-2').removeClass('dn_hovered');
			};

			if($(this).attr('class') == 'm-dn'){
				$('#calendar_time_picker_instance_'+id_name).find('.m-1, .m-2').removeClass('dn_hovered');
			};
		});
	};

	this.unbindControls = function(id_name){
		$('#calendar_time_picker_instance_'+id_name).find('.tpb_controls a').unbind('click');
		$('#calendar_time_picker_instance_'+id_name).find('.tpb_controls a').unbind('mouseenter');
		$('#calendar_time_picker_instance_'+id_name).find('.tpb_controls a').unbind('mouseleave');
	};

	this.setCurrentTime = function(id_name){
		var date = new Date();
		var h = date.getHours();
		var m = date.getMinutes();

		var sdate = $('#parsed_'+id_name).val().substr(0, 11);

		$('#parsed_'+id_name).val(sdate+this.parseZeroLeading(h)+':'+this.parseZeroLeading(m)+':00');
		
		this.showTime(id_name);
	};

	this.openPicker = function(id_name){
		this.showTime(id_name);
		this.unbindControls(id_name);
		this.bindControls(id_name);

		$('.d-shadow-small').fadeOut(150);
		$('body').unbind('click');

		var size = 198;
		var related_item = $('#time_'+id_name);

		$('#calendar_time_frame_'+id_name).css({
			width: size,
			marginLeft: related_item.offset().left-$('.form').offset().left+related_item.width()-3
		}).fadeIn(150, function(){

			$('#calendar_time_frame_'+id_name).mouseenter(function(){
				$('body').unbind('click');
			});

			$('#calendar_time_frame_'+id_name).mouseleave(function(){
				$('body').bind('click', function(){
					$('#calendar_time_frame_'+id_name).fadeOut(150);
				});
			});

			$('#calendar_time_picker_instance_'+id_name).find('.tool_button').unbind('mouseup').unbind('mousedown').unbind('click').hover(function(){
				$(this).addClass('hovered');

			}, function(){
				$(this).removeClass('hovered');
				$(this).removeClass('pressed');

			}).mousedown(function(){
				$(this).addClass('pressed');

			}).mouseup(function(){
				$(this).removeClass('pressed');

			}).click(function(){

				if($(this).attr('rel') != 'ok'){
					timepicker.setCurrentTime(id_name);
				}else{
					$('#calendar_time_frame_'+id_name).fadeOut(150);
				};
			});
		});

		var that = this;

		$(window).bind('resize', function(){
            $('#calendar_time_frame_'+id_name).css({
				marginLeft: related_item.offset().left-$('.form').offset().left+related_item.width()-3
			});
        });
	};
};

//Timepicker object init
var timepicker = new Timepicker();

//Colorpicker functions
function Colorpicker(){
	this.openPicker = function(id_name){
		$('.d-shadow-small').fadeOut(150);
		$('body').unbind('click');

		var size = 225;
		var related_item = $('#'+id_name);

		$('#color_picker_frame_'+id_name).css({
			width: size,
			marginLeft: related_item.width()+71
		}).fadeIn(150, function(){

			$('#color_picker_frame_'+id_name).mouseenter(function(){
				$('body').unbind('click');
			});

			$('#color_picker_frame_'+id_name).mouseleave(function(){
				$('body').bind('click', function(){
					$('#color_picker_frame_'+id_name).fadeOut(150);
				});
			});

		});

		$(window).bind('resize', function(){
            $('#color_picker_frame_'+id_name).css({
				marginLeft: related_item.width()+71
			});
        });
	};

	this.setHexColorValidatorListener = function(id_name){
		var hex_pattern = new RegExp('[^a-f|A-F|0-9]');

		$('#'+id_name).bind('keyup', function(){
			$('#'+id_name).val(
				$('#'+id_name).val().replace(hex_pattern, '').substr(0, 6)
			);
		});
	}
};

//Colorpicker object init
var colorpicker = new Colorpicker();

//Maps
//TODO : Move the Google Maps script calling here from the template (for optimize the page loading)
var gmaps_edit = {
    index: 0,
    map: new Array(),
    locations: new Array(
        {
            name: 'Moscow',
            lat: 52.739800523121595,
            lng: 37.587768554687486,
            zoom: 9
        }
    ),
    getData: function(id){
        var str = $('#col_'+id).val();
        
        if(!str){
            str = '-34.397;150.644;8;roadmap';
        };

        var a = explode(';', str);
        a[0] = parseFloat(a[0]);
        a[1] = parseFloat(a[1]);
        a[2] = parseInt(a[2]);

        switch(a[3]){
            case 'hybrid'       : a[3] = google.maps.MapTypeId.HYBRID; break;
            case 'roadmap'      : a[3] = google.maps.MapTypeId.ROADMAP; break;
            case 'sattelite'    : a[3] = google.maps.MapTypeId.SATELLITE; break;
            case 'terrain'      : a[3] = google.maps.MapTypeId.TERRAIN; break;
        };

        return a;
    },
    setData: function(map){
        var dom_id = $(map.getDiv()).attr('id');
        var id = dom_id.substr(8, dom_id.length);
        var data = {
            lat: map.getCenter().lat(),
            lng: map.getCenter().lng(),
            zoom: map.getZoom(),
            type: map.getMapTypeId()
        };
        var result = data.lat + ';' +data.lng + ';' + data.zoom + ';' + data.type;
        $('#col_'+id).val(result);
    },
    setInfoData: function(map){
        var dom_id = $(map.getDiv()).attr('id');
        var id = dom_id.substr(8, dom_id.length);

        $('#map_lat_col_'+id).val(map.getCenter().lat());
        $('#map_lng_col_'+id).val(map.getCenter().lng());
        $('#map_zoom_col_'+id).val(map.getZoom());
    },
    refreshData: function(id){
        id = id.substr(4, id.length);
        var map_id = $('#map_col_'+id).attr('index');
        var map = this.map[map_id].map;
        var lat = parseFloat($('#map_lat_col_'+id).val());
        var lng = parseFloat($('#map_lng_col_'+id).val());
        var zoom = parseInt($('#map_zoom_col_'+id).val());
        map.setCenter(new google.maps.LatLng(lat, lng));
        map.setZoom(zoom);
        this.setData(map);
    },
    refreshMarkerData: function(map, marker_id, marker, db_id){
        var dom_id = $(map.getDiv()).attr('id');
        var id = dom_id.substr(8, dom_id.length);

        $.ajax({
            type: 'GET',
            url: '/admin/',
            data: {
                ajax:           'true',
                option:         'sections',
                action:  	    'refresh_marker',
                id:             db_id,
                data:           marker.getPosition().lat()+';'+marker.getPosition().lng()
            },
            success: function(){
                $('.marker_lat[rel="'+marker_id+'"]').text(marker.getPosition().lat());
                $('.marker_lng[rel="'+marker_id+'"]').text(marker.getPosition().lng());
            }
        });
    },
    addMarker: function(dom_id, marker_id, lat, lng, num, db_id){
        var id = dom_id.substr(4, dom_id.length);
        var map_id = $('#map_'+dom_id).attr('index');

        this.map[map_id].markers[marker_id] = {
            num: num,
            id: marker_id,
            db_id: db_id,
            marker: new google.maps.Marker({
                position: new google.maps.LatLng(parseFloat(lat), parseFloat(lng)),
                map: this.map[map_id].map,
                draggable: true,
                title: '#'+num
            })
        };

        google.maps.event.addListener(this.map[map_id].markers[marker_id].marker, 'click', function() {
            this.getMap().panTo(this.getPosition());
        });

        google.maps.event.addListener(this.map[map_id].markers[marker_id].marker, 'dragend', function() {
            gmaps_edit.refreshMarkerData(this.getMap(), marker_id, this, db_id);
        });
    },
    saveMarker: function(db_id){
        var name = $('#marker_name_'+db_id).val();
        var desc = $('#marker_desc_'+db_id).val();
        var row = $('.marker_row[rel="'+db_id+'"]');

        $.ajax({
            type: 'POST',
            url: '/admin/?ajax=true&option=sections&action=set_marker_params',
            data: {
                id:   db_id,
                name: name,
                desc: desc
            },
            success: function(){
                row.next().remove();
                row.removeClass('selected-top');
            }
        });
    },
    editMarker: function(dom_id, marker_id, db_id){
        var row = $('.marker_stack[rel="'+dom_id+'"] .marker_row[rel="'+db_id+'"]');
        
        if(row.next().hasClass('marker_edit')){
            row.next().remove();
            row.removeClass('selected-top');
        }else{
            $.ajax({
                type: 'GET',
                url: '/admin/',
                dataType: 'json',
                data: {
                    ajax:           'true',
                    option:         'sections',
                    action:  	    'get_marker_params',
                    id:             db_id
                },
                success: function(data){
                    var edit_html =     '<tr class="marker_edit">' +
                                            '<td colspan="6">' +
                                                '<label>'+maps_texts.marker_name+'<input class="textfield" type="text" value="'+data.name+'" id="marker_name_'+db_id+'" /></label>' +
                                                '<label>'+maps_texts.marker_desc+'<textarea class="textarea" id="marker_desc_'+db_id+'">'+data.description+'</textarea></label>' +
                                                '<input class="button" type="button" value="'+maps_texts.marker_save+'" onclick="gmaps_edit.saveMarker(\''+db_id+'\')" />' +
                                            '</td>' +
                                        '</tr>';

                    row.after(edit_html);
                    row.addClass('selected-top');
                    row.next().addClass('selected-bottom');
                }
            });
        };
    },
    newMarker: function(dom_id, relative_id, section_id){
        var id = dom_id.substr(4, dom_id.length);
        var map_id = $('#map_'+dom_id).attr('index');
        var map = this.map[map_id].map;
        var num = 0;

        $('.markers_list[rel="col_'+id+'"] tr').each(function(){
            num++;
        });

        var pos = map.getCenter();
        var data = pos.lat()+';'+pos.lng();
        var marker_id = num-1;

        $.ajax({
            type: 'GET',
            url: '/admin/',
            dataType: 'json',
            data: {
                ajax:           'true',
                option:         'sections',
                action:  	    'add_marker',
                data:           data,
                relative_id:    relative_id,
                section_id:     section_id,
                form_item:      dom_id
            },
            success: function(data){
                var db_id = data.marker_id;
                
                gmaps_edit.map[map_id].markers[marker_id] = {
                    num: num,
                    id: db_id,
                    marker: new google.maps.Marker({
                        position: new google.maps.LatLng(pos.lat(), pos.lng()),
                        map: map,
                        draggable: true,
                        title: '#'+num
                    })
                };

                var marker = gmaps_edit.map[map_id].markers[marker_id].marker;

                google.maps.event.addListener(marker, 'click', function() {
                    this.getMap().panTo(this.getPosition());
                });

                google.maps.event.addListener(marker, 'dragend', function() {
                    gmaps_edit.refreshMarkerData(this.getMap(), marker_id, this, db_id);
                });

                marker.setAnimation(google.maps.Animation.DROP);

                var new_marker_row =    '<tr class="marker_row" rel="' + db_id + '">' +
                                            '<td align="center">' +
                                                num +
                                            '</td>' +
                                            '<td>' +
                                                '<a class="icon_action icon_marker_instance" href="javascript:void(0)" onclick="gmaps_edit.focusMarker(\''+dom_id+'\', \''+marker_id+'\', \''+db_id+'\')"></a>' +
                                            '</td>' +
                                            '<td>' +
                                                '<span class="marker_lat nowrap" rel="' + marker_id + '">' + pos.lat() + '</span>' +
                                            '</td>' +
                                            '<td>' +
                                                '<span class="marker_lng nowrap" rel="' + marker_id + '">' + pos.lng() + '</span>' +
                                            '</td>' +
                                            '<td>' +
                                                '<a href="javascript:void(0)" class="icon_action icon_edit_instance" onclick="gmaps_edit.editMarker(\''+dom_id+'\', \''+marker_id+'\', \''+db_id+'\')"></a>' +
                                            '</td>' +
                                            '<td>' +
                                                '<a href="javascript:void(0)" class="icon_action icon_delete_instance" onclick="gmaps_edit.deleteMarker(\''+dom_id+'\', \''+marker_id+'\', \''+db_id+'\')"></a>' +
                                            '</td>' +
                                        '</tr>';
                
                $('.marker_stack[rel="'+dom_id+'"]').append(new_marker_row);
                $('.markers_list[rel="'+dom_id+'"]').show();
            }
        });
    },
    focusMarker: function(dom_id, marker_id){
        var id = dom_id.substr(4, dom_id.length);
        var map_id = $('#map_'+dom_id).attr('index');
        var marker = this.map[map_id].markers[marker_id].marker;
        marker.getMap().panTo(marker.getPosition());
        marker.setAnimation(google.maps.Animation.BOUNCE);
        setTimeout(function(){
            marker.setAnimation(null);
        }, 500);
    },
    deleteMarker: function(dom_id, marker_id, db_id){
        var id = dom_id.substr(4, dom_id.length);
        var map_id = $('#map_'+dom_id).attr('index');

        if(confirm(maps_texts.marker_delete_confirm)){
            $.ajax({
                type: 'GET',
                url: '/admin/',
                data: {
                    ajax:           'true',
                    option:         'sections',
                    action:  	    'delete_marker',
                    id:             db_id
                },
                success: function(){
                    $('.marker_row[rel="'+db_id+'"]').remove();

                    var num = 0;
                    $('.markers_list[rel="'+dom_id+'"] tr').each(function(){
                        num++;
                    });

                    if(num < 2){
                        $('.markers_list[rel="'+dom_id+'"]').hide();
                    };

                    gmaps_edit.map[map_id].markers[marker_id].marker.setMap(null);
                }
            });
        };
    },
    geolocation: function(dom_id){
        var q = $('#geolocation_q_'+dom_id).val(),
            geocoder = new google.maps.Geocoder(),
            map_id = $('#map_'+dom_id).attr('index'),
            map = gmaps_edit.map[map_id].map;

        geocoder.geocode({
            address: q
        }, function(results, status){
            if(status == google.maps.GeocoderStatus.OK && results[0]){
                if(results[0].geometry){
                    if(results[0].geometry.location){
                        map.panTo(results[0].geometry.location);
                        map.setZoom(15);
                    };

                    if(results[0].geometry.bounds){
                        map.fitBounds(results[0].geometry.bounds);
                    };

                    $('#geolocation_q_'+dom_id).css({
                        color: 'green'
                    });
                };
            }else{
                $('#geolocation_q_'+dom_id).css({
                    color: 'red'
                });
            };
        });
    },
    init: function(id){
        id = id.substr(4, id.length);
        var data = gmaps_edit.getData(id);

        var map_id = this.index;

        this.map[map_id] = {
            id: id,
            markers: new Array(),
            map: new google.maps.Map(document.getElementById('map_col_' + id), {
                center: new google.maps.LatLng(data[0], data[1]),
                zoom: data[2],
                mapTypeId: data[3]
            })
        };

        $('#map_col_'+id).attr('index', map_id);
        
        gmaps_edit.setInfoData(this.map[map_id].map);
        gmaps_edit.setData(this.map[map_id].map);

        google.maps.event.addListener(this.map[map_id].map, 'click', function() {
            gmaps_edit.setData(this);
            gmaps_edit.setInfoData(this);
        });
        google.maps.event.addListener(this.map[map_id].map, 'dblclick', function() {
            gmaps_edit.setData(this);
            gmaps_edit.setInfoData(this);
        });
        google.maps.event.addListener(this.map[map_id].map, 'dragend', function() {
            gmaps_edit.setData(this);
            gmaps_edit.setInfoData(this);
        });
        google.maps.event.addListener(this.map[map_id].map, 'zoom_changed', function() {
            gmaps_edit.setData(this);
            gmaps_edit.setInfoData(this);
        });
        google.maps.event.addListener(this.map[map_id].map, 'maptypeid_changed', function() {
            gmaps_edit.setData(this);
            gmaps_edit.setInfoData(this);
        });
        google.maps.event.addListener(this.map[map_id].map, 'drag', function() {
            gmaps_edit.setData(this);
            gmaps_edit.setInfoData(this);
        });

        this.index++;
    }
};

var mailing = {
    message: new String(),
    window: null,

    send: function(data, iteration){
        if(iteration < data.length){
            var email = data[iteration].email;

            $.ajax({
                type: 'POST',
                url: '/admin/?ajax=true&action=sent_mailing_item',
                data: {
                    email:          email,
                    message:  	    mailing.message
                },
                beforeSend: function(){
                    $('#subscribers_list tr[rel="'+email+'"]').find('.status').addClass('loading');
                    mailing.window.setMessage('normal', 'Идет отправка письма на адрес '+email+' ('+((100/data.length)*iteration)+'% завершено, '+iteration+' из '+data.length+')');
                },
                success: function(){
                    $('#subscribers_list tr[rel="'+email+'"]').find('.status').removeClass('loading').addClass('ok');
                    result = true;

                    iteration++;
                    mailing.send(data, iteration);
                }
            });
        }else{
            this.window.unSetMessage();
            this.window.unSetLoading();
            mailing.window.setMessage(true, 'Рассылка завершена успешно');
        };
    },

    starMailing: function(data){
        mailing.window.setLoading();

        this.send(data, 0);

        $('#start_mailing').attr('disabled', 'disabled');
    },

    getSubscribersList: function(){
        $.ajax({
            type: 'GET',
            url: '/admin/',
            data: {
                ajax:           'true',
                action:  	    'get_subscribers_list'
            },
            dataType: 'json',
            beforeSend: function(){
                mailing.window.setLoading();
                mailing.window.setMessage('normal', 'Получение списка адресов');
            },
            success: function(data){
                mailing.window.unSetLoading();
                mailing.window.unSetMessage();

                var html = 'Письма будут разосланы по следующим адресам (всего '+data.length+')<table width="100%">';

                for(var i = 0, l = data.length; i < l; i++){
                    html += '<tr rel="'+data[i].email+'">' +
                                '<td width="1%">'+(i+1)+'</td>' +
                                '<td width="98%">'+data[i].email+'</td>' +
                                '<td width="1%"><i class="status"></i></td>' +
                            '</tr>';
                };

                html += '</table><br><input id="start_mailing" type="button" value="Начать рассылку" class="button" />';

                $('#subscribers_list').html(html).slideDown();

                $('#subscribers_list>table').find('tr:even').addClass('even_tr');
                $('#subscribers_list>table').find('tr:odd').addClass('odd_tr');

                $('#start_mailing').click(function(){
                    mailing.starMailing(data);
                });
            }
       });
    },

    proceed: function(){
        $('#mailing_form').slideUp();
        this.message = this.editor.getHtml();

        this.getSubscribersList();
    },

    edit: function(){
        this.window = new Window();

        var html =  '<div id="subscribers_list"></div>' +
                    '<form id="mailing_form" action="javascript:void(0)">' +
                        '<label>Текст письма<br><textarea rows="10" id="mailitg_text">'+editors[1].instance.getHtml()+'</textarea></label><br>' +
                        '<input type="submit" value="Далее" class="button" />' +
                    '</form>';

        this.window.createModal('Почтовая рассылка', html, 800);

        this.editor = $('#mailitg_text').redactor({
            resize: true,
            focus: false,
            lang: 'ru',
            toolbar: 'main',
            typo: '/admin/?action=typo',
            image_upload: '/admin/?action=upload&type=image',
            file_upload: '/admin/?action=upload&type=file'
        });

        $('#mailing_form').submit(function(){
            mailing.proceed();
        });
    }
};

var catalog = {
    createParam: function(id, params){
        var json = JSON.parse(decodeURIComponent($('#'+id).val()));

        json.push(params);
        $('#'+id).val(encodeURIComponent(JSON.stringify(json)));
        this.drawTable(id);
    },

    addParam: function(id){
        var editor_html =   '<div class="ie_container">' +
                                '<form action="javascript:void(0)" id="add_param_editor_form">' +
                                    '<div>' +
                                        '<label>Параметр<br><input autocomplete="off" class="text" type="text" id="add_param_key" value="" /></label>' +
                                        '<label>Значение<br><textarea autocomplete="off" class="area" id="add_param_val" rows="3"></textarea></label>' +
                                        '<input class="button" id="ie_save" type="submit" value="Добавить" />' +
                                    '</div>' +
                                '</form>' +
                            '</div>';

        var window = new Window();
        window.createModal('Добавить параметр в каталог', editor_html, 500);

        $('#add_param_editor_form').on('submit', function(){
            if($('#add_param_key').val()){
                catalog.createParam(id, {
                    key: $('#add_param_key').val(),
                    val: $('#add_param_val').val()
                });
                window.destroyModal();
            }else{
                alert('Параметр не может быть пустым.');
            };
        });
    },

    deleteCatalogIndex: function(id, index){
        if(confirm('Удалить параметр?')){
            var json = JSON.parse(decodeURIComponent($('#'+id).val()));
            delete json[index];
            var new_json = new Array();

            for(var i = 0, l = json.length; i < l; i++){
                if(json[i] != null){
                    new_json.push(json[i]);
                };
            };

            json = new_json;

            $('#'+id).val(encodeURIComponent(JSON.stringify(json)));
            this.drawTable(id);
        };
    },

    editCatalogIndex: function(id, index){
        var json = JSON.parse(decodeURIComponent($('#'+id).val()));

        var editor_html =   '<div class="ie_container">' +
                                '<form action="javascript:void(0)" id="edit_param_editor_form">' +
                                    '<div>' +
                                        '<label>Параметр<br><input autocomplete="off" class="text" type="text" id="edit_param_key" value="'+json[index].key+'" /></label>' +
                                        '<label>Значение<br><textarea autocomplete="off" class="area" id="edit_param_val" rows="3">'+json[index].val+'</textarea></label>' +
                                        '<input class="button" id="ie_save" type="submit" value="Сохранить" />' +
                                    '</div>' +
                                '</form>' +
                            '</div>';

        var window = new Window();
        window.createModal('Редактировать параметр', editor_html, 500);

        $('#edit_param_editor_form').on('submit', function(){
            if($('#edit_param_key').val()){
                json[index] = {
                    key: $('#edit_param_key').val(),
                    val: $('#edit_param_val').val()
                };

                $('#'+id).val(encodeURIComponent(JSON.stringify(json)));
                catalog.drawTable(id);

                window.destroyModal();
            }else{
                alert('Параметр не может быть пустым.');
            };
        });
    },

    drawTable: function(id){
        var json = JSON.parse(decodeURIComponent($('#'+id).val())),
            html = new String();

        if(json){
            for(var i = 0, l = json.length; i < l; i++){
                if(json[i] != null){
                    html += '<tr>' +
                                '<td>'+(i+1)+'</td>' +
                                '<td>'+json[i].key+'</td>' +
                                '<td>'+json[i].val+'</td>' +
                                '<td><a title="Редактировать" onclick="catalog.editCatalogIndex(\''+id+'\', '+i+');" href="javascript:void(0)" class="icon_action icon_edit_instance"></a></td>' +
                                '<td><a title="Удалить" onclick="catalog.deleteCatalogIndex(\''+id+'\', '+i+');" href="javascript:void(0)" class="icon_action icon_delete_instance"></a></td>' +
                            '</tr>';

                };
            };

            $('#catalog_'+id).find('table tr').not('.thead').remove();
            $('#catalog_'+id).find('table').append(html);
        };
    },

    init: function(id){
        this.drawTable(id);
    }
};

var blocks = {
    /*
    * [place_id],[status],[block];
    * */
    getCurrentValue: function(){
        var v = $('input#blocks').val();
        return v;
    },

    blockRenew: function(){
        var result = new String();

        $('#blocks_table tr').not(':first').each(function(){
            var block = $(this).find('.blocks_set').val(),
                id = $(this).attr('rel');

            if(typeof status == undefined){
                status = '0';
            };

            result += id+','+block+';';
        });

        result = result.substring(0, result.length-1);

        $('input#blocks').val(result);
    },

    init: function(){
        $('.blocks_set').on('change', function(){
            blocks.blockRenew();
            blocks.blockRenew();
        });
    }
};

//Template selector
var template_selector = {
    createBrowser: function(id, root_dir){
        browser.create({
            id          : 'browser_frame_'+id,
            filetypes   : ['tpl', 'tpls'],
            root_dir    : root_dir,
            onSelect    : function(id, file){
                
            }
        });
    }
};

//Misc
$(function(){
    $('.form .related_list tr').not(':first').hover(function(){
        $(this).addClass('hovered');
    }, function(){
        $(this).removeClass('hovered');
    });
});