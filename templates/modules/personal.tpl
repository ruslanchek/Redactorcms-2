<script src="/resources/js/jquery.ocupload-1.1.2.packed.js"></script>

<div class="man_card">
    <div class="mc_left_col">
        <div class="man_photo"><img src="{$core->getAvatar()}" alt="{$core->login->user_status.userdata.name}"></div>
        <a href="javascript:void(0)" onclick="core.avatar.openDialog()">Изменить аватар</a>
    </div>

    <div class="mc_right_col">
        <h1 class="uppercase">
            {$core->login->user_status.userdata.name}
            <a {if $core->page.form.status === false}style="display: none;"{/if} id="edit_form" class="edit" href="javascript:void(0)" onclick="$('.userdata_edit').show(); $('.userdata').hide(); $(this).hide(); $('#close_edit_form').show(); $('.form_message').slideUp(100)">Редактировать</a>
            <a id="close_edit_form" class="edit" href="javascript:void(0)" onclick="$('.userdata_edit').hide(); $('.userdata').show(); $(this).hide(); $('#edit_form').show(); $('.form_message').slideUp(100)" {if ($core->page.form.status && count($core->page.form) > 0) || count($core->page.form) == 0}style="display: none"{/if}>Отменить</a>
        </h1>

        {if $core->page.form.message}
            <div class="form_message"><div class="{if $core->page.form.status}ok{else}error{/if}">{$core->page.form.message}</div></div>
        {/if}

        <div class="userdata" {if $core->page.form.status === false}style="display: none"{/if}>
            <p><a href="mailto:{$core->login->user_status.userdata.email}">{$core->login->user_status.userdata.email}</a></p>

            <p>{$core->login->user_status.userdata.address}</p>

            <div class="phone" id="edit_phone">
                {$core->login->user_status.userdata.phone}
            </div>

            <div class="edit_description">
                {$core->login->user_status.userdata.description}
            </div>
        </div>

        <div class="form userdata_edit" {if ($core->page.form.status && count($core->page.form) > 0) || count($core->page.form) == 0}style="display: none"{/if}>
            <form class="regular_form" action="?action=go" method="POST">
                <table>
                    <tr>
                        <th><label for="form_email">Электронная почта</label></th>
                        <td><input type="text" name="email" id="form_email" class="text req" value="{$core->login->user_status.userdata.email|escape}" /></td>
                    </tr>
                    <tr>
                        <th><label for="form_login">Логин</label></th>
                        <td><input type="text" name="login" id="form_login" class="text req" value="{$core->login->user_status.userdata.login|escape}" /></td>
                    </tr>
                    <tr>
                        <th><label for="form_email">Имя</label></th>
                        <td><input type="text" name="name" id="form_name" class="text req" value="{$core->login->user_status.userdata.name|escape}" /></td>
                    </tr>
                    <tr>
                        <th><label for="form_phone">Телефон</label></th>
                        <td><input type="text" name="phone" id="form_phone" value="{$core->login->user_status.userdata.phone|escape}" /></td>
                    </tr>

                    <tr>
                        <th><label for="form_address">Адрес</label></th>
                        <td><textarea id="form_address" class="text" name="address">{$core->login->user_status.userdata.address}</textarea></td>
                    </tr>

                    <tr>
                        <th><label for="form_description">Текст</label></th>
                        <td><textarea id="form_description" class="text" name="description">{$core->login->user_status.userdata.description}</textarea></td>
                    </tr>
                    <tr>
                        <th><input type="submit" class="submit" value="Сохранить" /></th>
                        <td>
                            <div class="required">
                                — поля, обязательные для заполнения
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <div class="clear"></div>
</div>