<?php /* Smarty version Smarty 3.1.4, created on 2014-03-06 22:25:52
         compiled from "/Users/ruslan/Sites/redactorcms2/templates/include/common/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:863816975318bdb0d1d464-52612800%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48e3c320e7b1c0a86d3ae5af72f5e22ab5c5b3ce' => 
    array (
      0 => '/Users/ruslan/Sites/redactorcms2/templates/include/common/footer.tpl',
      1 => 1394129863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '863816975318bdb0d1d464-52612800',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_5318bdb0dd19b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5318bdb0dd19b')) {function content_5318bdb0dd19b($_smarty_tpl) {?><div class="limiter">
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