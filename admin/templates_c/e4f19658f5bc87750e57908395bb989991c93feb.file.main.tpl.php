<?php /* Smarty version Smarty 3.1.4, created on 2014-01-30 02:00:54
         compiled from "/home/sdnadmin/site_new/admin/templates/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18910268252e97a16621046-80359505%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e4f19658f5bc87750e57908395bb989991c93feb' => 
    array (
      0 => '/home/sdnadmin/site_new/admin/templates/main.tpl',
      1 => 1391021811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18910268252e97a16621046-80359505',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e97a1674cc6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e97a1674cc6')) {function content_52e97a1674cc6($_smarty_tpl) {?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $_smarty_tpl->tpl_vars['main']->value->title;?>
</title>

        <link rel="shortcut icon" type="image/x-icon" href="/admin/img/icons/favicon.ico">

        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['main']->value->addition_css; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
" media="all" />
        <?php } ?>

        <link rel="stylesheet" type="text/css" href="/admin/css/style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="/admin/css/chosen.css" media="all" />
        <link rel="stylesheet" href="/admin/css/fontello/css/fontello.css" />

        <script type="text/javascript" src="/admin/js/jquery.js"></script>
        <script type="text/javascript" src="/admin/js/color_animation.js"></script>
        <script type="text/javascript" src="/admin/js/extends.js"></script>
        <script type="text/javascript" src="/admin/js/cookie.js"></script>
        <script type="text/javascript" src="/admin/js/ui.js"></script>
        <script type="text/javascript" src="/admin/js/chosen.jquery.js"></script>

        <script type="text/javascript" src="/admin/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" src="/admin/codemirror/lib/codemirror.js"></script>

        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['main']->value->addition_js; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"></script>
        <?php } ?>

        <script type="text/javascript" src="/admin/js/actions.js"></script>
    </head>

    <body <?php if ($_GET['ajax_viewport']=='true'){?>class="ajax_viewport"<?php }?>>
        <?php if ($_GET['ajax_viewport']!='true'){?>
            <div id="wrapper">
                <header id="header">
                    <?php echo $_smarty_tpl->getSubTemplate ("inc.top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    <?php echo $_smarty_tpl->getSubTemplate ("inc.top_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                </header>

                <div id="content" class="overall_padding">
                    <?php $_smarty_tpl->tpl_vars["module_name"] = new Smarty_variable($_smarty_tpl->tpl_vars['main']->value->module_name, null, 0);?>
                    <?php echo $_smarty_tpl->getSubTemplate ("modules/".($_smarty_tpl->tpl_vars['module_name']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                </div>
            </div>

            <footer id="footer">
                <div class="overall_padding">
                    <?php echo $_smarty_tpl->getSubTemplate ("inc.footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                </div>
            </footer>
        <?php }else{ ?>
            <div>
                <?php $_smarty_tpl->tpl_vars["module_name"] = new Smarty_variable($_smarty_tpl->tpl_vars['main']->value->module_name, null, 0);?>
                <?php echo $_smarty_tpl->getSubTemplate ("modules/".($_smarty_tpl->tpl_vars['module_name']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            </div>

            <?php if ($_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['id']){?>
                <script type="text/javascript">
                    $(function(){
                        var $select = $(window.parent.document.getElementsByTagName('body')[0]).find('select[data-section_id="<?php echo $_GET['id'];?>
"]');

                        if($select.find('option[value="<?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['id'];?>
"]').length <= 0){
                            $select.append('<option value="<?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['id'];?>
. <?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['name'];?>
</option>');
                        }

                        var $opt = $select.find('option[value="<?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['id'];?>
"]');

                        $select.find('option').removeAttr('selected');
                        $opt.attr('selected', 'selected');

                        $select.trigger('liszt:updated');
                    });
                </script>
            <?php }?>
        <?php }?>
    </body>
</html><?php }} ?>