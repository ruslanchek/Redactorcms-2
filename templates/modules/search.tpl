{*
<div class="search">
    <form action="/search">
        <input type="text" name="sq" placeholder="Поиск" value="{$core->page.sq|escape}" />
        <input class="btn" type="submit" value="Найти"/>
    </form>
</div>

{if $core->page.sq != ''}
    <div class="search-list">
        {foreach from=$core->page.result.items item=item}
            <div class="item">
                <h2><a href="{$core->uri}">{$item.title}</a></h2>

                {$item.content}
            </div>

            <hr>
        {foreachelse}
            <p class="color-gray">Ничего не найдено</p>
        {/foreach}
    </div>

    {include file="include/common/pager.tpl" pager=$core->page.result.pager}
{/if}
*}

<script>
    (function() {
        var cx = '011641885441076172981:ve19zte-tew';
        var gcse = document.createElement('script');
        gcse.type = 'text/javascript';
        gcse.async = false;
        gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                '//www.google.com/cse/cse.js?cx=' + cx;
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(gcse, s);
    })();
</script>
<gcse:search></gcse:search>

<script>
    var intrvl = null;

    function fill_input(){
        var input = '{$core->page.sq|escape}';

        $('.gsc-input').focus().val(input);

        if($('.gsc-input').length > 0){
            clearInterval(intrvl);

            $('.gsc-search-button').trigger('click');
        }
    }

    intrvl = setInterval(fill_input, 50);
</script>