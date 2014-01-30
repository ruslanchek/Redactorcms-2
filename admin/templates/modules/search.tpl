<h1>{$main->h1}</h1>

<div class="sections_list_tools list_menu_buttons">
    <a class="button" href="javascript:void(0)" tabindex="1" title="Очистить индексы" onclick="clearIndex()">
        <span>
            <img class="button_icon" src="/admin/img/frames/e.gif">
            <b>Очистить индексы</b>
        </span>
    </a>

    <a class="button" href="javascript:void(0)" tabindex="1" title="Проиндексировать" onclick="updateIndex()">
        <span>
            <img class="button_icon" src="/admin/img/frames/e.gif">
            <b>Проиндексировать</b>
        </span>
    </a>

    <div class="cl"></div>
</div>


<div class="list_table">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            {if $index_count <= 1}
            <tr class="unactive empty">
                <td>&nbsp;</td>
                <td align="center" id="status_message">Таблица индексов пуста</td>
                <td>&nbsp;</td>
            </tr>
            {else}
                <tr class="unactive empty">
                    <td>&nbsp;</td>
                    <td align="center" id="status_message">Проиндексированно: {$index_count}</td>
                    <td>&nbsp;</td>
                </tr>
            {/if}
        </tbody>
    </table>
</div>

<p id="indexing_indicate"></p>
<div class="list_table" id="result_of_indexing" style="display: none">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="fulltable" class="result_of_mail_tab">
        <tr>
            <th width="1%">Код</th>
            <th width="1%"></th>
            <th width="35%" align="left">Страница</th>
            <th width="32%" align="left">Адрес</th>
            <th width="31%" align="left">Реферрер</th>
        </tr>
    </table>
</div>