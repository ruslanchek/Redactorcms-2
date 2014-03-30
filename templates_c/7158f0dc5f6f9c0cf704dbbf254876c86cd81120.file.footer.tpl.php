<?php /* Smarty version Smarty 3.1.4, created on 2014-02-25 19:10:25
         compiled from "/home/sdnadmin/site_new/templates/include/common/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59737835352e9518d9c2ea8-47702367%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7158f0dc5f6f9c0cf704dbbf254876c86cd81120' => 
    array (
      0 => '/home/sdnadmin/site_new/templates/include/common/footer.tpl',
      1 => 1393341020,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59737835352e9518d9c2ea8-47702367',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e9518da1a50',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e9518da1a50')) {function content_52e9518da1a50($_smarty_tpl) {?><div class="limiter">
    <div class="units-row">
        <?php echo $_smarty_tpl->getSubTemplate ("include/common/footer-menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


        <div class="unit-33 float-right">
            <div class="address">
                <h2>Адрес</h2>

                <p>
                    <?php echo $_smarty_tpl->tpl_vars['core']->value->getConstant('common','corporate_address');?>

                </p>

                <div class="contact">
                    <div class="phones">
                        <div class="phone">+7 (812) 319-00-04</div>
                        <div class="phone">+7 (495) 980-60-09</div>
                    </div>

                    <a href="#" class="link call-me-opener">Заказать обратный звонок</a>
                    <a href="#" class="link feedback-opener">Написать письмо</a>
                </div>
            </div>
        </div>

        <div class="clear"></div>
    </div>

    <br>
    <hr>
    <br>

    <div class="units-row">
        <div class="unit-20">
            <div class="copy">
                &copy;

                <?php if ($_smarty_tpl->tpl_vars['core']->value->getConstant('common','start_year')<date('Y')){?>
                    <?php echo $_smarty_tpl->tpl_vars['core']->value->getConstant('common','start_year');?>
&ndash;
                <?php }?>

                <?php echo date('Y');?>


                <?php echo $_smarty_tpl->tpl_vars['core']->value->getConstant('common','brand_name');?>

            </div>
        </div>

        <div class="unit-40">
            <div class="search-form">
                <form action="/search" method="get">
                    <input class="input" type="text" name="sq" placeholder="Поиск по сайту" />
                    <input class="go" type="submit" value="" title="Найти" />
                </form>
            </div>
        </div>

        <div class="unit-20">
            <div class="socials">
            </div>
        </div>

        <div class="unit-20">
            <span class="birs">Сделано в <a href="http://birsagency.ru">Бирс</a></span>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->tpl_vars['core']->value->getConstant('scripts','body_code');?>

<?php }} ?>