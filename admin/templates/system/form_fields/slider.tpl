<div class="item_block">
    <label class="label" for="{$item.name}" title="{$item.help}">{$item.label} &mdash; <strong id="amount_{$item.name}">{$item.value}</strong></label>
    <input type="hidden" id="{$item.name}" name="{$item.name}" value="{$item.value}" />
    <div class="slider_container">
        <div id="slider_{$item.name}"></div>
    </div>
    <script type="text/javascript">initSlider('{$item.name}', {$item.value}, {$item.min}, {$item.max}, {$item.interval})</script>
</div>