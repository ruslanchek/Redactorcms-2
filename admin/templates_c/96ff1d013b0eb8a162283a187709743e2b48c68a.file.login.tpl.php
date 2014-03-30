<?php /* Smarty version Smarty 3.1.4, created on 2014-03-06 22:26:19
         compiled from "/Users/ruslan/Sites/redactorcms2/admin/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5263542785318bdcb2bc724-06676238%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96ff1d013b0eb8a162283a187709743e2b48c68a' => 
    array (
      0 => '/Users/ruslan/Sites/redactorcms2/admin/templates/login.tpl',
      1 => 1394129899,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5263542785318bdcb2bc724-06676238',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
    'login' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_5318bdcb3efb5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5318bdcb3efb5')) {function content_5318bdcb3efb5($_smarty_tpl) {?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $_smarty_tpl->tpl_vars['main']->value->title;?>
</title>
                
        <link rel="stylesheet" type="text/css" href="/admin/css/login.css" media="all" />
        <link rel="shortcut icon" type="image/x-icon" href="/admin/img/icons/favicon.ico">
        
        <script type="text/javascript" src="/admin/js/jquery.js"></script>
        <script type="text/javascript" src="/admin/js/login.js"></script>
    </head>
    
    <body>
        <div class="content">
            <div class="logo"><img src="/admin/img/logos/login_logo.png"></div>

            <div class="login-form-block rotation">
                <?php if ($_smarty_tpl->tpl_vars['login']->value->error){?>
                    <div class="error"><?php echo $_smarty_tpl->tpl_vars['login']->value->error;?>
</div>
                <?php }?>

                <form method="POST" action="/admin/?action=login">
                    <input class="textinput" id="auth_login" name="auth_login" type="text" tabindex="1" placeholder="Логин" />

                    <input class="textinput" id="auth_password" name="auth_password" type="password" tabindex="2" placeholder="Пароль" />

                    <label class="checkbox" title="Если авторизоваться с привязкой к IP, то никто больше не сможет авторизоваться с вашим лигином и паролем на время вашей сессии.">
                        <input type="checkbox" checked name="auth_attach_ip" tabindex="3">
                        Привязать сессию к IP-адресу
                    </label>

                    <div class="submit">
                        <input class="button big blue" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('login','form_button_enter_text');?>
" tabindex="4" />
                    </div>
                </form>
            </div>

            <div class="footer">
                <p>
                    &copy; 2009&ndash;<?php echo $_smarty_tpl->tpl_vars['main']->value->config['current_year'];?>

                    Система управления сайтом &laquo;Редактор&raquo;<br>
                    <em><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('footer','version');?>
 <?php echo $_smarty_tpl->tpl_vars['main']->value->config['current_version'];?>
</em>
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
</html><?php }} ?>