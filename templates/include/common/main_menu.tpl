{* Главное меню *}
<div class="top-nav">
    <nav>
        <div class="links">
            <a href="/">Главная</a>
            <i class="spacer"></i>

            {foreach from=$core->getInlineMenu(3, 1) item=item}
            <a href="{$item.path}" {if $item.id == $core->page.id} class="active"{/if}>{$item.name}</a>
            <i class="spacer"></i>
            {/foreach}
        </div>

        <div class="buttons">
            <a id="call-me-opener" href="#" class="button button-gray">Заказать обратный звонок</a>
            <a id="feedback-opener" href="#" class="button button-orange">Разместить заявку</a>
        </div>
    </nav>

    <div class="shadow"></div>
</div>