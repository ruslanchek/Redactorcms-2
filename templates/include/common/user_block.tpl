{if $core->login->user_status.status}
<ul class="nav pull-right">
    <li class="divider-vertical"></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>{$core->login->user_status.userdata.login}</b> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="/personal">Личный кабинет</a></li>
            <li><a href="/auth/remember_pass/">Сменить пароль</a></li>
            <li class="divider"></li>
            {literal}<li><a href="javascript:void(0)" onclick="if(confirm('Выйти?')){document.location.href='{/literal}{$core->uri}{literal}?action=exit'}">Выйти</a></li>{/literal}
        </ul>
    </li>
</ul>
{else}
<ul class="nav pull-right">
    <li class="divider-vertical"></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-white"></i> Авторизация <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="/auth"><i class="icon-share-alt"></i> Вход</a></li>
            <li><a href="/auth/register"><i class="icon-file"></i> Регистрация</a></li>
            <li class="divider"></li>
            <li><a href="/auth/remember_pass"><i class="icon-question-sign"></i> Напомнить пароль</a></li>
        </ul>
    </li>
</ul>
{/if}