<?
	// ������� �������� ����������-������ � ������ $item
	// ������ �������:
	// $item=array (
	//	'url'		=> ��� �������� (��� ������)
	//	'title'		=> ��������� ��������
	//	'lastupdate'	=> ����� ��������� ����������
	// );
	// ����� ���������� ���������� $w3s_query, ������� �������� ������������ ����� �������
	// ��� ����������� ��������� �������� ������ � ��������
?>

<div class="result">
 <a href="<?=STARTURL ?><?=$w3s_item['url'] ?><?=(strpos(' ' . $w3s_item['url'], '?'))?'&amp;':'?' ?>highlight=<?=$w3s_query ?>" target="_blank"><?=$w3s_item['title'] ?></a><br />
 <span class="quotes"><?=$w3s_item['text'] ?></span>
 <span class="date"><?=STARTURL . $w3s_item['url'] ?> &middot; <?
	// ������ ������� ���� (����������������, ���� ������ ������������):
	// echo w3s_mdate($w3s_item['lastupdate'], 'd m Y');

	echo date('d.m.Y H:i', $w3s_item['lastupdate']);
 ?></span>
</div>