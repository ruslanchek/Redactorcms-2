//List have checked
function haveChecked(ho_animation){
    var checkeds = false;
    var hiddens = false;
    var showeds = false;

    $('.list_table .checkbox').not('#list_checkbox_master').each(function(){
        if($(this).is(':checked')){
            checkeds = true;

            if($(this).attr('publish') == '1'){
                showeds = true;
            }else{
                hiddens = true;
            };
        };
    });

    if(ho_animation){
        var speed = 0;
    }else{
        var speed = 150;
    };

    if(checkeds){
        if(showeds && !hiddens){
            $('.multiaction_button').not('[rel="show"]').show(speed);
            $('.multiaction_button[rel="show"]').hide(speed);

        }else if(!showeds && hiddens){
            $('.multiaction_button').not('[rel="hide"]').show(speed);
            $('.multiaction_button[rel="hide"]').hide(speed);

        }else{
            $('.multiaction_button').show(speed);
        };
    }else{
        $('.multiaction_button').hide(speed);
    };
};

//Initialize a list table
function initList(){
    //Select all items
    $('.list_table #list_checkbox_master').click(function(){
        if($(this).is(':checked')){
            $('.list_table td .checkbox').attr('checked', true);
        }else{
            $('.list_table td .checkbox').attr('checked', false);
        };

        haveChecked();
    });

    //Select a list item
    $('.list_table .checkbox').not('#list_checkbox_master').click(function(){
        haveChecked();
    });

    haveChecked(true);
};

//Section search
function autocompleteSearch(obj, link){
    obj.autocomplete(link, {
        width: obj.width()+25,
        selectFirst: true
    });
};

//Startup bindings
$(function(){
    initList();
});

//List class

//TODO : Table name must be used instead of the section ids
function List(){
    this.init = function(section_id){
        this.section_id = section_id;
    }

    this.getSelectedItems = function(){
        var result = new String();

        $('.list_table .checkbox').not('#list_checkbox_master').each(function(){
            if($(this).attr('iid')*1 > 0 && $(this).is(':checked')){
                result += $(this).attr('iid')+';';
            };
        });

        return result.substr(0, result.length-1);
    }

    this.getAllItemsReorder = function(){
        var result = new String();

        $('.list_table .sorting input').each(function(){
            if($(this).attr('iid')*1 > 0){
                result += $(this).attr('iid')+','+$(this).val()+';';
            };
        });

        return result.substr(0, result.length-1);
    }

    this.switchItemState = function(obj, table, colname, id){
        var mode = obj.attr('mode');

        if(mode == 0){
            obj.removeClass('switcher_off');
            obj.addClass('switcher_on');
            obj.attr('mode', 1);

            var setmode = 1;
        }else{
            obj.addClass('switcher_off');
            obj.removeClass('switcher_on');
            obj.attr('mode', 0);

            var setmode = 0;
        };

        $.ajax({
            url: '/admin/',
            type: "GET",
            data: {
                action  : 'swithcer',
                ajax    : 'true',
                col     : colname,
                table   : table,
                value   : setmode,
                id      : id
            }
        });
    }

    this.multiOperation = function(message, operation, url){
        var that = this;

        if(operation == 'reorder'){
            var items = this.getAllItemsReorder();
        }else{
            var items = this.getSelectedItems();
        };

        if(message){
            if(confirm(message)){
                var passed = true;
            };
        }else{
            var passed = true;
        };

        if(passed){
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    id          : that.section_id,
                    operation   : operation,
                    items       : items
                },
                success: function(data){
                    document.location.reload();
                }
            });
        };
    }

    this.upItem = function(id, url){
        var row_obj = $('.list_table tr[iid="'+id+'"]');
        var target_row = row_obj.prev();
        var row_value = row_obj.find('.sorting input').val();
        var target_value = target_row.find('.sorting input').val();
        var target_id = target_row.attr('iid');
        
        if(target_id > 0){
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    row_id:         id,
                    target_id:      target_id,
                    row_value:      target_value,
                    target_value:   row_value
                },
                success: function(data){
                    document.location.reload();
                }
            });
        };
    }

    this.downItem = function(id, url){
        var row_obj = $('.list_table tr[iid="'+id+'"]');
        var target_row = row_obj.next();
        var row_value = row_obj.find('.sorting input').val();
        var target_value = target_row.find('.sorting input').val();
        var target_id = target_row.attr('iid');

        if(target_id > 0){
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    row_id:         id,
                    target_id:      target_id,
                    row_value:      target_value,
                    target_value:   row_value
                },
                success: function(data){
                    document.location.reload();
                }
            });
        };
    }
}

var list = new List();

list.ie = {
    open: function(import_link, export_link){
        var window = new Window();

        var html =  '<p><a href="'+export_link+'">Выгрузить XLS</a></p><hr><br>' +
                    '<form enctype="multipart/form-data" action="'+import_link+'" method="post">' +
                        '<label><input type="file" name="csv" /></label>' +
                        '<input type="submit" value="Загрузить XLS" />'
                    '</form>';

        window.createModal('Импорт-экспорт XLS', html, 400);
    }
};