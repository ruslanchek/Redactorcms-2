<label class="sf_top_label" for="name">{$main->getText('sections', 'create_new_section')}</label>
<div class="stripe_form new_item_form">
    <form action="{$main->new_item_link}" method="POST" enctype="application/x-www-form-urlencoded" id="form">
        <input class="textfield required remote" type="text" name="name" id="name" tabindex="1" />
        <input class="go" type="submit" title="{$main->getText('common', 'create_help')}" name="ok" value="{$main->getText('common', 'create')}" />
    </form>
</div>

<script type="text/javascript">
    var errors = new Array();
    
    errors['form_error_required'] = '{$main->getText($main->getCombinedModuleName(), 'add_item_empty')}';
    errors['form_error_new_section_name_remote'] = '{$main->getText($main->getCombinedModuleName(), 'add_item_exist')}';
      
    $.validator.setDefaults({
        submitHandler: function() { 
            document.getElementById('form').submit(); 
        }
    });
      
    jQuery.extend(jQuery.validator.messages, {
        required: errors['form_error_required'],
        remote: errors['form_error_new_section_name_remote']
    });
      
    {if $main->getCombinedModuleName() == 'sections_list'}  
        {literal}
        $(function(){
            $('#form').validate({
                rules: {
                    name: {
                        required: true,
                        remote: {
                            url: "/admin/?option=sections&suboption=list&ajax=true&action=checkname",
                            type: "GET",
                            data: {
                                name: function() {
                                    return $('#name').val();
                                }
                            }
                        }
                    }
                }
            });
        });
        {/literal}
    {else}
        {literal}
        $(function(){
            $('#form').validate({
                rules: {
                    name: {
                        required: true
                    }
                }
            });
        });
        {/literal}
    {/if}
</script>