<div class="limiter">
    <div class="units-row">
        {include file="include/common/footer-menu.tpl"}

        <div class="unit-33 float-right">
            <div class="address">
                <h2>Адрес</h2>

                <p>
                    {$core->getConstant('common', 'corporate_address')}
                </p>

                <div class="contact">
                    <div class="phones">
                        <div class="phone">+7 (812) 319-00-04</div>
                        <div class="phone">+7 (495) 980-60-09</div>
                    </div>

                    <a href="#" class="link call-me-opener">Заказать обратный звонок</a>
                    <a href="#" class="link feedback-opener">Написать письмо</a>
                </div>
            </div>
        </div>

        <div class="clear"></div>
    </div>

    <br>
    <hr>
    <br>

    <div class="units-row">
        <div class="unit-20">
            <div class="copy">
                &copy;

                {if $core->getConstant('common', 'start_year') < date('Y')}
                    {$core->getConstant('common', 'start_year')}&ndash;
                {/if}

                {date('Y')}

                {$core->getConstant('common', 'brand_name')}
            </div>
        </div>

        <div class="unit-40">
            <div class="search-form">
                <form action="/search" method="get">
                    <input class="input" type="text" name="sq" placeholder="Поиск по сайту" />
                    <input class="go" type="submit" value="" title="Найти" />
                </form>
            </div>
        </div>

        <div class="unit-20">
            <div class="socials">
                {*
                <a href="#" class="fb" title="Facebook"></a>
                <a href="#" class="in" title="Linked In"></a>
                <a href="#" class="tw" title="Twitter"></a>
                *}
            </div>
        </div>

        <div class="unit-20">
            <span class="birs">Сделано в <a href="http://birsagency.ru">Бирс</a></span>
        </div>
    </div>
</div>

{$core->getConstant('scripts', 'body_code')}
