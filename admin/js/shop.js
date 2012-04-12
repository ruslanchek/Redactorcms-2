var users = {
    generatePassword: function(suboption, id, email){
        if(confirm('Будет сброшен старый пароль и сгенерирован новый')){
            $.ajax({
                type: 'GET',
                url: '/admin/',
                data: {
                    ajax        : 'true',
                    option      : 'users',
                    suboption   : suboption,
                    action      : 'generate_new_password',
                    id          : id
                },
                success: function(data){
                    var window = new Window();

                    data = $.trim(data);

                    var html = 'Новый пароь пользователя &mdash; <code>'+data+'</code><br><br>'+
                               '<p><a class="dashed" id="send_password_to_user" href="javascript:void(0)">Выслать новый пароль на почту пользователя</a></p>';

                    window.createModal('Сгенерирован новый пароль', html, 400);

                    $('#send_password_to_user').live('click', function(){
                        users.sendPassword(suboption, data, email, $(this), window);
                    });
                }
            });
        };
    },

    sendPassword: function(suboption, password, email, obj, window){
        $.ajax({
            type: 'GET',
            url: '/admin/',
            beforeSend: function(){
                window.setLoading();
                obj.parent().slideUp(200);
            },
            data: {
                ajax        : 'true',
                option      : 'users',
                action      : 'send_password',
                email       : email,
                password    : password,
                suboption   : suboption
            },
            success: function(data){
                obj.parent().html('<em>Пароль отправлен на адрес '+email+'</em>').slideDown(200);
                window.unSetLoading();
            }
        });
    }
}