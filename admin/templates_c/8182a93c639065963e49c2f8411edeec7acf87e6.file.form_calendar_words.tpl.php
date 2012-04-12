<?php /* Smarty version Smarty 3.1.4, created on 2012-03-24 10:00:32
         compiled from "/Users/ruslan/Documents/sites/pincher/admin/templates/system/scripts/form_calendar_words.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18951526694f6d71101df2d8-96477877%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8182a93c639065963e49c2f8411edeec7acf87e6' => 
    array (
      0 => '/Users/ruslan/Documents/sites/pincher/admin/templates/system/scripts/form_calendar_words.tpl',
      1 => 1332571839,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18951526694f6d71101df2d8-96477877',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f6d71103109f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f6d71103109f')) {function content_4f6d71103109f($_smarty_tpl) {?><script type="text/javascript">
	var date_names = {

		months_nominative_case: [
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','m_jan_nominative_case');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','m_feb_nominative_case');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','m_mar_nominative_case');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','m_apr_nominative_case');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','m_may_nominative_case');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','m_jun_nominative_case');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','m_jul_nominative_case');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','m_aug_nominative_case');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','m_sep_nominative_case');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','m_oct_nominative_case');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','m_nov_nominative_case');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','m_dec_nominative_case');?>
'
		],

		months_genitive_case: [
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','m_jan_genitive_case');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','m_feb_genitive_case');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','m_mar_genitive_case');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','m_apr_genitive_case');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','m_may_genitive_case');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','m_jun_genitive_case');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','m_jul_genitive_case');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','m_aug_genitive_case');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','m_sep_genitive_case');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','m_oct_genitive_case');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','m_nov_genitive_case');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','m_dec_genitive_case');?>
'
		],
	
		days: [
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','d_mon');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','d_tue');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','d_wed');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','d_thu');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','d_fri');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','d_sat');?>
',
			'<?php echo $_smarty_tpl->tpl_vars['main']->value->getText('calendar','d_sun');?>
'
		]
	
	};
</script><?php }} ?>