<h1 class="uppercase">Восстановление пароля</h1>

{if $core->page.form.message}
    <div class="form_message"><div class="{if $core->page.form.status}ok{else}error{/if}">{$core->page.form.message}</div></div>
{/if}

<div class="form">
    <div class="form_menu uppercase">
        <a href="/auth/">Авторизация</a>
        <a href="/auth/register/">Регистрация</a>
        <b>Напомнить пароль</b>
    </div>

    <form class="regular_form" action="?action=go" method="POST">
        <table>
            <tr>
                <th><label for="form_email">Электронная почта или логин</label></th>
                <td><input type="text" name="email" id="form_email" class="text req" value="{$smarty.post.email}" /></td>
            </tr>
            <tr>
                <th colspan="2"><input type="submit" class="submit" value="Выслать пароль" /></th>
            </tr>
        </table>
    </form>
</div>