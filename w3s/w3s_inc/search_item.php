<?
	// Скрипту известна переменная-массив с именем $item
	// Формат массива:
	// $item=array (
	//	'url'		=> УРЛ страницы (без домена)
	//	'title'		=> Заголовок страницы
	//	'lastupdate'	=> Время последней индексации
	// );
	// Также определена переменная $w3s_query, которая содержит обработанный текст запроса
	// для последующей подсветки искомого текста в странице
?>

<div class="result">
 <a href="<?=STARTURL ?><?=$w3s_item['url'] ?><?=(strpos(' ' . $w3s_item['url'], '?'))?'&amp;':'?' ?>highlight=<?=$w3s_query ?>" target="_blank"><?=$w3s_item['title'] ?></a><br />
 <span class="quotes"><?=$w3s_item['text'] ?></span>
 <span class="date"><?=STARTURL . $w3s_item['url'] ?> &middot; <?
	// Старый вариант даты (раскомментируйте, если хотите использовать):
	// echo w3s_mdate($w3s_item['lastupdate'], 'd m Y');

	echo date('d.m.Y H:i', $w3s_item['lastupdate']);
 ?></span>
</div>