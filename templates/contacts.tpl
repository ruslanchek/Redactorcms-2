<!DOCTYPE html>
<html>
    {include file="include/common/head.tpl"}

    <body>
        {include file="include/common/header.tpl"}

        <div class="main-content limiter">
            {include file="include/common/breadcrumbs.tpl"}

            <h1>{$core->page.h1}</h1>
            <hr>

            <div class="row">
                <div class="twothird">
                    <div class="maps rounded">
                        <script type="text/javascript" charset="utf-8" src="{$core->getConstant('yandex_maps', 'src')}&amp;width={$core->getConstant('yandex_maps', 'width')}&amp;height={$core->getConstant('yandex_maps', 'height')}"></script>
                    </div>

                    <br>

                    {$core->page.content}
                </div>

                <div class="third">
                    <div class="textured rounded">
                        <h2>Контактные данные</h2>

                        <p>
                            <strong>Телефон</strong>
                            <br>
                            {$core->getConstant('common', 'main_phone')}
                            <br>&nbsp;<em class="gray">{$core->getConstant('common', 'main_phone_suffix')}</em>
                        </p>

                        <p>
                            <strong>Электронная почта</strong>
                            <br>
                            <a href="mailto:{$core->getConstant('common', 'main_email')|escape}">{$core->getConstant('common', 'main_email')}</a>
                        </p>

                        <p>
                            <strong>Адрес</strong>
                            <br>
                            {$core->getConstant('common', 'corporate_address')}
                        </p>
                    </div>

                    {include file="include/common/price-demand.tpl"}
                    {include file="include/common/events-shortlist.tpl"}
                    {include file="include/common/news-shortlist.tpl"}
                </div>
            </div>
        </div>

        {include file="include/common/footer.tpl"}
    </body>
</html>