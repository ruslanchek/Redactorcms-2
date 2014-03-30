<?php /* Smarty version Smarty 3.1.4, created on 2014-01-30 02:01:05
         compiled from "/home/sdnadmin/site_new/admin/templates/system/form_fields/select.tpl" */ ?>
<?php /*%%SmartyHeaderCode:123842280852e97a2165ccd2-32481232%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e425848a068033af798eccf5a0f1c2dc2d50e51' => 
    array (
      0 => '/home/sdnadmin/site_new/admin/templates/system/form_fields/select.tpl',
      1 => 1391021811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123842280852e97a2165ccd2-32481232',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
    'index' => 0,
    'main' => 0,
    'options' => 0,
    'key' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_52e97a217b1fc',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e97a217b1fc')) {function content_52e97a217b1fc($_smarty_tpl) {?><div class="item_block" id="select_<?php if (!$_smarty_tpl->tpl_vars['item']->value['slave_of']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['meta'];?>
<?php }?>" <?php if ($_smarty_tpl->tpl_vars['item']->value['slave_of']){?>style="position: absolute; left: -10000px"<?php }?>>
    <label class="label" for="<?php if (!$_smarty_tpl->tpl_vars['item']->value['slave_of']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['meta'];?>
<?php }?>" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</label>
    <div class="cl"></div>

    <select <?php if ($_smarty_tpl->tpl_vars['item']->value['section_id']){?>data-section_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['section_id'];?>
"<?php }?> class="select" data-name="<?php if (!$_smarty_tpl->tpl_vars['item']->value['slave_of']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['meta'];?>
<?php }?>" <?php if ($_smarty_tpl->tpl_vars['item']->value['slave_of']){?>data-slave="true"<?php }?> <?php if (!$_smarty_tpl->tpl_vars['item']->value['slave_of']){?>name="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"<?php }?> id="<?php if (!$_smarty_tpl->tpl_vars['item']->value['slave_of']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['meta'];?>
<?php }?>" tabindex="<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
">
        <option value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['value']==0||!$_smarty_tpl->tpl_vars['item']->value['value']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','zero_selection');?>
</option>
        <?php  $_smarty_tpl->tpl_vars['options'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['options']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['options']->key => $_smarty_tpl->tpl_vars['options']->value){
$_smarty_tpl->tpl_vars['options']->_loop = true;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['options']->value['key'];?>
" <?php if ($_smarty_tpl->tpl_vars['options']->value['key']==$_smarty_tpl->tpl_vars['item']->value['value']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['options']->value['key'];?>
. <?php echo $_smarty_tpl->tpl_vars['options']->value['value'];?>
</option>
        <?php } ?>
    </select>

    <?php if ($_smarty_tpl->tpl_vars['item']->value['link']){?>
        <?php if ($_smarty_tpl->tpl_vars['item']->value['value']>0){?>
            <span class="select-action-btn">
                <a href="#" data-name="<?php if (!$_smarty_tpl->tpl_vars['item']->value['slave_of']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['meta'];?>
<?php }?>" data-action_header="Редактирование объекта" class="ajax_viewport_link select-edit-link" data-url="<?php echo $_smarty_tpl->tpl_vars['item']->value['link'];?>
" data-src="<?php echo $_smarty_tpl->tpl_vars['item']->value['link'];?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['value'];?>
">
                    <i class="icon-edit"></i>Редактировать
                </a>
            </span>

            <script>
                $(function(){
                    var select_id = '<?php if (!$_smarty_tpl->tpl_vars['item']->value['slave_of']){?><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['item']->value['meta'];?>
<?php }?>';
                    var link = $('.select-edit-link[data-name="' + select_id + '"]');

                    $('#select_' + select_id).find('select').on('change', function(){
                        var src = link.data('url') + $(this).val();

                        link.data('src', src);
                        link.attr('data-src', src);
                    });
                });
            </script>
        <?php }?>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['item']->value['create_link']){?>
        <span class="select-action-btn">
            <a href="#" data-action_header="Создание, привязка, а затем редактирование объекта" class="ajax_viewport_link" data-src="<?php echo $_smarty_tpl->tpl_vars['item']->value['create_link'];?>
">
                <i class="icon-plus-squared"></i>Создать
            </a>
        </span>
    <?php }?>
</div>

<?php if ($_smarty_tpl->tpl_vars['item']->value['master']){?>
    <script type="text/javascript">
        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['item']->value['master']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>


            <?php if ($_smarty_tpl->tpl_vars['item']->value['value']==$_smarty_tpl->tpl_vars['key']->value){?>
                $(window).load(function(){
                    $('select.select[data-slave="true"]').removeAttr('name');

                    var $select = $('#select_' + '<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
');

                    $select.css({
                        position: 'static',
                        left: 0
                    }).find('select').attr('name', 'content_id');

                    $('select.select').chosen();
                });
            <?php }?>

            $('#' + '<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
').change(function(){
                var value = $(this).val(),
                    $select = $('#select_' + '<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
');

                $('select.select[data-slave="true"]').removeAttr('name');

                if(value == '<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
'){
                    $select.css({
                        position: 'static',
                        left: 0
                    });

                    $select.find('select').attr('name', 'content_id').val('0');
                    $select.find('select').find('option').removeAttr('selected');
                    $select.find('select').find('option:first').attr('selected', 'selected');
                    $select.find('select').trigger("liszt:updated");
                }else{
                    $select.css({
                        position: 'absolute',
                        left: -10000
                    });
                }

                $('select.select').chosen();
            });
        <?php } ?>
    </script>
<?php }?><?php }} ?>