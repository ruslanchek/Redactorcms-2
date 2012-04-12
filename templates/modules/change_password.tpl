{if $core->page.form.message}
    <div class="alert {if $core->page.form.status}alert-success{else}alert-error{/if}">
        {$core->page.form.message}
    </div>
{/if}

<form class="form-horizontal" action="?action=go" method="POST">
    <fieldset>
        <div class="control-group">
            <label class="control-label" for="password">Текущий пароль</label>
            <div class="controls">
                <input type="password" class="input-xlarge" id="password" name="password">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="new_password">Новый пароль</label>
            <div class="controls">
                <input type="password" class="input-xlarge" id="new_password" name="new_password" value="{$core->login->user_status.userdata.new_password}">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="new_password_again">Еще раз</label>
            <div class="controls">
                <input type="password" class="input-xlarge" id="new_password_again" name="new_password_again" value="{$core->login->user_status.userdata.new_password_again}">
            </div>
        </div>


        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Сменить пароль</button>
            &nbsp;&nbsp;&nbsp;<a href="/personal/">Личный кабинет</a>
        </div>
    </fieldset>
</form>