<?php /* Smarty version Smarty 3.1.4, created on 2012-04-06 13:26:09
         compiled from "/var/www/fortyfour/data/www/digitalbakery.fortyfour.ru/templates/modules/news_item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3635992084f7eb6b1aa6841-22717493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd38f465a13315c5fe4f500c6be89b215a7ad69c4' => 
    array (
      0 => '/var/www/fortyfour/data/www/digitalbakery.fortyfour.ru/templates/modules/news_item.tpl',
      1 => 1333555939,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3635992084f7eb6b1aa6841-22717493',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f7eb6b1b5f66',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7eb6b1b5f66')) {function content_4f7eb6b1b5f66($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date')) include '/var/www/fortyfour/data/www/digitalbakery.fortyfour.ru/smarty/plugins/modifier.date.php';
?><h1 class="uppercase"><?php echo smarty_modifier_date($_smarty_tpl->tpl_vars['core']->value->page['data']['date'],"date");?>
 &mdash; <?php echo $_smarty_tpl->tpl_vars['core']->value->page['data']['name'];?>
</h1>

<?php echo $_smarty_tpl->tpl_vars['core']->value->page['data']['text'];?>


<br>

<!-- AddThis Button BEGIN -->
<style>
    .addthis_button_facebook_like iframe { width: 100px !important; margin-right: 10px; }
</style>
<div class="addthis_toolbox addthis_default_style ">
<a style="margin-right: 20px; width:100px" class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f4753b40e2098a5"></script>
<!-- AddThis Button END -->


<div id="disqus_thread"></div>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'digitalbakery'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script><?php }} ?>