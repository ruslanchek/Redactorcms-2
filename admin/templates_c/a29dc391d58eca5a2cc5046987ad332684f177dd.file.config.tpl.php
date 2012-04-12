<?php /* Smarty version Smarty 3.1.4, created on 2012-03-19 15:58:55
         compiled from "Z:/home/loc/susl/admin/templates\modules\config.tpl" */ ?>
<?php /*%%SmartyHeaderCode:88834f671f7f371bd0-94569368%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a29dc391d58eca5a2cc5046987ad332684f177dd' => 
    array (
      0 => 'Z:/home/loc/susl/admin/templates\\modules\\config.tpl',
      1 => 1332157838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88834f671f7f371bd0-94569368',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
    'key' => 0,
    'val_i' => 0,
    'key_i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f671f7f436b2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f671f7f436b2')) {function content_4f671f7f436b2($_smarty_tpl) {?><h1><?php echo $_smarty_tpl->tpl_vars['main']->value->h1;?>
</h1>

<?php if ($_smarty_tpl->tpl_vars['main']->value->module_mode=='constants'){?>
    <div class="list_table config_table">
        <form action="/admin/?option=config&suboption=constants&action=save_params" method="POST">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['main']->value->constants; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                    <tr>
                        <th colspan="3" align="left"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('modules_menu',$_smarty_tpl->tpl_vars['key']->value);?>
</th>
                    </tr>

                    <?php  $_smarty_tpl->tpl_vars['val_i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val_i']->_loop = false;
 $_smarty_tpl->tpl_vars['key_i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['main']->value->constants[$_smarty_tpl->tpl_vars['key']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val_i']->key => $_smarty_tpl->tpl_vars['val_i']->value){
$_smarty_tpl->tpl_vars['val_i']->_loop = true;
 $_smarty_tpl->tpl_vars['key_i']->value = $_smarty_tpl->tpl_vars['val_i']->key;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['val_i']->value[2];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['key_i']->value;?>
</td>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['val_i']->value[1]=='text'){?>
                                <input class="text_input" type="text" value="<?php echo $_smarty_tpl->tpl_vars['val_i']->value[0];?>
" name="<?php echo $_smarty_tpl->tpl_vars['key_i']->value;?>
" />
                            <?php }?>
                        </td>
                    </tr>
                    <?php } ?>
                <?php } ?>
            </table>

            <div class="buttons">
                <input class="button" type="submit" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_button_save_title');?>
" value="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_button_save_text');?>
" />
            </div>

            <div class="form_end"></div>
        </form>
    </div>
<?php }else{ ?>
    sad
<?php }?><?php }} ?>