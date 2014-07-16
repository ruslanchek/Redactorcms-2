<?php /* Smarty version Smarty 3.1.4, created on 2014-07-09 18:57:25
         compiled from "/Users/ruslan/Sites/redactorcms2/templates/include/common/main-menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20875498855318bdb066c970-24659836%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35534cd0630ca5005cbe6bd035d5b51f0aea2b29' => 
    array (
      0 => '/Users/ruslan/Sites/redactorcms2/templates/include/common/main-menu.tpl',
      1 => 1404917680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20875498855318bdb066c970-24659836',
  'function' => 
  array (
    'manimenu' => 
    array (
      'parameter' => 
      array (
        'level' => 0,
      ),
      'compiled' => '',
    ),
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_5318bdb0768e6',
  'variables' => 
  array (
    'data' => 0,
    'item' => 0,
    'level' => 0,
    'core' => 0,
  ),
  'has_nocache_code' => 0,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5318bdb0768e6')) {function content_5318bdb0768e6($_smarty_tpl) {?><?php if (!function_exists('smarty_template_function_manimenu')) {
    function smarty_template_function_manimenu($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['manimenu']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_smarty_tpl->tpl_vars["i"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value){
$_smarty_tpl->tpl_vars["item"]->_loop = true;
 $_smarty_tpl->tpl_vars["i"]->value = $_smarty_tpl->tpl_vars["item"]->key;
?>
        <?php if (is_array($_smarty_tpl->tpl_vars['item']->value)){?>
            <?php if ($_smarty_tpl->tpl_vars['level']->value==0){?>
            <span class="item">
            <?php }?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['path'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['core']->value->page['id']||$_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['core']->value->page['pid']){?>class="active-a"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>

                <nav class="sub">
                    <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['childrens'])&&$_smarty_tpl->tpl_vars['level']->value==0){?>
                        <?php smarty_template_function_manimenu($_smarty_tpl,array('data'=>$_smarty_tpl->tpl_vars['item']->value['childrens'],'level'=>$_smarty_tpl->tpl_vars['level']->value+1));?>

                    <?php }?>
                </nav>
            <?php if ($_smarty_tpl->tpl_vars['level']->value==0){?>
            </span>
            <?php }?>
        <?php }else{ ?>
            <span class="item">
                <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['path'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
            </span>
        <?php }?>
    <?php } ?><?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;}}?>


<?php smarty_template_function_manimenu($_smarty_tpl,array('data'=>$_smarty_tpl->tpl_vars['core']->value->getBranchMenu(1,3)));?>
<?php }} ?>