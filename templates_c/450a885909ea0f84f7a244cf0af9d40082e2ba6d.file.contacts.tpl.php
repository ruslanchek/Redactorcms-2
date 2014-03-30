<?php /* Smarty version Smarty 3.1.4, created on 2014-02-13 14:45:29
         compiled from "/home/sdnadmin/site_new/templates/contacts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:72179207352e953837ae837-95277187%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '450a885909ea0f84f7a244cf0af9d40082e2ba6d' => 
    array (
      0 => '/home/sdnadmin/site_new/templates/contacts.tpl',
      1 => 1392288321,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72179207352e953837ae837-95277187',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e9538384c95',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e9538384c95')) {function content_52e9538384c95($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <?php echo $_smarty_tpl->getSubTemplate ("include/common/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <link href='//api.tiles.mapbox.com/mapbox.js/v1.5.0/mapbox.css' rel='stylesheet' />
    <script src='//api.tiles.mapbox.com/mapbox.js/v1.5.0/mapbox.js'></script>
</head>

<body>
<div class="limiter">
    <header class="header">
        <?php echo $_smarty_tpl->getSubTemplate ("include/common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('mainpage'=>false), 0);?>

    </header>

    <div class="page-banner pb-<?php echo rand(1,5);?>
">
        <h1><?php echo $_smarty_tpl->tpl_vars['core']->value->page['h1'];?>
</h1>
    </div>

    <div class="inner-content">
        <div class="units-row-end">
            <div class="unit-66">
                <nav class="nav-tabs" data-toggle="tabs" data-height="equal">
                    <ul>
                        <li><a id="msk-tab" href="#MSK">Москва</a></li>
                        <li><a id="spb-tab" class="active" href="#SPB">Санкт-Перербург</a></li>
                        
                    </ul>
                </nav>

                <div id="SPB">
                    <?php echo $_smarty_tpl->tpl_vars['core']->value->getPage(73);?>

                </div>

                <div id="MSK">
                    <?php echo $_smarty_tpl->tpl_vars['core']->value->getPage(114);?>

                </div>
            </div>

            <div class="unit-33">
                <div class="form contacts-form" id="feedback-form-contacts">
                    <h2>Написать письмо</h2>

                    <div class="form-message"></div>

                    <form action="#" id="feedback-form">
                        <div class="form-items">
                            <input type="text" name="feedback_name" placeholder="Имя" />
                            <input type="email" name="feedback_email" placeholder="Электронная почта" />
                            <input type="tel" name="feedback_phone" placeholder="Телефон" />

                            <textarea name="feedback_message" rows="5" placeholder="Сообщение"></textarea>

                            <p><small>Все поля обязательны для заполнения</small></p>

                            <div class="submit-block">
                                <input class="button" type="submit" value="Отправить письмо" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="map" id="spb-map">
    <script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=k8kybgnBaK7IBIitcEy87s3uztJdDMbU&width=100%&height=450"></script>
</div>

<div class="map" style="display: none" id="msk-map">
    <script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=dZ-2ypScRi2atTk2_ftd54rxLPBs_EFI&width=100%&height=450"></script>
</div>

<script>
    $(function(){
        feedback.init();

        $('#spb-tab').on('click.map', function(){
            $('#spb-map').show();
            $('#msk-map').hide();
        });

        $('#msk-tab').on('click.map', function(){
            $('#msk-map').show();
            $('#spb-map').hide();
        });
    });
</script>

<?php echo $_smarty_tpl->getSubTemplate ("include/common/news-shortlist.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<footer class="footer">
    <?php echo $_smarty_tpl->getSubTemplate ("include/common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</footer>
</body>
</html><?php }} ?>