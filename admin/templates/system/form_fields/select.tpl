<div class="item_block" id="select_{$item.name}" {if $item.slave_of}style="display: none"{/if}>
   <label class="label" for="{$item.name}" title="{$item.help}">{$item.label}</label>
   <div class="cl"></div>

   <select class="select" name="{$item.name}" id="{$item.name}" tabindex="{$index+1}">
       <option value="0" {if $item.value == 0 || !$item.value}selected="selected"{/if}>{$main->getText('form', 'zero_selection')}</option>
       {foreach from=$item.options item=options}
           <option value="{$options.key}" {if $options.key == $item.value}selected="selected"{/if}>{$options.key}. {$options.value}</option>
       {/foreach}
   </select>
</div>
{if $item.master}
   <script type="text/javascript">
       {foreach $item.master as $key => $val}
           {if $item.value == $key}
               $(window).load(function(){
                   $('#select_{$val}').show();
               });
           {/if}

           $('#{$item.name}').change(function(){
               var val = $(this).val();

               if(val == '{$key}'){
                   $('#select_{$val}').slideDown(100);
               }else{
                   $('#select_{$val}').slideUp(100);
               };
           });
       {/foreach}
   </script>
{/if}