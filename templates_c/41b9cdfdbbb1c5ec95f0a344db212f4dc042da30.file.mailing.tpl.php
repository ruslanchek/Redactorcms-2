<?php /* Smarty version Smarty 3.1.4, created on 2014-02-01 13:27:31
         compiled from "/home/sdnadmin/site_new/templates/mailing.tpl" */ ?>
<?php /*%%SmartyHeaderCode:165472723552ecbe0320f880-78193953%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41b9cdfdbbb1c5ec95f0a344db212f4dc042da30' => 
    array (
      0 => '/home/sdnadmin/site_new/templates/mailing.tpl',
      1 => 1391021811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165472723552ecbe0320f880-78193953',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52ecbe0327351',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ecbe0327351')) {function content_52ecbe0327351($_smarty_tpl) {?><html>
    <body style="font: 12px/20px Arial, Tahoma, Verdana, sans-serif;">
        <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
                <td align="left" valign="top" style="padding: 9px 14px; background-color: #eeeeee;">
                    <h1 style="color: #444444; font-family: Georgia, Times, serif; font-size: 1.6em; font-weight: normal; padding: 0; margin: 0;">
                        <?php echo $_smarty_tpl->tpl_vars['core']->value->mail_vars['subject'];?>

                    </h1>
                </td>
            </tr>
            <tr>
                <td align="left" valign="top" style="padding: 9px 14px; border: 1px solid #eeeeee; font: 12px/20px Arial, Tahoma, Verdana, sans-serif;">
                    <?php echo $_smarty_tpl->tpl_vars['core']->value->mail_vars['content'];?>

                </td>
            </tr>
        </table>
    </body>
</html><?php }} ?>