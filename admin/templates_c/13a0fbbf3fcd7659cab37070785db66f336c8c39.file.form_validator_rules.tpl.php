<?php /* Smarty version Smarty 3.1.4, created on 2014-01-30 02:01:05
         compiled from "/home/sdnadmin/site_new/admin/templates/system/scripts/form_validator_rules.tpl" */ ?>
<?php /*%%SmartyHeaderCode:98786630152e97a2143a551-85073059%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13a0fbbf3fcd7659cab37070785db66f336c8c39' => 
    array (
      0 => '/home/sdnadmin/site_new/admin/templates/system/scripts/form_validator_rules.tpl',
      1 => 1391021811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '98786630152e97a2143a551-85073059',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e97a21521bd',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e97a21521bd')) {function content_52e97a21521bd($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['main']->value->dataset['params']['validate']){?>
<script type="text/javascript">
	var errors = new Array();

	errors['form_error_old_password_required']         = '<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_error_old_password_required');?>
';
	errors['form_error_new_password_required']         = '<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_error_new_password_required');?>
';
	errors['form_error_new_password_again_required']   = '<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_error_new_password_again_required');?>
';
	errors['form_error_password_confirmation_error']   = '<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_error_password_confirmation_error');?>
';
	errors['form_error_password_min_length']           = '<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_error_password_min_length');?>
';

	errors['form_error_required']                      = '<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_error_required');?>
';
	errors['form_error_email']                         = '<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_error_email');?>
';
	errors['form_error_remote']                        = '<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_error_remote');?>
';
	errors['form_error_url']                           = '<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_error_url');?>
';
    errors['form_error_urlpart']                       = '<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_error_urlpart');?>
';
	errors['form_error_number']                        = '<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_error_number');?>
';
	errors['form_error_digits']                        = '<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_error_digits');?>
';
	errors['form_error_accept']                        = '<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_error_accept');?>
';
	errors['form_error_minlength']                     = '<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_error_minlength');?>
';
	errors['form_error_structure_path_exists']         = '<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_error_structure_path_exists');?>
';
    errors['form_error_that_field_is_unique']          = '<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_error_that_field_is_unique');?>
';


	<?php if ($_smarty_tpl->tpl_vars['main']->value->item_data['id']){?>
		var item_id = <?php echo $_smarty_tpl->tpl_vars['main']->value->item_data['id'];?>
;
	<?php }?>

	
	jQuery.extend(jQuery.validator.messages, {
		required: errors['form_error_required'],
		email: errors['form_error_email'],
		remote: errors['form_error_remote'],
		url: errors['form_error_url'],
        urlpart: errors['form_error_urlpart'],
		number: errors['form_error_number'],
		digits: errors['form_error_digits'],
		accept: errors['form_error_accept'],
		minlength: jQuery.validator.format(errors['form_error_minlength'])
	});

	$(function(){
		$('#form').validate({
			rules: {
				old_password: {
					required: true,
					remote: {
						url: "/admin/?option=personal&suboption=password_change&ajax=true&action=checkpassword",
						type: "GET",
						data: {
							password: function(){
                                return $('#old_password').val();
						    }
					    }
					},
					minlength: 3
				},
				new_password: {
					required: true,
					minlength: 3
				},
				new_password_again: {
					required: true,
					minlength: 3,
					equalTo: "#new_password"
				},
				part: {
				    required: true,
                    remote: {
                        url: "/admin/?option=structure&suboption=edit&id="+item_id+"&ajax=true&action=checkurl",
                        type: "GET",
                        data: {
                            part: function(){
                                return $('#part').val();
                            }
                        }
                    }
				}
			},
			messages: {
				old_password: {
					required: errors['form_error_old_password_required'],
					minlength: errors['form_error_password_min_length']
				},
				new_password: {
					required: errors['form_error_new_password_required'],
					minlength: errors['form_error_password_min_length']
				},
				new_password_again: {
					required: errors['form_error_new_password_again_required'],
					minlength: errors['form_error_password_min_length'],
					equalTo: errors['form_error_password_confirmation_error']
				},
				part: {
				    remote: errors['form_error_structure_path_exists']
				}
			}
		});
	});
	
</script>
<?php }?><?php }} ?>