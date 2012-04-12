<?php /* Smarty version Smarty 3.1.4, created on 2012-04-09 11:52:22
         compiled from "/Users/ruslan/Documents/sites/digitalbakery/templates/mailing.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15124813164f8295366ead44-47476697%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '040ac8fd007b323a3689a0abe0d1a4ffa4ae0696' => 
    array (
      0 => '/Users/ruslan/Documents/sites/digitalbakery/templates/mailing.tpl',
      1 => 1333733964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15124813164f8295366ead44-47476697',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f82953670cab',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f82953670cab')) {function content_4f82953670cab($_smarty_tpl) {?><html>
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