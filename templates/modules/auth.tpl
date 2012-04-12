{if $core->page.form.message}
    <div class="alert {if $core->page.form.status}alert-success{else}alert-error{/if}">
        {$core->page.form.message}
    </div>
{/if}

<form class="form-horizontal" action="?action=go" method="POST">
    <fieldset>
        <div class="control-group">
            <label class="control-label" for="login_name">Email или логин</label>
            <div class="controls">
                <input type="text" class="input-xlarge" id="login_name" name="login_name">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="login_password">Пароль</label>
            <div class="controls">
                <input type="password" class="input-xlarge" id="login_password" name="login_password">
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Войти</button>
            &nbsp;&nbsp;&nbsp;<a href="/auth/register/">Регистрация</a>
            &nbsp;&nbsp;&nbsp;<a href="/auth/remember_pass/">Напомнить пароль</a>
        </div>
    </fieldset>
</form>