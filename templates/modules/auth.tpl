<h1 class="uppercase">Авторизация</h1>

{if $core->page.form.message}
    <div class="form_message"><div class="{if $core->page.form.status}ok{else}error{/if}">{$core->page.form.message}</div></div>
{/if}

<div class="form">
    <div class="form_menu uppercase">
        <b>Авторизация</b>
        <a href="/auth/register/">Регистрация</a>
        <a href="/auth/remember_pass/">Напомнить пароль</a>
    </div>

    <form class="regular_form" action="?action=go" method="POST">

        <table>
            <tr>
                <th><label for="form_login">Электронная почта или логин</label></th>
                <td><input type="text" name="login" id="form_login" class="text req" value="{$smarty.post.login}" /></td>
            </tr>
            <tr>
                <th><label for="form_password">Пароль</label></th>
                <td><input type="password" name="password" id="form_password" class="text req" value="{$smarty.post.email}" /></td>
            </tr>
            <tr>
                <th colspan="2"><input type="submit" class="submit" value="Зарегистрироваться" /></th>
            </tr>
        </table>
    </form>
</div>