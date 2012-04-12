{if $core->page.form.message}
    <div class="alert {if $core->page.form.status}alert-success{else}alert-error{/if}">
        {$core->page.form.message}
    </div>
{/if}

<form class="form-horizontal" action="?action=go" method="POST">
    <fieldset>
        <div class="control-group">
            <label class="control-label" for="email">Email или логин</label>
            <div class="controls">
                <input type="text" class="input-xlarge" id="email" name="email">
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Выслать пароль</button>
            &nbsp;&nbsp;&nbsp;<a href="/auth/register/">Регистрация</a>
            &nbsp;&nbsp;&nbsp;<a href="/auth/">Авторизация</a>
        </div>
    </fieldset>
</form>