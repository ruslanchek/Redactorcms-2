<div class="unit-20">
    <nav class="nav-footer">
        <a href="/about">О компании</a>

        <nav class="sub">
        {foreach $core->getInlineMenu(3, 87) as $item}
            <a href="{$item.path}" {if $item.id == $core->page.id || $item.id == $core->page.pid}class="active"{/if}>{$item.name}</a>
        {/foreach}
        </nav>
    </nav>

    <nav class="nav-footer">
        <a href="/about">Документы</a>

        <nav class="sub">
            {foreach $core->getInlineMenu(3, 83) as $item}
                <a href="{$item.path}" {if $item.id == $core->page.id || $item.id == $core->page.pid}class="active"{/if}>{$item.name}</a>
            {/foreach}
        </nav>
    </nav>

    <nav class="nav-footer">
        <a href="/helpful">Полезная информация</a>
    </nav>
</div>

<div class="unit-20">
    <nav class="nav-footer">
        <a href="/services">Услуги</a>

        <nav class="sub">
        {foreach $core->getInlineMenu(3, 85) as $item}
            <a href="{$item.path}" {if $item.id == $core->page.id || $item.id == $core->page.pid}class="active"{/if}>{$item.name}</a>
        {/foreach}
        </nav>
    </nav>
</div>

<div class="unit-20">
    <nav class="nav-footer">
        <a href="/datacenter">Дата-центр</a>

        <nav class="sub">
            {foreach $core->getInlineMenu(3, 86) as $item}
                <a href="{$item.path}" {if $item.id == $core->page.id || $item.id == $core->page.pid}class="active"{/if}>{$item.name}</a>
            {/foreach}
        </nav>
    </nav>

    <nav class="nav-footer">
        <a href="/market-press">Маркет-пресс</a>

        <nav class="sub">
            {foreach $core->getInlineMenu(3, 17) as $item}
                <a href="{$item.path}" {if $item.id == $core->page.id || $item.id == $core->page.pid}class="active"{/if}>{$item.name}</a>
            {/foreach}
        </nav>
    </nav>

    <nav class="nav-footer">
        <a href="/contacts">Контакты</a>
    </nav>
</div>
