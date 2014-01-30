$(document).ready(function(){

});

function clearIndex(){
    if(confirm('Очистить таблицу индексов?')){
        document.location = '?option=search&suboption=clear';
    };
};

function explode(delimiter, string){
    var emptyArray = {0: ''};

    if(arguments.length != 2 || typeof arguments[0] == 'undefined' || typeof arguments[1] == 'undefined'){
        return null;
    };

    if(delimiter === '' || delimiter === false || delimiter === null ){
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

results_all = new Array();

function searchCompleted(co){
    $('#status_message').html('Проиндексировано страниц: '+co);
    alert('Обновление таблицы индексов завершено!');
    $('#start_index').show();
};

count = 0;

function drawResult(data){
    var eve = explode('~~', data);
    var id = eve[0];
    var url = eve[1];
    //var lastupdate = eve[2];
    var title = eve[3];
    var referrer = eve[4];
    var status = eve[5];
    var mt = '';

    var evnt_message, tr_cond;

    if(title.length > 25){
        mt = '...';
    };

    if(status == '0'){
        evnt_message = '<img alt="x" title="Страница не проиндексирована" src="/admin/templates/img/icons/breaked.png" width="14" height="14" />';
        tr_cond = 'tr_disabled';
        var title = '';
        var title_short = 'Не проиндексировано';
    }else if(status == '1'){
        count++;
        evnt_message = '<img alt="ok" title="Страница проиндексирована" src="/admin/img/icons/ok.png" width="14" height="14" />';
        tr_cond = 'tr_active';
        var title_short = title.substr(0, 25);
    };

    $('#start_index').hide();
    $('#stopsending').show();
    $('#status_message').html('<div class="search_progress">Выполняется индексация</div>');
    $('#result_of_indexing').show();
    $('.result_of_mail_tab').append('<tr class="'+tr_cond+'"><td align="center">'+id+'</td><td>'+evnt_message+'</td><td title="'+title+'">'+title_short+mt+'</td><td><a href="'+url+'">'+url+'</a></td><td><a href="'+referrer+'">'+referrer+'</a></td></tr>');

    $('table#fulltable tr:even:gt(0)').addClass('pg_table_even');
};

function ref(){
    $.ajax({
        url: '/admin/?option=search&remote_action=update',
        success: function(data){
            var clear_data = data.replace(/!_complete_!/gi, "");

            var out = explode(';;', clear_data);

            for(i = 0; i < out.length; i++){
                if(out[i] != ''){
                    drawResult(out[i]);
                };
            };

            if(data.substr(0, 12) != '!_complete_!'){
                ref();
            }else{
                searchCompleted(count);
            };
        }
    });
};

function refreshIndex(){
    $('.result_of_mail_tab tr').not(':first').remove();
    $('#status_message').html('<div class="search_progress">Выполняется индексация</div>');
    ref();
};

function updateIndex(){
    if(confirm('Обновление таблицы индексов займет некоторое время, начать обновление?')){
        refreshIndex();
    };
};