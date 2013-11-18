<div class="item_block" id="select_{if !$item.slave_of}{$item.name}{else}{$item.meta}{/if}" {if $item.slave_of}style="position: absolute; left: -10000px"{/if}>
    <label class="label" for="{if !$item.slave_of}{$item.name}{else}{$item.meta}{/if}" title="{$item.help}">{$item.label}</label>
    <div class="cl"></div>

    <select {if $item.section_id}data-section_id="{$item.section_id}"{/if} class="select" data-name="{if !$item.slave_of}{$item.name}{else}{$item.meta}{/if}" {if $item.slave_of}data-slave="true"{/if} {if !$item.slave_of}name="{$item.name}"{/if} id="{if !$item.slave_of}{$item.name}{else}{$item.meta}{/if}" tabindex="{$index+1}">
        <option value="0" {if $item.value == 0 || !$item.value}selected="selected"{/if}>{$main->getText('form', 'zero_selection')}</option>
        {foreach from=$item.options item=options}
            <option value="{$options.key}" {if $options.key == $item.value}selected="selected"{/if}>{$options.key}. {$options.value}</option>
        {/foreach}
    </select>

    {if $item.link}
        {if $item.value > 0}
            <span class="select-action-btn">
                <a href="#" data-name="{if !$item.slave_of}{$item.name}{else}{$item.meta}{/if}" data-action_header="Редактирование объекта" class="ajax_viewport_link select-edit-link" data-url="{$item.link}" data-src="{$item.link}{$item.value}">
                    <i class="icon-edit"></i>Редактировать
                </a>
            </span>

            <script>
                $(function(){
                    var select_id = '{if !$item.slave_of}{$item.name}{else}{$item.meta}{/if}';
                    var link = $('.select-edit-link[data-name="' + select_id + '"]');

                    $('#select_' + select_id).find('select').on('change', function(){
                        var src = link.data('url') + $(this).val();

                        link.data('src', src);
                        link.attr('data-src', src);
                    });
                });
            </script>
        {/if}
    {/if}

    {if $item.create_link}
        <span class="select-action-btn">
            <a href="#" data-action_header="Создание, привязка, а затем редактирование объекта" class="ajax_viewport_link" data-src="{$item.create_link}">
                <i class="icon-plus-squared"></i>Создать
            </a>
        </span>
    {/if}
</div>

{if $item.master}
    <script type="text/javascript">
        {foreach $item.master as $key => $val}


            {if $item.value == $key}
                $(window).load(function(){
                    $('select.select[data-slave="true"]').removeAttr('name');

                    var $select = $('#select_' + '{$val}');

                    $select.css({
                        position: 'static',
                        left: 0
                    }).find('select').attr('name', 'content_id');

                    $('select.select').chosen();
                });
            {/if}

            $('#' + '{$item.name}').change(function(){
                var value = $(this).val(),
                    $select = $('#select_' + '{$val}');

                $('select.select[data-slave="true"]').removeAttr('name');

                if(value == '{$key}'){
                    $select.css({
                        position: 'static',
                        left: 0
                    });

                    $select.find('select').attr('name', 'content_id').val('0');
                    $select.find('select').find('option').removeAttr('selected');
                    $select.find('select').find('option:first').attr('selected', 'selected');
                    $select.find('select').trigger("liszt:updated");
                }else{
                    $select.css({
                        position: 'absolute',
                        left: -10000
                    });
                }

                $('select.select').chosen();
            });
        {/foreach}
    </script>
{/if}