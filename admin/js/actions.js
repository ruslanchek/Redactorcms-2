var cookie_options = { path: '/', expires: 365 };

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

//In_array like PHP in_array() function
function in_array(what, where){
    for(var i = 0, l = where.length; i < l; i++){
        if(what == where[i]){
            return true;
        }else{
        	return false;
        };
    };
};

//Exit system
function confirmMessage(message, url){
    if(confirm(message)){
        document.location.href = url;
    };
};

//Modal window class
function Window(class_add){
    this.prepareCode = function(header, html){
        var code =  '<div class="window '+class_add+'" id="modal_window">' +
                        '<a href="javascript:void(0)" id="modal_closer"></a>' +
                        '<h1>'+header+'</h1>' +
                        '<div class="message" title="Клик закроет это сообщение"></div>' +
                        '<div class="window_content">'+html+'</div>' +
                    '</div>';
        return code;
    };

    this.setLoading = function(){
        
    };
    
    this.setModalDimensions = function(){
        var that = this;
        $('#modal_window').css({
            width: that.width,
            marginLeft: -that.width/2
        });
    };
    
    this.setModalPosition = function(){
        $('#modal_window').css({
            marginTop: -$('#modal_window').height()/2
        });
    };

    this.unSetMessage = function(){
        $('#modal_window .message').html('').hide();
    };

    this.setMessage = function(status, message){
        this.unSetMessage();
        
        if(status){
            $('#modal_window .message').html(message).addClass('ok').show();
        }else{
            $('#modal_window .message').html(message).addClass('error').hide();
        };
    };

    this.setLoading = function(){
        this.unSetLoading();
        $('#modal_window').addClass('loading');
    };

    this.unSetLoading = function(){
        $('#modal_window').removeClass('loading');
    };
    
    this.createOverlay = function(){
        $('body').prepend('<div id="fs_overlay"></div>');
        $('#fs_overlay').css('background', 'black').show();
    };
    
    this.createModal = function(header, html, width){
        var that = this;

        $('#modal_window, #fs_overlay').remove();
        this.width = width;
        $('body').prepend(this.prepareCode(header, html));

        $('#modal_window .message').live('click', function(){
            that.unSetMessage();
        });

        this.setModalDimensions();
        this.setModalPosition();
        this.createOverlay();

        $(window).bind('resize', function(){
            that.setModalPosition();
        });

        $(document).bind('scroll', function(){
            that.setModalPosition();
        });

        $('#modal_closer').bind('click', function(){
            that.destroyModal();
        });

        $('body').on('keyup', function(e){
            if(e.keyCode == 27){
                that.destroyModal();
            };
        });
    };
    
    this.destroyModal = function(){
        $('body').off('keyup');
        $(window).unbind('resize');
        $(document).unbind('scroll');
        $('#modal_closer').unbind('click');
        $('#modal_window, #fs_overlay').remove();
    };
};

//Pager CTRL navigation
function setPagerLink(prev, next){
    var focusInInput = false;
    var isOSX = navigator.userAgent.match(/OS X/i) != null;

    if(isOSX){
        $('#navbutton').text('Alt');
    };

    $(document).bind('keyup', function(event){
        if((event.ctrlKey || event.altKey) && !focusInInput){
            var link = null;

            if(prev){
                switch (event.keyCode ? event.keyCode : event.which ? event.which : null){
                    case 0x25: link = prev; break;
                };
            };

            if(next){
                switch (event.keyCode ? event.keyCode : event.which ? event.which : null){
                    case 0x27: link = next; break;
                };
            };

            if(link){
                document.location = link;
            };
        };
    });
};

//File browser
var browser = {
    getPathHtml: function(path){
        var result = '';
        var parts = explode('/', path);
        var path = '';

        for(var i = 0, l = parts.length; i < l; i++){
            if(parts[i].length > 0){
                path += '/'+parts[i];
                result += '<li><a path="'+path+'" href="javascript:void(0)" class="pathlink">' + parts[i] + '</a></li>';
            };
        };

        result += '<div class="cl"></div>';

        return result;
    },

    getBrowserHtml: function(){
        var html =  '<div class="browser_frame">' +
                        '<ul class="browser_path">' +
                            this.getPathHtml(this.params.root_dir) +
                        '</ul>' +
                    '</div>';

        return html;
    },
    create: function(params){
        this.params = params;
        var obj = $('#'+this.params.id);

        obj.html(this.getBrowserHtml());
    }
};

function translit(str){
    var tr = [
        ['А', 'a'],
        ['Б', 'b'],
        ['В', 'v'],
        ['Г', 'g'],
        ['Д', 'd'],
        ['Е', 'e'],
        ['Ё', 'e'],
        ['Ж', 'j'],
        ['З', 'z'],
        ['И', 'i'],
        ['Й', 'y'],
        ['К', 'k'],
        ['Л', 'l'],
        ['М', 'm'],
        ['Н', 'n'],
        ['О', 'o'],
        ['П', 'p'],
        ['Р', 'r'],
        ['С', 's'],
        ['Т', 't'],
        ['У', 'u'],
        ['Ф', 'f'],
        ['Х', 'h'],
        ['Ц', 'ts'],
        ['Ч', 'ch'],
        ['Ш', 'sh'],
        ['Щ', 'sch'],
        ['Ъ', ''],
        ['Ы', 'yi'],
        ['Ь', ''],
        ['Э', 'e'],
        ['Ю', 'yu'],
        ['Я', 'ya'],
        ['а', 'a'],
        ['б', 'b'],
        ['в', 'v'],
        ['г', 'g'],
        ['д', 'd'],
        ['е', 'e'],
        ['ё', 'e'],
        ['ж', 'j'],
        ['з', 'z'],
        ['и', 'i'],
        ['й', 'y'],
        ['к', 'k'],
        ['л', 'l'],
        ['м', 'm'],
        ['н', 'n'],
        ['о', 'o'],
        ['п', 'p'],
        ['р', 'r'],
        ['с', 's'],
        ['т', 't'],
        ['у', 'u'],
        ['ф', 'f'],
        ['х', 'h'],
        ['ц', 'ts'],
        ['ч', 'ch'],
        ['ш', 'sh'],
        ['щ', 'sch'],
        ['ъ', 'y'],
        ['ы', 'yi'],
        ['ь', ''],
        ['э', 'e'],
        ['ю', 'yu'],
        ['я', 'ya']
    ];

    for(var i = 0, l = tr.length; i < l; i++){
        var reg = new RegExp(tr[i][0], "g");

        str = str.replace(reg, tr[i][1]);
    };

    return str;
};

function escapeUrl(str){
    var reg = new RegExp('/[^a-zA-Z0-9-\?]/', "g");
    str = str.replace(reg, "-", str);

    var reg = new RegExp(' ', "g");
    str = str.replace(reg, "-", str);

    var reg = new RegExp('__', "g");
    str = str.replace(reg, "-", str);

    var reg = new RegExp('\\?', "g");
    str = str.replace(reg, "", str);

    str = str.toLowerCase();

    return translit(str);
}

function colorizeTable(table_obj){
    table_obj.find('tr:even').not('.nocolor').not(':first').addClass('even_tr');
    table_obj.find('tr:odd').not('.nocolor').not(':first').addClass('odd_tr');

    table_obj.find('tr').not('.nocolor').not(':first').hover(function(){
        $(this).addClass('colored_row_hover');
    },function(){
        $(this).removeClass('colored_row_hover');
    });
};

$(function(){
    colorizeTable($('.list_table'));
    $('select:visible').chosen();

    $('a.ajax_viewport_link').on('click', function(e){
        e.preventDefault();

        var w = new Window('no-padding');

        var html = '<iframe src="' + $(this).data('src') + '&ajax_viewport=true" height="553" width="100%" frameborder="no"></iframe>';

        w.createModal($(this).data('action_header'), html, 960);
    });
});