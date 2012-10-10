<?php /* Smarty version Smarty 3.1.4, created on 2012-09-25 19:21:55
         compiled from "/home/sporthimki/www/admin/templates/system/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4900368655061cc13bad9e2-00501733%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fc34dfdbd2ee104caebb30846614c3e67e68192' => 
    array (
      0 => '/home/sporthimki/www/admin/templates/system/form.tpl',
      1 => 1348490267,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4900368655061cc13bad9e2-00501733',
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
  'unifunc' => 'content_5061cc13cfa81',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5061cc13cfa81')) {function content_5061cc13cfa81($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("system/scripts/form_calendar_words.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("system/scripts/form_validator_rules.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("system/scripts/form_texts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="form">
    <?php if ($_smarty_tpl->tpl_vars['main']->value->form_error['condition']>0){?>
    <div class="result_message <?php if ($_smarty_tpl->tpl_vars['main']->value->form_error['condition']==2){?>error<?php }?><?php if ($_smarty_tpl->tpl_vars['main']->value->form_error['condition']==1){?>ok<?php }?>">
        <?php echo $_smarty_tpl->tpl_vars['main']->value->form_error['message'];?>

    </div>
    <?php }?>
    
    <form action="<?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['form_action'];?>
" method="<?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['method'];?>
" enctype="<?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['enctype'];?>
" id="form">
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['main']->value->dataset['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
            <?php if (!$_smarty_tpl->tpl_vars['item']->value['no_edit']){?>
                <?php echo $_smarty_tpl->getSubTemplate ("system/form_fields/".($_smarty_tpl->tpl_vars['item']->value['type']).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <?php }?>
        <?php } ?>

      	<div class="buttons">
          	<?php if (!$_smarty_tpl->tpl_vars['main']->value->dataset['params']['no_ok_button']){?>
            <input class="button" type="submit" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_button_append_title');?>
" name="ok" value="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_button_append_text');?>
" />
            <?php }?>
            <input class="button" type="submit" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_button_save_title');?>
" name="save" value="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_button_save_text');?>
" />
      	</div>
    </form>
</div><?php }} ?>