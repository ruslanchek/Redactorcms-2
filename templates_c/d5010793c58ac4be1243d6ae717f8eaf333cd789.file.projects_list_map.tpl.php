<?php /* Smarty version Smarty 3.1.4, created on 2012-04-02 13:42:32
         compiled from "/var/www/fortyfour/data/www/digitalbakery.fortyfour.ru/templates/modules/projects_list_map.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13954624584f7974882f3058-18044731%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5010793c58ac4be1243d6ae717f8eaf333cd789' => 
    array (
      0 => '/var/www/fortyfour/data/www/digitalbakery.fortyfour.ru/templates/modules/projects_list_map.tpl',
      1 => 1333359519,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13954624584f7974882f3058-18044731',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'core' => 0,
    'item' => 0,
    'marker' => 0,
    'i' => 0,
    'city' => 0,
    'items' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_4f7974883ec42',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7974883ec42')) {function content_4f7974883ec42($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['core']->value->page['data']['list']['items']){?>
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>

    <div id="map"></div>

    <script>
        core.map.init({lat: 55.7, lng: 37.5, marker_icon: '/marker.php'});
    </script>

    <script>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->page['data']['list']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <?php $_smarty_tpl->tpl_vars['marker'] = new Smarty_variable($_smarty_tpl->tpl_vars['core']->value->getMapMarkers($_smarty_tpl->tpl_vars['item']->value['id']), null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['marker']->value['id']>0){?>
                core.map.addMarker({id: <?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
, lat: <?php echo $_smarty_tpl->tpl_vars['marker']->value['lat'];?>
, lng: <?php echo $_smarty_tpl->tpl_vars['marker']->value['lng'];?>
, title: '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
'});
            <?php }?>
        <?php } ?>
    </script>

    <?php  $_smarty_tpl->tpl_vars['city'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['city']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['core']->value->getCities(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['city']->key => $_smarty_tpl->tpl_vars['city']->value){
$_smarty_tpl->tpl_vars['city']->_loop = true;
?>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>

        <h1 class="uppercase"><?php echo $_smarty_tpl->tpl_vars['city']->value['city'];?>
</h1>

        <?php $_smarty_tpl->tpl_vars['items'] = new Smarty_variable($_smarty_tpl->tpl_vars['core']->value->projectsByCities($_smarty_tpl->tpl_vars['city']->value['city']), null, 0);?>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <div class="div_float_30"><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
. <a class="dashed" href="javascript:void(0)" onclick="core.map.clickMarker(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></div>
        <?php } ?>

        <?php if ($_smarty_tpl->tpl_vars['i']->value==3){?>
            <div class="clear"></div>
            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
        <?php }?>
        <div class="clear"></div>
        <br>
    <?php } ?>
<?php }?><?php }} ?>