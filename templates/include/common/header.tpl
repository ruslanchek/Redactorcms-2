{if !$mainpage}
    <a href="/" class="logo">SDN</a>
{else}
    <a href="/" class="logo">SDN</a>
{/if}

<div class="hello">
    Модульный дата-центр SDN в Санкт-Петербурге
    <div class="bottom">Новый уровень сервиса</div>
</div>

<div class="contact">
    <div class="phones">
        <div class="phone">{$core->getConstant('common', 'main_phone')}</div>
        <div class="phone">{$core->getConstant('common', 'addtional_phone')}</div>
    </div>

    <a href="#" class="link call-me-opener">Заказать обратный звонок</a>
    <a href="#" class="link feedback-opener">Написать письмо</a>

    <a href="#" class="gray-block-button"><span>Личный кабинет</span></a>
</div>

<nav class="main">
    {include file="include/common/main-menu.tpl"}

    <a class="right-side-button" href="/contacts/visit">Заявка на посещение</a>
</nav>