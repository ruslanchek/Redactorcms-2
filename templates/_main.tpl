<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
    {include file="include/common/head.tpl"}

    <body>
        <div id="wrapper">
        {include file="include/common/top.tpl"}

        {include file="include/common/top_menu.tpl"}

            <div id="content">
                <div class="left_col">
                    {include file="include/common/left_side_menu.tpl"}

                    {include file="include/common/chart.tpl"}
                </div>

                <div class="right_col">
                    {if !$smarty.get.item}
                    <div class="images">
                        <a class="slide_left" href="javascript:void(0)"></a>
                        <a class="slide_right" href="javascript:void(0)"></a>

                        <div class="slides navy_block">
                            <div class="container">

                                <div class="slide">
                                    <div class="slide_inner" style="background-image: url('/resources/img/slides/slide_1.jpg')">
                                        <div class="info_line">
                                            <h1>Слайд 1</h1>
                                        </div>
                                    </div>
                                </div>

                                <div class="slide">
                                    <div class="slide_inner" style="background-image: url('/resources/img/slides/slide_2.jpg')">
                                        <div class="info_line">
                                            <h1>Слайд 2</h1>
                                        </div>
                                    </div>
                                </div>

                                <div class="slide">
                                    <div class="slide_inner" style="background-image: url('/resources/img/slides/slide_3.jpg')">
                                        <div class="info_line">
                                            <h1>Слайд 3</h1>
                                        </div>
                                    </div>
                                </div>

                                <div class="slide">
                                    <div class="slide_inner" style="background-image: url('/resources/img/slides/slide_4.jpg')">
                                        <div class="info_line">
                                            <h1>Слайд 4</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pagination"></div>
                    </div>
                    {/if}

                    {if $smarty.get.item}
                    {include file="include/common/breadcrumbs.tpl"}
                    {/if}

                    <div class="page-header">
                        <h1>{$core->page.h1}</h1>
                    </div>

                    <div class="content_c">
                        {$core->page.content}
                    </div>
                </div>

                <div class="clear"></div>
            </div>
        </div>

        {include file="include/common/footer.tpl"}
    </body>
</html>