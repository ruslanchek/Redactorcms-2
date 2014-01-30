<?
//Module classes
require($_SERVER['DOCUMENT_ROOT'].'/admin/class/class.search.php');
$module = new Search($main);

$main->title = 'Поиск';
$main->h1 = 'Поиск';

array_push(
    $main->addition_js,
    '/admin/js/search.js'
);

$smarty->assign('index_count', $module->index_count);