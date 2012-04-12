{if $core->login->user_status.status}
    <a class="personal_button" href="javascript:void(0)"><span class="userpic"><img src="{$core->getAvatar(25)}" alt="{$core->login->user_status.userdata.name}"></span>{$core->login->user_status.userdata.name}</a>
    <div class="user_menu" style="display: none;">
        <a href="/personal/">Настройка</a>
        <a href="/personal/change_pass/">Сменить пароль</a>
        <a href="javascript:void(0)" onclick="if(confirm('Выйти?')){literal}{document.location.href='{/literal}{$core->uri}{literal}?action=exit'}{/literal}">Выход</a>
    </div>
{else}
    <a class="login_button" href="javascript:void(0)">Личный кабинет</a>
{/if}