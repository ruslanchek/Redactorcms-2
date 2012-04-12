<?php /* Smarty version Smarty 3.1.4, created on 2012-04-09 22:34:33
         compiled from "/Users/ruslan/Documents/sites/digitalbakery/templates/modules/personal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16114791714f82af91f15136-19138003%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2acff5cc634f662669ba7e1ddce8541ee25c535e' => 
    array (
      0 => '/Users/ruslan/Documents/sites/digitalbakery/templates/modules/personal.tpl',
      1 => 1333996471,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16114791714f82af91f15136-19138003',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f82af9219ce2',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f82af9219ce2')) {function content_4f82af9219ce2($_smarty_tpl) {?><div class="man_card">
    <div class="mc_left_col">
        <div class="man_photo"></div>
        <a href="javascript:void(0)" onclick="core.avatar.openDialog()">Изменить аватар</a>
    </div>

    <div class="mc_right_col">
        <h1 class="uppercase">
            <?php echo $_smarty_tpl->tpl_vars['core']->value->login->user_status['userdata']['name'];?>

            <a <?php if ($_smarty_tpl->tpl_vars['core']->value->page['form']['status']===false){?>style="display: none;"<?php }?> id="edit_form" class="edit" href="javascript:void(0)" onclick="$('.userdata_edit').show(); $('.userdata').hide(); $(this).hide(); $('#close_edit_form').show()">Редактировать</a>
            <a id="close_edit_form" class="edit" href="javascript:void(0)" onclick="$('.userdata_edit').hide(); $('.userdata').show(); $(this).hide(); $('#edit_form').show()" <?php if (($_smarty_tpl->tpl_vars['core']->value->page['form']['status']&&count($_smarty_tpl->tpl_vars['core']->value->page['form'])>0)||count($_smarty_tpl->tpl_vars['core']->value->page['form'])==0){?>style="display: none"<?php }?>>Отменить</a>
        </h1>

        <?php if ($_smarty_tpl->tpl_vars['core']->value->page['form']['message']){?>
            <div class="form_message"><div class="<?php if ($_smarty_tpl->tpl_vars['core']->value->page['form']['status']){?>ok<?php }else{ ?>error<?php }?>"><?php echo $_smarty_tpl->tpl_vars['core']->value->page['form']['message'];?>
</div></div>
        <?php }?>

        <div class="userdata" <?php if ($_smarty_tpl->tpl_vars['core']->value->page['form']['status']===false){?>style="display: none"<?php }?>>
            <p><a href="mailto:advertisement@gmail.com"><?php echo $_smarty_tpl->tpl_vars['core']->value->login->user_status['userdata']['email'];?>
</a></p>

            <p><?php echo $_smarty_tpl->tpl_vars['core']->value->login->user_status['userdata']['address'];?>
</p>

            <div class="phone" id="edit_phone">
                <?php echo $_smarty_tpl->tpl_vars['core']->value->login->user_status['userdata']['phone'];?>

            </div>

            <div class="edit_description">
                <?php echo $_smarty_tpl->tpl_vars['core']->value->login->user_status['userdata']['description'];?>

            </div>
        </div>

        <div class="userdata_edit" <?php if (($_smarty_tpl->tpl_vars['core']->value->page['form']['status']&&count($_smarty_tpl->tpl_vars['core']->value->page['form'])>0)||count($_smarty_tpl->tpl_vars['core']->value->page['form'])==0){?>style="display: none"<?php }?>>
            <form class="form" action="?action=go" method="POST">
                <p>
                    <label>
                        Email<br>
                        <input class="text" type="text" name="email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['core']->value->login->user_status['userdata']['email'], ENT_QUOTES, 'UTF-8', true);?>
" />
                    </label>
                </p>

                <p>
                    <label>
                        Имя<br>
                        <input class="text" type="text" name="name" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['core']->value->login->user_status['userdata']['name'], ENT_QUOTES, 'UTF-8', true);?>
" />
                    </label>
                </p>

                <p>
                    <label>
                        Телефон<br>
                        <input class="text" type="text" name="phone" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['core']->value->login->user_status['userdata']['phone'], ENT_QUOTES, 'UTF-8', true);?>
" />
                    </label>
                </p>


                <p>
                    <label>
                        Адрес<br>
                        <textarea class="text" name="address"><?php echo $_smarty_tpl->tpl_vars['core']->value->login->user_status['userdata']['address'];?>
</textarea>
                    </label>
                </p>

                <p>
                    <label>
                        Текст<br>
                        <textarea rows="6" class="text" name="description"><?php echo $_smarty_tpl->tpl_vars['core']->value->login->user_status['userdata']['description'];?>
</textarea>
                    </label>
                </p>

                <input class="submit" type="submit" value="Сохранить" />
            </form>
        </div>
    </div>

    <div class="clear"></div>
</div><?php }} ?>