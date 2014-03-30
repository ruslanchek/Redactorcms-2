<?php /* Smarty version Smarty 3.1.4, created on 2014-02-13 19:11:03
         compiled from "/home/sdnadmin/site_new/templates/include/common/tariffs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:120681182852e9518d7ebf75-37394858%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8969d9157362351c53127dcbc1e0883ec502f25' => 
    array (
      0 => '/home/sdnadmin/site_new/templates/include/common/tariffs.tpl',
      1 => 1392304260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120681182852e9518d7ebf75-37394858',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e9518d95ece',
  'variables' => 
  array (
    'core' => 0,
    'pack_1' => 0,
    'pack_2' => 0,
    'pack_3' => 0,
    'tariffs_1' => 0,
    'item' => 0,
    'p' => 0,
    'param' => 0,
    'tariffs_2' => 0,
    'tariffs_3' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e9518d95ece')) {function content_52e9518d95ece($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['pack_1'] = new Smarty_variable($_smarty_tpl->tpl_vars['core']->value->getTariffsPack(1), null, 0);?>
<?php $_smarty_tpl->tpl_vars['pack_2'] = new Smarty_variable($_smarty_tpl->tpl_vars['core']->value->getTariffsPack(2), null, 0);?>
<?php $_smarty_tpl->tpl_vars['pack_3'] = new Smarty_variable($_smarty_tpl->tpl_vars['core']->value->getTariffsPack(3), null, 0);?>

<?php $_smarty_tpl->tpl_vars['tariffs_1'] = new Smarty_variable($_smarty_tpl->tpl_vars['core']->value->getTariffs(1), null, 0);?>
<?php $_smarty_tpl->tpl_vars['tariffs_2'] = new Smarty_variable($_smarty_tpl->tpl_vars['core']->value->getTariffs(2), null, 0);?>
<?php $_smarty_tpl->tpl_vars['tariffs_3'] = new Smarty_variable($_smarty_tpl->tpl_vars['core']->value->getTariffs(3), null, 0);?>

<a name="tariffs"></a>

<div class="tariffs">
    <div class="limiter">
        <nav>
            <h1>Пакеты тарифов</h1>

            <a class="item" data-id="1" href="#"><?php echo $_smarty_tpl->tpl_vars['pack_1']->value['name'];?>
</a>
            <a class="item active" data-id="2" href="#"><?php echo $_smarty_tpl->tpl_vars['pack_2']->value['name'];?>
</a>
            <a class="item" data-id="3" href="#"><?php echo $_smarty_tpl->tpl_vars['pack_3']->value['name'];?>
</a>

            <a data-tariff="Индивидуальная конфигурация" class="button tariff-order" href="#">Индивидуальная конфигурация</a>
        </nav>

        <div class="groups">

            <div class="group" data-id="1">
                <div class="tariff-desc">
                    <?php echo $_smarty_tpl->tpl_vars['pack_1']->value['text'];?>

                </div>

                <div class="units-row">
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tariffs_1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                        <div class="<?php if (count($_smarty_tpl->tpl_vars['tariffs_1']->value)>3){?>unit-25<?php }else{ ?>unit-33<?php }?>">
                            <div class="tariff-col" style="margin-right: 10px;">
                                <div class="header"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</div>
                                <div class="subheader"><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
 <span class="rub">&#8399;</span></div>
                                <div class="tariff-content">
                                    <?php $_smarty_tpl->tpl_vars['p'] = new Smarty_variable(json_decode($_smarty_tpl->tpl_vars['item']->value['params']), null, 0);?>

                                    <table>
                                        <?php  $_smarty_tpl->tpl_vars['param'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['param']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['p']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['param']->key => $_smarty_tpl->tpl_vars['param']->value){
$_smarty_tpl->tpl_vars['param']->_loop = true;
?>
                                            <tr>
                                                <th><?php echo $_smarty_tpl->tpl_vars['param']->value->key;?>
</th>
                                                <td><span class="big"><?php echo urldecode($_smarty_tpl->tpl_vars['param']->value->val);?>
</span></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>

                                <i class="triangle"></i>

                                <div class="tariff-after">
                                    <?php echo $_smarty_tpl->tpl_vars['item']->value['promo'];?>


                                    <a href="#" data-tariff="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pack_1']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" class="tariff-order button button-yellow">Заказать</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="group active" data-id="2">
                <div class="tariff-desc">
                    <?php echo $_smarty_tpl->tpl_vars['pack_2']->value['text'];?>

                </div>

                <div class="units-row">
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tariffs_2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                        <div class="<?php if (count($_smarty_tpl->tpl_vars['tariffs_2']->value)>3){?>unit-25<?php }else{ ?>unit-33<?php }?>">
                            <div class="tariff-col" style="margin-right: 10px;">
                                <div class="header"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</div>
                                <div class="subheader"><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
 <span class="rub">&#8399;</span></div>
                                <div class="tariff-content">
                                    <?php $_smarty_tpl->tpl_vars['p'] = new Smarty_variable(json_decode($_smarty_tpl->tpl_vars['item']->value['params']), null, 0);?>

                                    <table>
                                        <?php  $_smarty_tpl->tpl_vars['param'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['param']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['p']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['param']->key => $_smarty_tpl->tpl_vars['param']->value){
$_smarty_tpl->tpl_vars['param']->_loop = true;
?>
                                            <tr>
                                                <th><?php echo $_smarty_tpl->tpl_vars['param']->value->key;?>
</th>
                                                <td><span class="big"><?php echo $_smarty_tpl->tpl_vars['param']->value->val;?>
</span></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>

                                <i class="triangle"></i>

                                <div class="tariff-after">
                                    <?php echo $_smarty_tpl->tpl_vars['item']->value['promo'];?>


                                    <a href="#" data-tariff="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pack_2']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" class="tariff-order button button-yellow">Заказать</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="group" data-id="3">
                <div class="tariff-desc">
                    <?php echo $_smarty_tpl->tpl_vars['pack_3']->value['text'];?>

                </div>

                <div class="units-row">
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tariffs_3']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                        <div class="<?php if (count($_smarty_tpl->tpl_vars['tariffs_3']->value)>3){?>unit-25<?php }else{ ?>unit-33<?php }?>">
                            <div class="tariff-col" style="margin-right: 10px;">
                                <div class="header"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</div>
                                <div class="subheader"><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
 <span class="rub">&#8399;</span></div>
                                <div class="tariff-content">
                                    <?php $_smarty_tpl->tpl_vars['p'] = new Smarty_variable(json_decode($_smarty_tpl->tpl_vars['item']->value['params']), null, 0);?>

                                    <table>
                                        <?php  $_smarty_tpl->tpl_vars['param'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['param']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['p']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['param']->key => $_smarty_tpl->tpl_vars['param']->value){
$_smarty_tpl->tpl_vars['param']->_loop = true;
?>
                                            <tr>
                                                <th><?php echo $_smarty_tpl->tpl_vars['param']->value->key;?>
</th>
                                                <td><span class="big"><?php echo $_smarty_tpl->tpl_vars['param']->value->val;?>
</span></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>

                                <i class="triangle"></i>

                                <div class="tariff-after">
                                    <?php echo $_smarty_tpl->tpl_vars['item']->value['promo'];?>


                                    <a href="#" data-tariff="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pack_3']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" class="tariff-order button button-yellow">Заказать</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>


        </div>
    </div>
</div>

<script>
    $(function () {
        tariffs.init();
    });
</script><?php }} ?>