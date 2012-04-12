{if $core->page.form.message}
    <div class="alert {if $core->page.form.status}alert-success{else}alert-error{/if}">
        {$core->page.form.message}
    </div>
{/if}

<form class="form-horizontal" action="?action=go" method="POST">
    <fieldset>
        <div class="control-group">
            <label class="control-label" for="email">Email</label>
            <div class="controls">
                <input type="text" class="input-xlarge" id="email" name="email" value="{$core->login->user_status.userdata.email}">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="email">Логин</label>
            <div class="controls">
                <input type="text" class="input-xlarge" id="login" name="login" value="{$core->login->user_status.userdata.login}">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="name">Имя</label>
            <div class="controls">
                <input type="text" class="input-xlarge" id="name" name="name" value="{$core->login->user_status.userdata.name}">
            </div>
        </div>


        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Сохранить</button>
            &nbsp;&nbsp;&nbsp;<a href="/personal/change_pass/">Сменить пароль</a>
        </div>
    </fieldset>
</form>