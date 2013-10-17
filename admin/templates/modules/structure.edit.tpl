{include file="system/form.tpl"}

{if $main->item_data.just_created == '1'}
<script>
    $('input#name').on('blur focus change keyup keydown', function(){
        $('input#part').val(escapeUrl($(this).val()));

        $('input#title').val($(this).val());
    });
</script>
{/if}