{if $main->dataset.params.validate}
<script type="text/javascript">
	var errors = new Array();

	errors['form_error_old_password_required']         = '{$main->getText('form', 'form_error_old_password_required')}';
	errors['form_error_new_password_required']         = '{$main->getText('form', 'form_error_new_password_required')}';
	errors['form_error_new_password_again_required']   = '{$main->getText('form', 'form_error_new_password_again_required')}';
	errors['form_error_password_confirmation_error']   = '{$main->getText('form', 'form_error_password_confirmation_error')}';
	errors['form_error_password_min_length']           = '{$main->getText('form', 'form_error_password_min_length')}';

	errors['form_error_required']                      = '{$main->getText('form', 'form_error_required')}';
	errors['form_error_email']                         = '{$main->getText('form', 'form_error_email')}';
	errors['form_error_remote']                        = '{$main->getText('form', 'form_error_remote')}';
	errors['form_error_url']                           = '{$main->getText('form', 'form_error_url')}';
    errors['form_error_urlpart']                       = '{$main->getText('form', 'form_error_urlpart')}';
	errors['form_error_number']                        = '{$main->getText('form', 'form_error_number')}';
	errors['form_error_digits']                        = '{$main->getText('form', 'form_error_digits')}';
	errors['form_error_accept']                        = '{$main->getText('form', 'form_error_accept')}';
	errors['form_error_minlength']                     = '{$main->getText('form', 'form_error_minlength')}';
	errors['form_error_structure_path_exists']         = '{$main->getText('form', 'form_error_structure_path_exists')}';
    errors['form_error_that_field_is_unique']          = '{$main->getText('form', 'form_error_that_field_is_unique')}';


	{if $main->item_data.id}
		var item_id = {$main->item_data.id};
	{/if}

	{literal}
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
	{/literal}
</script>
{/if}