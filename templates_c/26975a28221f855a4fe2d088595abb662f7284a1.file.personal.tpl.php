<?php /* Smarty version Smarty 3.1.4, created on 2012-04-10 18:25:09
         compiled from "Z:/home/loc/digitalbakery/templates\modules\personal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:121154f83f107cb5579-12253460%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26975a28221f855a4fe2d088595abb662f7284a1' => 
    array (
      0 => 'Z:/home/loc/digitalbakery/templates\\modules\\personal.tpl',
      1 => 1334067908,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121154f83f107cb5579-12253460',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f83f107e5ece',
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f83f107e5ece')) {function content_4f83f107e5ece($_smarty_tpl) {?><script src="/resources/js/jquery.ocupload-1.1.2.packed.js"></script>

<div class="man_card">
    <div class="mc_left_col">
        <div class="man_photo"><img src="<?php echo $_smarty_tpl->tpl_vars['core']->value->getAvatar();?>
" alt="<?php echo $_smarty_tpl->tpl_vars['core']->value->login->user_status['userdata']['name'];?>
"></div>
        <a href="javascript:void(0)" onclick="core.avatar.openDialog()">Изменить аватар</a>
    </div>

    <div class="mc_right_col">
        <h1 class="uppercase">
            <?php echo $_smarty_tpl->tpl_vars['core']->value->login->user_status['userdata']['name'];?>

            <a <?php if ($_smarty_tpl->tpl_vars['core']->value->page['form']['status']===false){?>style="display: none;"<?php }?> id="edit_form" class="edit" href="javascript:void(0)" onclick="$('.userdata_edit').show(); $('.userdata').hide(); $(this).hide(); $('#close_edit_form').show(); $('.form_message').slideUp(100)">Редактировать</a>
            <a id="close_edit_form" class="edit" href="javascript:void(0)" onclick="$('.userdata_edit').hide(); $('.userdata').show(); $(this).hide(); $('#edit_form').show(); $('.form_message').slideUp(100)" <?php if (($_smarty_tpl->tpl_vars['core']->value->page['form']['status']&&count($_smarty_tpl->tpl_vars['core']->value->page['form'])>0)||count($_smarty_tpl->tpl_vars['core']->value->page['form'])==0){?>style="display: none"<?php }?>>Отменить</a>
        </h1>

        <?php if ($_smarty_tpl->tpl_vars['core']->value->page['form']['message']){?>
            <div class="form_message"><div class="<?php if ($_smarty_tpl->tpl_vars['core']->value->page['form']['status']){?>ok<?php }else{ ?>error<?php }?>"><?php echo $_smarty_tpl->tpl_vars['core']->value->page['form']['message'];?>
</div></div>
        <?php }?>

        <div class="userdata" <?php if ($_smarty_tpl->tpl_vars['core']->value->page['form']['status']===false){?>style="display: none"<?php }?>>
            <p><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['core']->value->login->user_status['userdata']['email'];?>
"><?php echo $_smarty_tpl->tpl_vars['core']->value->login->user_status['userdata']['email'];?>
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

        <div class="form userdata_edit" <?php if (($_smarty_tpl->tpl_vars['core']->value->page['form']['status']&&count($_smarty_tpl->tpl_vars['core']->value->page['form'])>0)||count($_smarty_tpl->tpl_vars['core']->value->page['form'])==0){?>style="display: none"<?php }?>>
            <form class="regular_form" action="?action=go" method="POST">
                <table>
                    <tr>
                        <th><label for="form_email">Электронная почта</label></th>
                        <td><input type="text" name="email" id="form_email" class="text req" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['core']->value->login->user_status['userdata']['email'], ENT_QUOTES, 'UTF-8', true);?>
" /></td>
                    </tr>
                    <tr>
                        <th><label for="form_login">Логин</label></th>
                        <td><input type="text" name="login" id="form_login" class="text req" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['core']->value->login->user_status['userdata']['login'], ENT_QUOTES, 'UTF-8', true);?>
" /></td>
                    </tr>
                    <tr>
                        <th><label for="form_email">Имя</label></th>
                        <td><input type="text" name="name" id="form_name" class="text req" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['core']->value->login->user_status['userdata']['name'], ENT_QUOTES, 'UTF-8', true);?>
" /></td>
                    </tr>
                    <tr>
                        <th><label for="form_phone">Телефон</label></th>
                        <td><input type="text" name="phone" id="form_phone" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['core']->value->login->user_status['userdata']['phone'], ENT_QUOTES, 'UTF-8', true);?>
" /></td>
                    </tr>

                    <tr>
                        <th><label for="form_address">Адрес</label></th>
                        <td><textarea id="form_address" class="text" name="address"><?php echo $_smarty_tpl->tpl_vars['core']->value->login->user_status['userdata']['address'];?>
</textarea></td>
                    </tr>

                    <tr>
                        <th><label for="form_description">Текст</label></th>
                        <td><textarea id="form_description" class="text" name="description"><?php echo $_smarty_tpl->tpl_vars['core']->value->login->user_status['userdata']['description'];?>
</textarea></td>
                    </tr>
                    <tr>
                        <th><input type="submit" class="submit" value="Сохранить" /></th>
                        <td>
                            <div class="required">
                                — поля, обязательные для заполнения
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <div class="clear"></div>
</div><?php }} ?>