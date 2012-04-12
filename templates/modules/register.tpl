<h1 class="uppercase">Регистрация</h1>

{if $core->page.form.message}
    <div class="form_message"><div class="{if $core->page.form.status}ok{else}error{/if}">{$core->page.form.message}</div></div>
{/if}

<div class="form">
    <div class="form_menu uppercase">
        <a href="/auth/">Авторизация</a>
        <b>Регистрация</b>
        <a href="/auth/remember_pass/">Напомнить пароль</a>
    </div>

    <form class="regular_form" action="?action=go" method="POST">
        <table>
            <tr>
                <th><label for="form_email">Электронная почта</label></th>
                <td><input type="text" name="email" id="form_email" class="text req" value="{$smarty.post.email}" /></td>
            </tr>
            <tr>
                <th>
                    <label for="form_phone">Код с картинки</label>
                </th>
                <td><input type="text" name="phone" id="form_phone" class="text req" />
                    <div class="captcha">
                        <a href="javascript:void(0)" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random()">Обновить картинку</a><br>
                        <img id="captcha" src="/securimage/securimage_show.php" width="150" height="50">
                    </div>
                </td>
            </tr>
            <tr>
                <th><input type="submit" class="submit" value="Зарегистрироваться" /></th>
                <td>
                    <div class="required">
                        — поля, обязательные для заполнения
                    </div>
                </td>
            </tr>
        </table>
    </form>
</div>