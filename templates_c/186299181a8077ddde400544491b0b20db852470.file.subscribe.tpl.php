<?php /* Smarty version Smarty 3.1.4, created on 2014-01-30 09:50:21
         compiled from "/home/sdnadmin/site_new/templates/subscribe.tpl" */ ?>
<?php /*%%SmartyHeaderCode:48949254652e9e81de6ba59-97731648%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '186299181a8077ddde400544491b0b20db852470' => 
    array (
      0 => '/home/sdnadmin/site_new/templates/subscribe.tpl',
      1 => 1391021834,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48949254652e9e81de6ba59-97731648',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pid' => 0,
    'core' => 0,
    'item' => 0,
    'h1_' => 0,
    'h1' => 0,
    'code_result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e9e81e050d3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e9e81e050d3')) {function content_52e9e81e050d3($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <?php echo $_smarty_tpl->getSubTemplate ("include/common/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</head>

<body>
<div class="limiter">
    <header class="header">
        <?php echo $_smarty_tpl->getSubTemplate ("include/common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('mainpage'=>false), 0);?>

    </header>

    <div class="page-banner pb-<?php echo rand(1,5);?>
">
        <?php echo $_smarty_tpl->getSubTemplate ("include/common/breadcrumbs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


        <?php $_smarty_tpl->tpl_vars['h1'] = new Smarty_variable('', null, 0);?>

        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->getInlineMenu(3,$_smarty_tpl->tpl_vars['pid']->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['core']->value->page['id']){?>
                <?php $_smarty_tpl->tpl_vars['h1'] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value['name'], null, 0);?>
            <?php }?>
        <?php } ?>

        <?php if ($_smarty_tpl->tpl_vars['h1_']->value==''){?>
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->getInlineMenu(3,$_smarty_tpl->tpl_vars['pid']->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['core']->value->page['pid']){?>
                    <?php $_smarty_tpl->tpl_vars['h1'] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value['name'], null, 0);?>
                <?php }?>
            <?php } ?>
        <?php }?>

        <h1><?php echo $_smarty_tpl->tpl_vars['h1']->value;?>
</h1>
    </div>

    <div class="inner-content">
        <div class="units-row-end">
            <div class="unit-25">
                <nav class="nav-side">
                    <a href="/press-centre" <?php if ($_smarty_tpl->tpl_vars['core']->value->page['id']==17){?>class="active"<?php }?>>Маркет-пресс</a>
                    <?php echo $_smarty_tpl->getSubTemplate ("include/common/menu-second-level.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('pid'=>17), 0);?>

                </nav>
            </div>

            <div class="unit-75">
                <?php echo $_smarty_tpl->tpl_vars['core']->value->page['content'];?>

                    <?php if ($_GET['action']=='proof'){?>
                        <?php $_smarty_tpl->tpl_vars['code_result'] = new Smarty_variable($_smarty_tpl->tpl_vars['core']->value->checkSubscribeProofCode(), null, 0);?>

                        <div class="form-message <?php if ($_smarty_tpl->tpl_vars['code_result']->value->status==true){?>success<?php }else{ ?>error<?php }?>" style="display: block; margin: 0; width: auto"><?php echo $_smarty_tpl->tpl_vars['code_result']->value->message;?>
</div>
                    <?php }else{ ?>
                        <div class="content-form">
                            <form id="subscribe" action="" method="post">
                                <div class="form-message"></div>

                                <div class="fields">
                                    <input class="input" type="email" name="subscribe_email" placeholder="Введите ваш e-mail" />
                                    <input class="button" type="submit" value="Подписаться"/>
                                </div>
                            </form>

                            <script>
                                
                                    $(function(){
                                        subscribe_form.init();
                                    });
                                
                            </script>
                        </div>
                    <?php }?>

            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <?php echo $_smarty_tpl->getSubTemplate ("include/common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</footer>
</body>
</html><?php }} ?>