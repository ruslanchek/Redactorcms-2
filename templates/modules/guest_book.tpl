{if $core->login->user_status.status}
    {if $core->page.form.message}
        Status: {if $core->page.form.status}OK{else}ERROR{/if}; Message: {$core->page.form.message}
    {/if}

    <form action="?action=go" method="POST">
        <p>
            <label>
                Сообщение (1000 символов)<br>
                <textarea rows="5" name="message">{$smarty.post.message}</textarea>
            </label>
        </p>

        <p>
            <label>
                Код с картинки
                <div class="captcha">
                    <a href="javascript:void(0)" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random()">Обновить картинку</a><br>
                    <img id="captcha" src="/securimage/securimage_show.php?0.15141636761836708" width="216" height="80">
                </div>

                <input type="text" name="captcha_code" />
            </label>
        </p>

        <input type="submit" value="Написать" />
    </form>
{/if}

{if $core->page.data.list.items}
    {foreach from=$core->page.data.list.items item=item}
    <div class="gb_item">
        <h2>{$item.user_login} ({$item.username}) @ {$item.datetime|date:"datetime"} <a class="link_to_post" name="post_{$item.id}" href="{$core->uri}#post_{$item.id}">#</a></h2>
        {$item.message}
    </div>
    {/foreach}
{else}
    Нет записей.
{/if}

{include file="include/common/pager.tpl" pager=$core->page.data.list.pager}