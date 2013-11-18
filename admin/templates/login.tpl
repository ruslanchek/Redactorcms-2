<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>{$main->title}</title>
                
        <link rel="stylesheet" type="text/css" href="/admin/css/login.css" media="all" />
        <link rel="shortcut icon" type="image/x-icon" href="/admin/img/icons/favicon.ico">
        
        <script type="text/javascript" src="/admin/js/jquery.js"></script>
        <script type="text/javascript" src="/admin/js/login.js"></script>
    </head>
    
    <body>
        <div class="content">
            <div class="logo"><img src="/admin/img/logos/login_logo.png"></div>

            <div class="login-form-block rotation">
                {if $login->error}
                    <div class="error">{$login->error}</div>
                {/if}

                <form method="POST" action="/admin/?action=login">
                    <input class="textinput" id="auth_login" name="auth_login" type="text" tabindex="1" placeholder="Логин" />

                    <input class="textinput" id="auth_password" name="auth_password" type="password" tabindex="2" placeholder="Пароль" />

                    <label class="checkbox" title="Если авторизоваться с привязкой к IP, то никто больше не сможет авторизоваться с вашим лигином и паролем на время вашей сессии.">
                        <input type="checkbox" checked name="auth_attach_ip" tabindex="3">
                        Привязать сессию к IP-адресу
                    </label>

                    <div class="submit">
                        <input class="button big blue" type="submit" value="{$main->getText('login', 'form_button_enter_text')}" tabindex="4" />
                    </div>
                </form>
            </div>

            <div class="footer">
                <p>
                    &copy; 2009&ndash;{$main->config['current_year']}
                    Система управления сайтом &laquo;Редактор&raquo;<br>
                    <em>{$main->getText('footer', 'version')} {$main->config['current_version']}</em>
                </p>
            </div>
        </div>

        <script>
            function animate(p){
                p = p + 1;

                if(p > 368){
                    p = 1;
                }

                $('body').css({
                    backgroundPosition: -p + 'px ' + p + 'px'
                });

                setTimeout(function(){
                    animate(p);
                }, 40);
            }

            $(function(){
                animate(0);
            });
        </script>
    </body>
</html>