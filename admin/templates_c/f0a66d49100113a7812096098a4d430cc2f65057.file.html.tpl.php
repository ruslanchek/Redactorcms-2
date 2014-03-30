<?php /* Smarty version Smarty 3.1.4, created on 2014-02-04 15:39:02
         compiled from "/home/sdnadmin/site_new/admin/templates/system/form_fields/html.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32161933152f0d156e3fd29-78709616%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0a66d49100113a7812096098a4d430cc2f65057' => 
    array (
      0 => '/home/sdnadmin/site_new/admin/templates/system/form_fields/html.tpl',
      1 => 1391021811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32161933152f0d156e3fd29-78709616',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
    'index' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52f0d156ef49d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f0d156ef49d')) {function content_52f0d156ef49d($_smarty_tpl) {?><div class="item_block">
    <label class="label" for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</label>

    <div class="html_window">
        <textarea class="textarea" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" tabindex="<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['value'];?>
</textarea>
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

<script type="text/javascript">initHTMLEditor($('#<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
'), '<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
')</script><?php }} ?>