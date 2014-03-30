<?php /* Smarty version Smarty 3.1.4, created on 2014-02-01 13:33:12
         compiled from "/home/sdnadmin/site_new/admin/templates/modules/config.tpl" */ ?>
<?php /*%%SmartyHeaderCode:33453445452ecbf58948c23-53142412%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd173a435f14b67632b7b817c950718ed4ae327e' => 
    array (
      0 => '/home/sdnadmin/site_new/admin/templates/modules/config.tpl',
      1 => 1391021811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33453445452ecbf58948c23-53142412',
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
  'unifunc' => 'content_52ecbf58a0ba4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ecbf58a0ba4')) {function content_52ecbf58a0ba4($_smarty_tpl) {?><h1><?php echo $_smarty_tpl->tpl_vars['main']->value->h1;?>
</h1>

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
                    <th colspan="3" align="left"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('contstants',$_smarty_tpl->tpl_vars['key']->value);?>
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
                    <td width="30%"><?php echo $_smarty_tpl->tpl_vars['val_i']->value[2];?>
</td>
                    <td width="15%"><?php echo $_smarty_tpl->tpl_vars['key_i']->value;?>
</td>
                    <td width="55%">
                        <?php if ($_smarty_tpl->tpl_vars['val_i']->value[1]=='text'){?>
                            <input class="text_input" type="text" value="<?php echo htmlspecialchars(stripcslashes(urldecode($_smarty_tpl->tpl_vars['val_i']->value[0])), ENT_QUOTES, 'UTF-8', true);?>
" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key_i']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['val_i']->value[1]=='textarea'){?>
                            <textarea name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key_i']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="textarea"><?php echo stripcslashes(urldecode($_smarty_tpl->tpl_vars['val_i']->value[0]));?>
</textarea>
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
<?php }} ?>