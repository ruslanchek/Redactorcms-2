<?php /* Smarty version Smarty 3.1.4, created on 2012-03-26 15:31:22
         compiled from "/Users/ruslan/Documents/sites/pincher/admin/templates/modules/sections.edit_fields.tools.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13812280414f70538add4b71-27640400%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cbe17cfcf23587b2ba7438d3716520361c016621' => 
    array (
      0 => '/Users/ruslan/Documents/sites/pincher/admin/templates/modules/sections.edit_fields.tools.tpl',
      1 => 1332571837,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13812280414f70538add4b71-27640400',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f70538b0ee3d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f70538b0ee3d')) {function content_4f70538b0ee3d($_smarty_tpl) {?><div class="right_block">
    <h2><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_edit_tools_header');?>
</h2>

    <ul class="toolbox">
        <li rel="checkbox" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_checkbox_help');?>
">
            <img class="form_tools_icons form_tools_icons_switch" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_checkbox');?>
" />
            <span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_checkbox');?>
</span>
        </li>
        <li rel="textfield" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_textfield_help');?>
">
            <img class="form_tools_icons form_tools_icons_textfield" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_textfield');?>
" />
            <span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_textfield');?>
</span>
        </li>
        <li rel="textarea" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_textarea_help');?>
">
            <img class="form_tools_icons form_tools_icons_text_area" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_textarea');?>
" />
            <span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_textarea');?>
</span>
        </li>
        <li rel="param" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_param_help');?>
">
            <img class="form_tools_icons form_tools_icons_param" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_param');?>
" />
            <span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_param');?>
</span>
        </li>
        <li rel="tags" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_tags_help');?>
">
            <img class="form_tools_icons form_tools_icons_tags" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_tags');?>
" />
            <span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_tags');?>
</span>
        </li>
        <li rel="url" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_textfield_url_help');?>
">
            <img class="form_tools_icons form_tools_icons_url" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_textfield_url');?>
" />
            <span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_textfield_url');?>
</span>
        </li>
        <li rel="slider" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_slider_help');?>
">
            <img class="form_tools_icons form_tools_icons_slider" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_slider');?>
" />
            <span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_slider');?>
</span>
        </li>
        <li rel="select" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_select_help');?>
">
            <img class="form_tools_icons form_tools_icons_select" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_select');?>
" />
            <span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_select');?>
</span>
        </li>
        <li rel="multiselect" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_multiselect_help');?>
">
            <img class="form_tools_icons form_tools_icons_multiselect" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_multiselect');?>
" />
            <span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_multiselect');?>
</span>
        </li>
        <li rel="color_picker" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_color_picker_help');?>
">
            <img class="form_tools_icons form_tools_icons_color_picker" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_color_picker');?>
" />
            <span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_color_picker');?>
</span>
        </li>
        <li rel="calendar" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_calendar_help');?>
">
            <img class="form_tools_icons form_tools_icons_calendar" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_calendar');?>
" />
            <span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_calendar');?>
</span>
        </li>
        <li rel="image" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_image_help');?>
">
            <img class="form_tools_icons form_tools_icons_image" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_image');?>
" />
            <span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_image');?>
</span>
        </li>
        <li rel="gallery" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_gallery_help');?>
">
            <img class="form_tools_icons form_tools_icons_gallery" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_gallery');?>
" />
            <span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_gallery');?>
</span>
        </li>
        <li rel="file" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_file_help');?>
">
            <img class="form_tools_icons form_tools_icons_file" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_file');?>
" />
            <span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_file');?>
</span>
        </li>
        <li rel="multifile" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_multifile_help');?>
">
            <img class="form_tools_icons form_tools_icons_multifile" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_multifile');?>
" />
            <span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_multifile');?>
</span>
        </li>
        <li rel="map" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_map_help');?>
">
            <img class="form_tools_icons form_tools_icons_map" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_map_help');?>
" />
            <span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_map');?>
</span>
        </li>
        <li rel="splitter" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_splitter_help');?>
">
            <img class="form_tools_icons form_tools_icons_splitter" src="/admin/img/frames/e.gif" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_splitter');?>
" />
            <span class="fielditem_name"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_editor_tools_splitter');?>
</span>
        </li>
    </ul>
</div>

<div class="right_block">
    <h2><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_edit_utilities_header');?>
</h2>
    <div class="inner">
        <a href="javascript:void(0)" onclick="sql_preview.show('<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_edit_utilities_sql_show');?>
', '<?php echo $_smarty_tpl->tpl_vars['main']->value->item_data['id'];?>
')" class="dashed" title="<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_edit_utilities_sql_show_title');?>
"><?php echo $_smarty_tpl->tpl_vars['main']->value->getText('sections','form_edit_utilities_sql_show');?>
</a>
    </div>
</div><?php }} ?>