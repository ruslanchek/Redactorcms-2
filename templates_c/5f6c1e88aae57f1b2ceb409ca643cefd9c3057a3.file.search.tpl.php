<?php /* Smarty version Smarty 3.1.4, created on 2014-01-31 13:18:31
         compiled from "/home/sdnadmin/site_new/templates/modules/search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:177582416352eb6a6702bc35-90425634%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f6c1e88aae57f1b2ceb409ca643cefd9c3057a3' => 
    array (
      0 => '/home/sdnadmin/site_new/templates/modules/search.tpl',
      1 => 1391021834,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177582416352eb6a6702bc35-90425634',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52eb6a6716279',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52eb6a6716279')) {function content_52eb6a6716279($_smarty_tpl) {?><div class="search-global">
    <form action="/search">
        <input type="search" name="sq" placeholder="Поиск" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['core']->value->page['sq'], ENT_QUOTES, 'UTF-8', true);?>
" />
        <input class="button" type="submit" value="Найти"/>
    </form>
</div>

<?php if ($_smarty_tpl->tpl_vars['core']->value->page['sq']!=''){?>
    <div class="search-list">
        <?php if ($_smarty_tpl->tpl_vars['core']->value->page['data']->results_count>0){?>
            <p class="color-gray">Найдено <?php echo $_smarty_tpl->tpl_vars['core']->value->page['data']->results_count;?>
 <?php echo $_smarty_tpl->tpl_vars['core']->value->page['data']->word;?>
</p>

            <ol>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['core']->value->page['data']->items; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                    <li class="item">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a>

                        <?php echo $_smarty_tpl->tpl_vars['item']->value['content'];?>

                    </li>
                <?php } ?>
            </ol>
        <?php }else{ ?>
            <p class="color-gray">Ничего не найдено</p>
        <?php }?>
    </div>

    <?php echo $_smarty_tpl->getSubTemplate ("include/common/pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('pager'=>$_smarty_tpl->tpl_vars['core']->value->page['result']['pager']), 0);?>

<?php }?><?php }} ?>