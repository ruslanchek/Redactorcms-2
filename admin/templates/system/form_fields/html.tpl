<div class="item_block">
    <label class="label" for="{$item.name}" title="{$item.help}">{$item.label}</label>

    <div class="html_window">
        <textarea class="textarea" name="{$item.name}" id="{$item.name}" tabindex="{$index + 1}">{$item.value}</textarea>
    </div>
</div>


<link rel="stylesheet" href="/admin/codemirror/lib/codemirror.css">
<script src="/admin/codemirror/lib/codemirror.js"></script>
<script src="/admin/codemirror/mode/xml/xml.js"></script>
<script src="/admin/codemirror/mode/javascript/javascript.js"></script>
<script src="/admin/codemirror/mode/css/css.js"></script>
<script src="/admin/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<script src="/admin/codemirror/mode/smarty/smarty.js"></script>
<script src="/admin/codemirror/mode/smartymixed/smartymixed.js"></script>

<script type="text/javascript">initHTMLEditor($('#{$item.name}'), '{$item.name}')</script>