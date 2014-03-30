{$pack_1 = $core->getTariffsPack(1)}
{$pack_2 = $core->getTariffsPack(2)}
{$pack_3 = $core->getTariffsPack(3)}

{$tariffs_1 = $core->getTariffs(1)}
{$tariffs_2 = $core->getTariffs(2)}
{$tariffs_3 = $core->getTariffs(3)}

<a name="tariffs"></a>

<div class="tariffs">
    <div class="limiter">
        <nav>
            <h1>Пакеты тарифов</h1>

            <a class="item" data-id="1" href="#">{$pack_1.name}</a>
            <a class="item active" data-id="2" href="#">{$pack_2.name}</a>
            <a class="item" data-id="3" href="#">{$pack_3.name}</a>

            <a data-tariff="Индивидуальная конфигурация" class="button tariff-order" href="#">Индивидуальная конфигурация</a>
        </nav>

        <div class="groups">

            <div class="group" data-id="1">
                <div class="tariff-desc">
                    {$pack_1.text}
                </div>

                <div class="units-row">
                    {foreach from=$tariffs_1 item=item key=i name=tariffs_1}
                        <div class="{if count($tariffs_1) > 3}unit-25{else}unit-33{/if}">
                            <div class="tariff-col" style="margin-right: 10px;">
                                <div class="header">{$item.name}</div>
                                <div class="subheader">{$item.price} <span class="rub">&#8399;</span></div>
                                <div class="tariff-content">
                                    {$p = json_decode($item.params)}

                                    <table>
                                        {foreach $p as $param}
                                            <tr>
                                                <th>{$param->key}</th>
                                                <td><span class="big">{urldecode($param->val)}</span></td>
                                            </tr>
                                        {/foreach}
                                    </table>
                                </div>

                                <i class="triangle"></i>

                                <div class="tariff-after">
                                    {$item.promo}

                                    <a href="#" data-tariff="{$pack_1.name|escape} {$item.name|escape}" class="tariff-order button button-yellow">Заказать</a>
                                </div>
                            </div>
                        </div>
                    {/foreach}
                </div>
            </div>

            <div class="group active" data-id="2">
                <div class="tariff-desc">
                    {$pack_2.text}
                </div>

                <div class="units-row">
                    {foreach from=$tariffs_2 item=item key=i name=tariffs_2}
                        <div class="{if count($tariffs_2) > 3}unit-25{else}unit-33{/if}">
                            <div class="tariff-col" style="margin-right: 10px;">
                                <div class="header">{$item.name}</div>
                                <div class="subheader">{$item.price} <span class="rub">&#8399;</span></div>
                                <div class="tariff-content">
                                    {$p = json_decode($item.params)}

                                    <table>
                                        {foreach $p as $param}
                                            <tr>
                                                <th>{$param->key}</th>
                                                <td><span class="big">{$param->val}</span></td>
                                            </tr>
                                        {/foreach}
                                    </table>
                                </div>

                                <i class="triangle"></i>

                                <div class="tariff-after">
                                    {$item.promo}

                                    <a href="#" data-tariff="{$pack_2.name|escape} {$item.name|escape}" class="tariff-order button button-yellow">Заказать</a>
                                </div>
                            </div>
                        </div>
                    {/foreach}
                </div>
            </div>

            <div class="group" data-id="3">
                <div class="tariff-desc">
                    {$pack_3.text}
                </div>

                <div class="units-row">
                    {foreach from=$tariffs_3 item=item key=i name=tariffs_3}
                        <div class="{if count($tariffs_3) > 3}unit-25{else}unit-33{/if}">
                            <div class="tariff-col" style="margin-right: 10px;">
                                <div class="header">{$item.name}</div>
                                <div class="subheader">{$item.price} <span class="rub">&#8399;</span></div>
                                <div class="tariff-content">
                                    {$p = json_decode($item.params)}

                                    <table>
                                        {foreach $p as $param}
                                            <tr>
                                                <th>{$param->key}</th>
                                                <td><span class="big">{$param->val}</span></td>
                                            </tr>
                                        {/foreach}
                                    </table>
                                </div>

                                <i class="triangle"></i>

                                <div class="tariff-after">
                                    {$item.promo}

                                    <a href="#" data-tariff="{$pack_3.name|escape} {$item.name|escape}" class="tariff-order button button-yellow">Заказать</a>
                                </div>
                            </div>
                        </div>
                    {/foreach}
                </div>
            </div>


        </div>
    </div>
</div>

<script>
    $(function () {
        tariffs.init();
    });
</script>