<div id="footer">
    <div class="foter_inner">
        <div class="left_col">
            <div class="social">
                <a class="vk" href="http://vk.com/kfshimki"></a>
                <a class="tw" href="https://twitter.com/#!/kfshimki"></a>
                <a class="fb" href="http://www.facebook.com/pages/%D0%9A%D0%BE%D0%BC%D0%B8%D1%82%D0%B5%D1%82-%D0%BF%D0%BE-%D1%84%D0%B8%D0%B7%D0%B8%D1%87%D0%B5%D1%81%D0%BA%D0%BE%D0%B9-%D0%BA%D1%83%D0%BB%D1%8C%D1%82%D1%83%D1%80%D0%B5-%D1%81%D0%BF%D0%BE%D1%80%D1%82%D1%83-%D1%82%D1%83%D1%80%D0%B8%D0%B7%D0%BC%D1%83-%D0%B8-%D1%80%D0%B0%D0%B1%D0%BE%D1%82%D0%B5-%D1%81-%D0%BC%D0%BE%D0%BB%D0%BE%D0%B4%D0%B5%D0%B6%D1%8C%D1%8E/300932186632821"></a>

                <div class="clear"></div>
            </div>

            &copy; 2012 Комитет по физической культуре, спорту, туризму и работе с молодёжью.
        </div>

        <div class="right_col">
            <div class="col_70">
                <h3>Наши контакты</h3>

                <p>
                    141400 Московская обл, городской округ Химки,<br>
                    улица Кирова, владение 24, Cтадион &laquo;Арена-Химки&raquo;.
                </p>
                <p>
                    Телефон: +7 (495) 573-31-92.<br>
                    Факс: +7 (495) 572-51-44.<br>
                    Электронная почта: <a href="mailto:sport@kfshimki.ru">sport@kfshimki.ru</a>.
                </p>
            </div>

            <ul class="col_30 footer_menu">
                <li><a{if $core->page.id == 1} class="active"{/if} href="/">Главная</a></li>

                {foreach from=$core->getInlineMenu(3, 1) item=item}
                <li><a{if $item.id == $core->page.id} class="active"{/if} href="{$item.path}">{$item.name}</a></li>
                {/foreach}
            </ul>

            <div class="clear"></div>
        </div>

        <div class="clear"></div>
    </div>
</div>