<?php /* Smarty version Smarty 3.1.4, created on 2011-12-10 17:34:46
         compiled from "Z:/home/loc/redactorcms/admin/templates\system\form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:46254ee32a0ebb04b3-67686506%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8a68339bc7b60f8177ab057a71c59d30e9a4ac0' => 
    array (
      0 => 'Z:/home/loc/redactorcms/admin/templates\\system\\form.tpl',
      1 => 1323527684,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46254ee32a0ebb04b3-67686506',
  'function' => 
  array (
  ),
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4ee32a0fe3782',
  'variables' => 
  array (
    'main' => 0,
    'item' => 0,
    'index' => 0,
    'options' => 0,
    'filelist' => 0,
    'file' => 0,
    'extension' => 0,
    'i' => 0,
    'sections' => 0,
    'markers' => 0,
    'marker' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ee32a0fe3782')) {function content_4ee32a0fe3782($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date')) include 'Z:\home\loc\redactorcms\smarty\plugins\modifier.date.php';
if (!is_callable('smarty_modifier_filesize')) include 'Z:\home\loc\redactorcms\smarty\plugins\modifier.filesize.php';
?><?php echo $_smarty_tpl->getSubTemplate ("system/scripts/form_calendar_words.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("system/scripts/form_validator_rules.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("system/scripts/form_texts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="form">
    <?php if ($_smarty_tpl->tpl_vars['main']->value->form_error['condition']>0){?>
    <div class="result_message <?php if ($_smarty_tpl->tpl_vars['main']->value->form_error['condition']==2){?>error<?php }?><?php if ($_smarty_tpl->tpl_vars['main']->value->form_error['condition']==1){?>ok<?php }?>">
        <?php echo $_smarty_tpl->tpl_vars['main']->value->form_error['message'];?>

    </div>
    <?php }?>
    
    <form action="<?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['form_action'];?>
" method="<?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['method'];?>
" enctype="<?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['enctype'];?>
" id="form">
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['main']->value->dataset['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
            <?php if (!$_smarty_tpl->tpl_vars['item']->value['no_edit']){?>
                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='checkbox'){?>
                    <div class="cb_item_block" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
">
                        <div class="cb_left">
                            <label for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</label>
                        </div>
                        <div class="cb_right">
                            <input class="checkbox iphone_checkbox" type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" value="1" <?php if ($_smarty_tpl->tpl_vars['item']->value['value']=="1"){?>checked="checked"<?php }?> tabindex="<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
" />
                        </div>
                        <div class="clear"></div>
                    </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='text'){?>
                    <div class="item_block">
                        <label class="label" for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</label>
                        <input class="text<?php if ($_smarty_tpl->tpl_vars['item']->value['email']){?> email<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['number']){?> number<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['required']){?> required<?php }?>" type="text" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['value'], ENT_QUOTES, 'UTF-8', true);?>
" tabindex="<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
" />
                    </div>

                    <?php if ($_smarty_tpl->tpl_vars['item']->value['unique']){?>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            checkUniqueField('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
', '<?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['table'];?>
');
                        });
                    </script>
                    <?php }?>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='url'){?>
                    <div class="item_block">
                        <label class="label" for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</label>
                        <input class="text<?php if ($_smarty_tpl->tpl_vars['item']->value['required']){?> required<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['mode']==1){?> url<?php }elseif($_smarty_tpl->tpl_vars['item']->value['mode']==2){?> urlpart<?php }?>" type="text" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['value'], ENT_QUOTES, 'UTF-8', true);?>
" tabindex="<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
" />
                    </div>

                    <?php if ($_smarty_tpl->tpl_vars['item']->value['mode']==2){?>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            checkUniqueField('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
', '<?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['table'];?>
');
                        });
                    </script>
                    <?php }?>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='tags'){?>
                    <div class="item_block">
                        <label class="label" for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</label>
                        <input class="text<?php if ($_smarty_tpl->tpl_vars['item']->value['email']){?> email<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['number']){?> number<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['required']){?> required<?php }?>" type="text" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['value'], ENT_QUOTES, 'UTF-8', true);?>
" tabindex="<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
" />
                        <script type="text/javascript">initTagsInput('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
')</script>
                    </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='slider'){?>
                    <div class="item_block">
                        <label class="label" for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
 &mdash; <strong id="amount_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['value'];?>
</strong></label>
                        <input type="hidden" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['value'];?>
" />
                        <div class="slider_container">
                            <div id="slider_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"></div>
                        </div>
                        <script type="text/javascript">initSlider('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
', <?php echo $_smarty_tpl->tpl_vars['item']->value['value'];?>
, <?php echo $_smarty_tpl->tpl_vars['item']->value['min'];?>
, <?php echo $_smarty_tpl->tpl_vars['item']->value['max'];?>
, <?php echo $_smarty_tpl->tpl_vars['item']->value['interval'];?>
)</script>
                    </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='param'){?>
                    <div class="item_block">
                        <label class="label" for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</label>
                        <div class="cl"></div>
                        <div class="param">
                            <table class="param_tab">
                                <tr>
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['prefix']){?>
                                    <td class="prefix">
                                        <div><?php echo $_smarty_tpl->tpl_vars['item']->value['prefix'];?>
</div>
                                    </td>
                                    <?php }?>

                                    <td>
                                        <input class="text<?php if ($_smarty_tpl->tpl_vars['item']->value['email']){?> email<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['number']){?> number<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['required']){?> required<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['urlconversion']){?> remote<?php }?>" type="text" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['value'];?>
" tabindex="<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
" />
                                    </td>

                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['suffix']){?>
                                    <td class="suffix">
                                        <div><?php echo $_smarty_tpl->tpl_vars['item']->value['suffix'];?>
</div>
                                    </td>
                                    <?php }?>
                                </tr>
                            </table>
                        </div>
                        <div class="cl"></div>
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['unique']){?>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            checkUniqueField('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
', '<?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['table'];?>
');
                        });
                    </script>
                    <?php }?>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='password'){?>
                    <div class="item_block">
                        <label class="label" for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</label>
                        <div class="cl"></div>

                        <input class="text password<?php if ($_smarty_tpl->tpl_vars['item']->value['required']){?> required<?php }?>" type="password" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['value'];?>
" autocomplete="off" tabindex="<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
" />
                    </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='textarea'){?>
                    <div class="item_block">
                        <label class="label" for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</label>

                        <?php if ($_smarty_tpl->tpl_vars['item']->value['use_editor']){?>
                            <a href="javascript:void(0)" class="typo" rel="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_edit_item_typography');?>
</a>
                        <?php }?>
                        <div class="cl"></div>

                        <textarea class="textarea <?php if ($_smarty_tpl->tpl_vars['item']->value['required']){?> required<?php }?>" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" rows="<?php echo $_smarty_tpl->tpl_vars['item']->value['rows'];?>
" tabindex="<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['value'];?>
</textarea>
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['use_editor']){?>
                            <script type="text/javascript">initEditor($('#<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
'), '<?php echo $_smarty_tpl->tpl_vars['main']->value->locale;?>
', '<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
')</script>
                        <?php }?>
                    </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='select'){?>
                    <div class="item_block">
                        <label class="label" for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</label>
                        <div class="cl"></div>

                        <select class="select" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" tabindex="<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
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
                    </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='multiselect'){?>
                    <div class="item_block">
                        <label class="label" for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</label>
                        <div class="cl"></div>

                        <select id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" tabindex="<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
" multiple="multiple" class="multiselect" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
[]">
                            <option value="0" <?php if ($_smarty_tpl->tpl_vars['item']->value['value']==0||!$_smarty_tpl->tpl_vars['item']->value['value']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','zero_selection');?>
</option>
                            <?php  $_smarty_tpl->tpl_vars['options'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['options']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['options']->key => $_smarty_tpl->tpl_vars['options']->value){
$_smarty_tpl->tpl_vars['options']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['options']->value['key'];?>
" <?php if ($_smarty_tpl->tpl_vars['main']->value->compareMultiSelectValues($_smarty_tpl->tpl_vars['item']->value['value'],$_smarty_tpl->tpl_vars['options']->value['key'])){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['options']->value['key'];?>
. <?php echo $_smarty_tpl->tpl_vars['options']->value['value'];?>
</option>
                            <?php } ?>
                        </select>
                    </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='color_picker'){?>
                    <div class="item_block">
                        <label class="label" for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</label>
                        <div class="cl"></div>

                        <span class="hex_color_input_prefix"><span>#</span></span>
                        <input class="text color_picker_input required" type="text" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['value'];?>
" tabindex="<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
" />

                        <div class="color_preview" style="background-color: #<?php echo $_smarty_tpl->tpl_vars['item']->value['value'];?>
;"></div>

                        <div class="d-shadow-small color_picker_frame" id="color_picker_frame_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
                            <div class="d-shadow-small-wrap">
                                <div class="calendar_frame" id="color_picker_instance_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"></div>
                                <div class="d-sh-small-cn d-sh-small-tl"></div>
                                <div class="d-sh-small-cn d-sh-small-tr"></div>
                            </div>
                            <div class="d-sh-small-cn d-sh-small-bl"></div>
                            <div class="d-sh-small-cn d-sh-small-br"></div>
                        </div>

                        <div class="regular_button round_button_holder">
                            <a href="javascript:void(0)" class="round_button" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_button_color_picker');?>
" onclick="colorpicker.openPicker('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
')">
                                <span class="color_picker"></span>
                            </a>
                        </div>

                        <script type="text/javascript">
                            $('#color_picker_instance_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
').farbtastic('#<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
');
                            colorpicker.setHexColorValidatorListener('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
');
                        </script>

                        <div class="cl"></div>
                    </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='calendar'){?>
                    <div class="item_block">
                        <label class="label" for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</label>
                        <div class="cl"></div>

                        <input autocomplete="off" onblur="calendar.blurInput('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
')" onfocus="calendar.focusInput('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
')" class="text calendar_date" type="text" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" value="<?php echo smarty_modifier_date($_smarty_tpl->tpl_vars['item']->value['value'],'date');?>
" tabindex="<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
" />

                        <div class="d-shadow-small calendar_picker_frame" id="calendar_frame_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
                            <div class="d-shadow-small-wrap">
                                <div class="calendar_frame" id="calendar_picker_instance_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"></div>

                                <div class="tb_block">
                                    <a rel="ok" class="tool_button blue_tb" href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_tool_action_ok');?>
</a>
                                    <a class="tool_button gray_tb" href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_tool_action_today');?>
</a>
                                    <div class="cl"></div>
                                </div>

                                <div class="d-sh-small-cn d-sh-small-tl"></div>
                                <div class="d-sh-small-cn d-sh-small-tr"></div>
                            </div>
                            <div class="d-sh-small-cn d-sh-small-bl"></div>
                            <div class="d-sh-small-cn d-sh-small-br"></div>
                        </div>

                        <div class="regular_button round_button_holder">
                            <a href="javascript:void(0)" class="round_button" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_button_calendar_date');?>
" onclick="calendar.openPicker('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
')"><span class="date_picker"></span></a>
                        </div>

                        <input autocomplete="off" onclick="timepicker.openPicker('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
')" class="text calendar_time" readonly="readonly" type="text" id="time_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" value="<?php echo smarty_modifier_date($_smarty_tpl->tpl_vars['item']->value['value'],'time');?>
" tabindex="<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
" />

                        <div class="d-shadow-small calendar_time_picker_frame" id="calendar_time_frame_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
                            <div class="d-shadow-small-wrap">
                                <div class="calendar-time_frame" id="calendar_time_picker_instance_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">

                                    <div class="timepicker_block">
                                        <div class="tpb_block">
                                            <div class="tpb_controls">
                                                <a href="javascript:void(0)" class="h-up"></a>
                                                <a href="javascript:void(0)" class="m-up"></a>
                                                <a href="javascript:void(0)" class="h-dn"></a>
                                                <a href="javascript:void(0)" class="m-dn"></a>
                                            </div>

                                            <div class="tpb_digit h-1">1</div>
                                            <div class="tpb_digit h-2">2</div>
                                            <div class="tpb_colon">:</div>
                                            <div class="tpb_digit m-1">4</div>
                                            <div class="tpb_digit m-2">7</div>

                                            <div class="cl"></div>
                                        </div>
                                    </div>

                                    <div class="tb_block">
                                        <a rel="ok" class="tool_button blue_tb" href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_tool_action_ok');?>
</a>
                                        <a class="tool_button gray_tb" href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_tool_action_now');?>
</a>
                                        <div class="cl"></div>
                                    </div>

                                </div>
                                <div class="d-sh-small-cn d-sh-small-tl"></div>
                                <div class="d-sh-small-cn d-sh-small-tr"></div>
                            </div>
                            <div class="d-sh-small-cn d-sh-small-bl"></div>
                            <div class="d-sh-small-cn d-sh-small-br"></div>
                        </div>

                        <div class="regular_button round_button_holder">
                            <a href="javascript:void(0)" class="round_button" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_button_calendar_time');?>
" onclick="timepicker.openPicker('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
')"><span class="time_picker"></span></a>
                        </div>

                        <input autocomplete="off" type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" id="parsed_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['value'];?>
" />

                        <div class="cl"></div>
                    </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='image'){?>
                    <?php $_smarty_tpl->tpl_vars["filelist"] = new Smarty_variable($_smarty_tpl->tpl_vars['main']->value->getImagesList(0,$_smarty_tpl->tpl_vars['item']->value['name'],$_smarty_tpl->tpl_vars['main']->value->dataset['params']['table'],$_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['id']), null, 0);?>
                    <div class="item_block">
                        <label class="label" for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</label>
                        <div class="cl"></div>

                        <div class="upload_tools" id="file_list_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
_uploader" <?php if ($_smarty_tpl->tpl_vars['filelist']->value){?>style="display: none;"<?php }?>>
                            <div id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"></div>
                            <div class="cl"></div>

                            <script type="text/javascript">
                                createImagesUploader(
                                    '<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
',
                                    '<?php echo $_smarty_tpl->tpl_vars['item']->value['folder'];?>
',
                                    '0',
                                    <?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['id'];?>
,
                                    '<?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['table'];?>
',
                                    false,
                                    '<?php echo $_smarty_tpl->tpl_vars['item']->value['thumbs'];?>
'
                                );
                            </script>
                        </div>

                        <?php if ($_smarty_tpl->tpl_vars['filelist']->value){?>
                        <div class="gallery" id="file_list_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
                            <?php  $_smarty_tpl->tpl_vars['file'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['file']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['filelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['file']->key => $_smarty_tpl->tpl_vars['file']->value){
$_smarty_tpl->tpl_vars['file']->_loop = true;
?>
                                <div class="image">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['file']->value['path'];?>
<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
<?php if ($_smarty_tpl->tpl_vars['file']->value['extension']){?>.<?php echo $_smarty_tpl->tpl_vars['file']->value['extension'];?>
<?php }?>" target="_blank">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['file']->value['path'];?>
._thumb_<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
<?php if ($_smarty_tpl->tpl_vars['file']->value['extension']){?>.<?php echo $_smarty_tpl->tpl_vars['file']->value['extension'];?>
<?php }?>"/>
                                    </a>

                                    <div class="image_tools">
                                        <div class="it_buttons">
                                            <a title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_button_delete_image');?>
" onclick="deleteImage('<?php echo $_smarty_tpl->tpl_vars['file']->value['id'];?>
', 'file_list_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
', true, '<?php echo $_smarty_tpl->tpl_vars['item']->value['thumbs'];?>
');" href="javascript:void(0)" class="del_button"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('common','delete');?>
</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="single_image_info">
                                    <h3><strong><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['file']->value['path'];?>
<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
<?php if ($_smarty_tpl->tpl_vars['file']->value['extension']){?>.<?php echo $_smarty_tpl->tpl_vars['file']->value['extension'];?>
<?php }?>"><?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
<?php if ($_smarty_tpl->tpl_vars['file']->value['extension']){?>.<?php echo $_smarty_tpl->tpl_vars['file']->value['extension'];?>
<?php }?></a></strong></h3>
                                    <table cellpadding="0" cellspacing="0" border="0" class="image_info_tab">
                                        <tr>
                                            <th><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_image_date');?>
</th>
                                            <td><?php echo smarty_modifier_date($_smarty_tpl->tpl_vars['file']->value['date'],"datetime");?>
</td>
                                        </tr>
                                        <tr>
                                            <th><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_image_size');?>
</th>
                                            <td><?php echo smarty_modifier_filesize($_smarty_tpl->tpl_vars['file']->value['size']);?>
</td>
                                        </tr>
                                        <tr>
                                            <th><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_image_dimensions');?>
</th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['file']->value['width'];?>
 x <?php echo $_smarty_tpl->tpl_vars['file']->value['height'];?>
</td>
                                        </tr>
                                    </table>
                                </div>
                            <?php } ?>
                            <div class="cl"></div>
                        </div>
                        <script type="text/javascript">
                            initUploadedPhoto('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
');
                        </script>
                        <?php }else{ ?>
                        <div class="gallery" id="file_list_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
                            <div class="cl"></div>
                        </div>
                        <?php }?>
                    </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='gallery'){?>
                    <?php $_smarty_tpl->tpl_vars["filelist"] = new Smarty_variable($_smarty_tpl->tpl_vars['main']->value->getImagesList(1,$_smarty_tpl->tpl_vars['item']->value['name'],$_smarty_tpl->tpl_vars['main']->value->dataset['params']['table'],$_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['id']), null, 0);?>

                    <div class="item_block">
                        <label class="label" for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</label>
                        <div class="cl"></div>

                        <div class="upload_tools">
                            <div id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"></div>
                            <div class="cl"></div>

                            <script type="text/javascript">
                                createImagesUploader(
                                    '<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
',
                                    '<?php echo $_smarty_tpl->tpl_vars['item']->value['folder'];?>
',
                                    '1',
                                    <?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['id'];?>
,
                                    '<?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['table'];?>
',
                                    true,
                                    '<?php echo $_smarty_tpl->tpl_vars['item']->value['thumbs'];?>
'
                                );
                            </script>
                        </div>

                        <?php if ($_smarty_tpl->tpl_vars['filelist']->value){?>
                        <div class="gallery" id="file_list_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
                            <?php  $_smarty_tpl->tpl_vars['file'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['file']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['filelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['file']->key => $_smarty_tpl->tpl_vars['file']->value){
$_smarty_tpl->tpl_vars['file']->_loop = true;
?>
                                <div rel="<?php echo $_smarty_tpl->tpl_vars['file']->value['id'];?>
" class="image">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['file']->value['path'];?>
<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
<?php if ($_smarty_tpl->tpl_vars['file']->value['extension']){?>.<?php echo $_smarty_tpl->tpl_vars['file']->value['extension'];?>
<?php }?>" target="_blank">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['file']->value['path'];?>
._thumb_<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
<?php if ($_smarty_tpl->tpl_vars['file']->value['extension']){?>.<?php echo $_smarty_tpl->tpl_vars['file']->value['extension'];?>
<?php }?>"/>
                                    </a>

                                    <div class="image_tools">
                                        <span class="handler_grid" title="Перетащите картирку для изменения порядка сортировки"></span>
                                        <div class="it_buttons">
                                            <a title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_button_edit_image');?>
" onclick="editImage('<?php echo $_smarty_tpl->tpl_vars['file']->value['id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['file']->value['path'];?>
', '<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
<?php if ($_smarty_tpl->tpl_vars['file']->value['extension']){?>.<?php echo $_smarty_tpl->tpl_vars['file']->value['extension'];?>
<?php }?>', '<?php echo smarty_modifier_filesize($_smarty_tpl->tpl_vars['file']->value['size']);?>
', '<?php echo $_smarty_tpl->tpl_vars['file']->value['width'];?>
 x <?php echo $_smarty_tpl->tpl_vars['file']->value['height'];?>
', '<?php echo smarty_modifier_date($_smarty_tpl->tpl_vars['file']->value['date'],"datetime");?>
');" href="javascript:void(0)" class="edit_button"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('common','edit');?>
</a>
                                            <a title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_button_delete_image');?>
" onclick="deleteImage('<?php echo $_smarty_tpl->tpl_vars['file']->value['id'];?>
', 'file_list_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
', false, '<?php echo $_smarty_tpl->tpl_vars['item']->value['thumbs'];?>
');" href="javascript:void(0)" class="del_button"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('common','delete');?>
</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="cl"></div>
                        </div>
                        <script type="text/javascript">
                            initUploadedPhoto('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
');
                        </script>
                        <?php }else{ ?>
                        <div class="gallery" id="file_list_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
                            <div class="cl"></div>
                        </div>
                        <?php }?>
                    </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='file'){?>
                    <?php $_smarty_tpl->tpl_vars["filelist"] = new Smarty_variable($_smarty_tpl->tpl_vars['main']->value->getFilesList(0,$_smarty_tpl->tpl_vars['item']->value['name'],$_smarty_tpl->tpl_vars['main']->value->dataset['params']['table'],$_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['id']), null, 0);?>

                    <div class="item_block">
                         <label class="label" for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
">
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>

                            <em>
                                <?php  $_smarty_tpl->tpl_vars['extension'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['extension']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['extensions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['extension']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['extension']->iteration=0;
 $_smarty_tpl->tpl_vars['extension']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['extension']->key => $_smarty_tpl->tpl_vars['extension']->value){
$_smarty_tpl->tpl_vars['extension']->_loop = true;
 $_smarty_tpl->tpl_vars['extension']->iteration++;
 $_smarty_tpl->tpl_vars['extension']->index++;
 $_smarty_tpl->tpl_vars['extension']->first = $_smarty_tpl->tpl_vars['extension']->index === 0;
 $_smarty_tpl->tpl_vars['extension']->last = $_smarty_tpl->tpl_vars['extension']->iteration === $_smarty_tpl->tpl_vars['extension']->total;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['extension']->first){?>(<?php }?><?php echo $_smarty_tpl->tpl_vars['extension']->value['value'];?>
<?php if (!$_smarty_tpl->tpl_vars['extension']->last){?>, <?php }else{ ?>)<?php }?>
                                <?php } ?>
                            </em>
                        </label>

                        <div class="cl"></div>

                        <div class="upload_tools" <?php if ($_smarty_tpl->tpl_vars['filelist']->value){?>style="display: none;"<?php }?>>
                            <div id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"></div>
                            <div class="cl"></div>

                            <script type="text/javascript">
                                createUploader(
                                    '<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
',
                                    '<?php echo $_smarty_tpl->tpl_vars['item']->value['folder'];?>
',
                                    '0',
                                    <?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['id'];?>
,
                                    '<?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['table'];?>
',
                                    [<?php  $_smarty_tpl->tpl_vars['extension'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['extension']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['extensions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['extension']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['extension']->iteration=0;
 $_smarty_tpl->tpl_vars['extension']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['extension']->key => $_smarty_tpl->tpl_vars['extension']->value){
$_smarty_tpl->tpl_vars['extension']->_loop = true;
 $_smarty_tpl->tpl_vars['extension']->iteration++;
 $_smarty_tpl->tpl_vars['extension']->index++;
 $_smarty_tpl->tpl_vars['extension']->first = $_smarty_tpl->tpl_vars['extension']->index === 0;
 $_smarty_tpl->tpl_vars['extension']->last = $_smarty_tpl->tpl_vars['extension']->iteration === $_smarty_tpl->tpl_vars['extension']->total;
?>'<?php echo $_smarty_tpl->tpl_vars['extension']->value['value'];?>
'<?php if (!$_smarty_tpl->tpl_vars['extension']->last){?>,<?php }?><?php } ?>],
                                    false
                                );
                            </script>
                        </div>

                        <?php if ($_smarty_tpl->tpl_vars['filelist']->value){?>
                        <div class="form_items_list_container white_holder related_list" id="file_list_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
                            <table cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <th width="1%"></th>
                                    <th width="60%"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','files_header_file');?>
</th>
                                    <th width="37%"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','files_header_date');?>
</th>
                                    <th width="1%"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','files_header_size');?>
</th>
                                    <th width="1%"></th>
                                </tr>
                                <?php  $_smarty_tpl->tpl_vars['file'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['file']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['filelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['file']->key => $_smarty_tpl->tpl_vars['file']->value){
$_smarty_tpl->tpl_vars['file']->_loop = true;
?>
                                <tr>
                                    <td width="1%">
                                        <a class="icon_action icon_file_instance" href="<?php echo $_smarty_tpl->tpl_vars['file']->value['path'];?>
<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
<?php if ($_smarty_tpl->tpl_vars['file']->value['extension']){?>.<?php echo $_smarty_tpl->tpl_vars['file']->value['extension'];?>
<?php }?>" target="_blank"></a>
                                    </td>
                                    <td>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['file']->value['path'];?>
<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
<?php if ($_smarty_tpl->tpl_vars['file']->value['extension']){?>.<?php echo $_smarty_tpl->tpl_vars['file']->value['extension'];?>
<?php }?>" target="_blank"><?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
</a>.<?php echo $_smarty_tpl->tpl_vars['file']->value['extension'];?>

                                    </td>
                                    <td width="1%" class="nowrap">
                                        <?php echo smarty_modifier_date($_smarty_tpl->tpl_vars['file']->value['date'],"datetime");?>

                                    </td>
                                    <td width="1%" class="nowrap">
                                        <?php echo smarty_modifier_filesize($_smarty_tpl->tpl_vars['file']->value['size']);?>

                                    </td>
                                    <td width="1%">
                                        <a title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_button_delete_file');?>
" onclick="deleteFile('<?php echo $_smarty_tpl->tpl_vars['file']->value['id'];?>
', $(this), 'file_list_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
');" href="javascript:void(0)" class="icon_action icon_delete_instance"></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <script type="text/javascript">
                            initUploadedTable('file_list_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
');
                        </script>
                        <?php }?>
                    </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='multifile'){?>
                    <?php $_smarty_tpl->tpl_vars["filelist"] = new Smarty_variable($_smarty_tpl->tpl_vars['main']->value->getFilesList(1,$_smarty_tpl->tpl_vars['item']->value['name'],$_smarty_tpl->tpl_vars['main']->value->dataset['params']['table'],$_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['id']), null, 0);?>

                    <div class="item_block">
                        <label class="label" for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
">
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>

                            <em>
                                <?php  $_smarty_tpl->tpl_vars['extension'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['extension']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['extensions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['extension']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['extension']->iteration=0;
 $_smarty_tpl->tpl_vars['extension']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['extension']->key => $_smarty_tpl->tpl_vars['extension']->value){
$_smarty_tpl->tpl_vars['extension']->_loop = true;
 $_smarty_tpl->tpl_vars['extension']->iteration++;
 $_smarty_tpl->tpl_vars['extension']->index++;
 $_smarty_tpl->tpl_vars['extension']->first = $_smarty_tpl->tpl_vars['extension']->index === 0;
 $_smarty_tpl->tpl_vars['extension']->last = $_smarty_tpl->tpl_vars['extension']->iteration === $_smarty_tpl->tpl_vars['extension']->total;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['extension']->first){?>(<?php }?><?php echo $_smarty_tpl->tpl_vars['extension']->value['value'];?>
<?php if (!$_smarty_tpl->tpl_vars['extension']->last){?>, <?php }else{ ?>)<?php }?>
                                <?php } ?>
                            </em>
                        </label>

                        <div class="cl"></div>

                        <div class="upload_tools">
                            <div id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"></div>
                            <div class="cl"></div>

                            <script type="text/javascript">
                                createUploader(
                                    '<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
',
                                    '<?php echo $_smarty_tpl->tpl_vars['item']->value['folder'];?>
',
                                    '1',
                                    <?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['id'];?>
,
                                    '<?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['table'];?>
',
                                    [<?php  $_smarty_tpl->tpl_vars['extension'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['extension']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['extensions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['extension']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['extension']->iteration=0;
 $_smarty_tpl->tpl_vars['extension']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['extension']->key => $_smarty_tpl->tpl_vars['extension']->value){
$_smarty_tpl->tpl_vars['extension']->_loop = true;
 $_smarty_tpl->tpl_vars['extension']->iteration++;
 $_smarty_tpl->tpl_vars['extension']->index++;
 $_smarty_tpl->tpl_vars['extension']->first = $_smarty_tpl->tpl_vars['extension']->index === 0;
 $_smarty_tpl->tpl_vars['extension']->last = $_smarty_tpl->tpl_vars['extension']->iteration === $_smarty_tpl->tpl_vars['extension']->total;
?>'<?php echo $_smarty_tpl->tpl_vars['extension']->value['value'];?>
'<?php if (!$_smarty_tpl->tpl_vars['extension']->last){?>,<?php }?><?php } ?>],
                                    true
                                );
                            </script>
                        </div>

                        <?php if ($_smarty_tpl->tpl_vars['filelist']->value){?>
                        <div class="form_items_list_container white_holder related_list" id="file_list_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
                            <table cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <th width="1%"></th>
                                    <th width="1%"></th>
                                    <th width="60%"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','files_header_file');?>
</th>
                                    <th width="35%"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','files_header_date');?>
</th>
                                    <th width="1%"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','files_header_size');?>
</th>
                                    <th width="1%"></th>
                                    <th width="1%"></th>
                                </tr>
                                <?php  $_smarty_tpl->tpl_vars['file'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['file']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['filelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['file']->key => $_smarty_tpl->tpl_vars['file']->value){
$_smarty_tpl->tpl_vars['file']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['file']->key;
?>
                                <tr id="file_row_<?php echo $_smarty_tpl->tpl_vars['file']->value['id'];?>
">
                                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</td>
                                    <td>
                                        <a class="icon_action icon_file_instance" href="<?php echo $_smarty_tpl->tpl_vars['file']->value['path'];?>
<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
<?php if ($_smarty_tpl->tpl_vars['file']->value['extension']){?>.<?php echo $_smarty_tpl->tpl_vars['file']->value['extension'];?>
<?php }?>"></a>
                                    </td>
                                    <td>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['file']->value['path'];?>
<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
<?php if ($_smarty_tpl->tpl_vars['file']->value['extension']){?>.<?php echo $_smarty_tpl->tpl_vars['file']->value['extension'];?>
<?php }?>" target="_blank"><?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
</a>.<?php echo $_smarty_tpl->tpl_vars['file']->value['extension'];?>

                                    </td>
                                    <td class="nowrap">
                                        <?php echo smarty_modifier_date($_smarty_tpl->tpl_vars['file']->value['date'],"datetime");?>

                                    </td>
                                    <td class="nowrap">
                                        <?php echo smarty_modifier_filesize($_smarty_tpl->tpl_vars['file']->value['size']);?>

                                    </td>
                                    <td>
                                        <a title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_button_edit_file');?>
" onclick="editFile('<?php echo $_smarty_tpl->tpl_vars['file']->value['id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['file']->value['path'];?>
', '<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
<?php if ($_smarty_tpl->tpl_vars['file']->value['extension']){?>.<?php echo $_smarty_tpl->tpl_vars['file']->value['extension'];?>
<?php }?>', '<?php echo smarty_modifier_filesize($_smarty_tpl->tpl_vars['file']->value['size']);?>
', '<?php echo smarty_modifier_date($_smarty_tpl->tpl_vars['file']->value['date'],"datetime");?>
')" href="javascript:void(0)" class="icon_action icon_edit_instance"></a>
                                    </td>
                                    <td>
                                        <a title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_button_delete_file');?>
" onclick="deleteFile('<?php echo $_smarty_tpl->tpl_vars['file']->value['id'];?>
', $(this), 'file_list_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
');" href="javascript:void(0)" class="icon_action icon_delete_instance"></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <script type="text/javascript">
                            initUploadedTable('file_list_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
');
                        </script>
                        <?php }?>
                    </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='map'){?>
                    <?php $_smarty_tpl->tpl_vars["markers"] = new Smarty_variable($_smarty_tpl->tpl_vars['sections']->value->getMarkers($_smarty_tpl->tpl_vars['item']->value['name']), null, 0);?>
                    <div class="item_block">
                        <label class="label" for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</label>
                        <input type="hidden" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['value'];?>
" />
                        <div class="white_holder map_holder">
                            <div class="map" id="map_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"></div>
                            <div class="map_tools">
                                <label>
                                    <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('gmaps','latitude');?>

                                    <input type="text" id="map_lat_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
                                </label>

                                <label>
                                    <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('gmaps','longitude');?>

                                    <input type="text" id="map_lng_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
                                </label>

                                <label>
                                    <?php echo $_smarty_tpl->tpl_vars['main']->value->getText('gmaps','zoom');?>

                                    <input type="text" id="map_zoom_<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
                                </label>

                                <input class="button" type="button" value="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('common','refresh');?>
" onclick="gmaps_edit.refreshData('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
')">

                                <div class="add_marker">
                                    <a class="dashed" href="javascript:void(0)" onclick="gmaps_edit.newMarker('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
', '<?php echo $_smarty_tpl->tpl_vars['main']->value->dataset['params']['item_params']['id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['main']->value->item_data['id'];?>
')"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('gmaps','add_marker');?>
</a>
                                </div>
                            </div>
                            <div class="cl"></div>

                            <script type="text/javascript">
                                gmaps_edit.init('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
');
                                <?php  $_smarty_tpl->tpl_vars['marker'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['marker']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['markers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['marker']->key => $_smarty_tpl->tpl_vars['marker']->value){
$_smarty_tpl->tpl_vars['marker']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['marker']->key;
?>
                                    gmaps_edit.addMarker('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
', '<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['marker']->value['data'][0];?>
', '<?php echo $_smarty_tpl->tpl_vars['marker']->value['data'][1];?>
', '<?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
', '<?php echo $_smarty_tpl->tpl_vars['marker']->value['id'];?>
');
                                <?php } ?>
                            </script>

                            <div class="related_list markers_list" rel="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" <?php if (!$_smarty_tpl->tpl_vars['markers']->value){?>style="display: none"<?php }?>>
                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="1%"></th>
                                            <th width="1%"></th>
                                            <th width="1%"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('gmaps','latitude');?>
</th>
                                            <th><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('gmaps','longitude');?>
</th>
                                            <th width="1%"></th>
                                            <th width="1%"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="marker_stack" rel="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
                                        <?php  $_smarty_tpl->tpl_vars['marker'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['marker']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['markers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['marker']->key => $_smarty_tpl->tpl_vars['marker']->value){
$_smarty_tpl->tpl_vars['marker']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['marker']->key;
?>
                                        <tr class="marker_row" rel="<?php echo $_smarty_tpl->tpl_vars['marker']->value['id'];?>
">
                                            <td align="center">
                                                <?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>

                                            </td>
                                            <td>
                                                <a class="icon_action icon_marker_instance" href="javascript:void(0)" onclick="gmaps_edit.focusMarker('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
', '<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
')"></a>
                                            </td>
                                            <td>
                                                <span class="marker_lat nowrap" rel="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['marker']->value['data'][0];?>
</span>
                                            </td>
                                            <td>
                                                <span class="marker_lng nowrap" rel="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['marker']->value['data'][1];?>
</span>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" class="icon_action icon_edit_instance" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('common','edit');?>
" onclick="gmaps_edit.editMarker('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
', '<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['marker']->value['id'];?>
')"></a>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" class="icon_action icon_delete_instance" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('common','delete');?>
" onclick="gmaps_edit.deleteMarker('<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
', '<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['marker']->value['id'];?>
')"></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='template_file'){?>
                <div class="item_block">
                    <label class="label" for="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['help'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</label>
                    <input class="text" type="text" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['value'], ENT_QUOTES, 'UTF-8', true);?>
" tabindex="<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
" />
                </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='hidden'){?>
                    <input type="hidden" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['value'];?>
" />
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='separator'){?>
                    <div id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" class="separator"><h3><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</h3></div>
                <?php }?>
            <?php }?>
        <?php } ?>

      	<div class="buttons">
          	<?php if (!$_smarty_tpl->tpl_vars['main']->value->dataset['params']['no_ok_button']){?>
            <input class="button" type="submit" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_button_append_title');?>
" name="ok" value="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_button_append_text');?>
" />
            <?php }?>
            <input class="button" type="submit" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_button_save_title');?>
" name="save" value="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('form','form_button_save_text');?>
" />
      	</div>
    </form>
</div><?php }} ?>