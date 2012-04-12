{if $core->page.form.message}
    Status: {if $core->page.form.status}OK{else}ERROR{/if}; Message: {$core->page.form.message}
{/if}

<form action="?action=go" method="POST">
    <p>
        <label>
           Старый пароль<br>
            <input type="password" name="old_password" />
        </label>
    </p>

    <p>
        <label>
            Новый пароль<br>
            <input type="password" name="new_password" />
        </label>
    </p>

    <p>
        <label>
            Еще раз<br>
            <input type="password" name="new_password_again" />
        </label>
    </p>

    <input type="submit" value="Сохранить" />
</form>