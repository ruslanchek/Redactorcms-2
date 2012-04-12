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
        <img src="/admin/img/bg/bg.jpg" id="bg" />
        <div class="content">
            <div class="logo"></div>

            <div class="login_form">
                <div class="login_form_block rotation">
                    {if $login->error}
                    <div class="error">{$login->error}</div>
                    {/if}

                    <form method="POST" action="/admin/?action=login">
                        <label for="auth_login">{$main->getText('login', 'form_login_label')}</label><br>
                        <input class="textinput" id="auth_login" name="auth_login" type="text" tabindex="1" />

                        <label for="auth_password">{$main->getText('login', 'form_password_label')}</label><br>
                        <input class="textinput" id="auth_password" name="auth_password" type="password" tabindex="2" />

                        <label><input type="checkbox" class="checkbox" name="auth_attach_ip" tabindex="3">{$main->getText('login', 'form_attach_ip_label')}</label>

                        <div class="submit">
                            <input type="submit" value="{$main->getText('login', 'form_button_enter_text')}" tabindex="4" />
                        </div>
                    </form>
                </div>

                <div class="footer">
                    <p>
                        &copy; 2007&ndash;{$main->config['current_year']}
                        {$main->getText('footer', 'copyright_text')}<br>
                        <em>{$main->getText('footer', 'version')} {$main->config['current_version']}</em>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>