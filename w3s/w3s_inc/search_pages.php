<?
	// ���� ������ ������ ������� ������ ������� �����������
	// ���� ���������� $result['count'], ���������� ����������
	// ����������� � ��������� RESULTS_PER_PAGE, ������������
	// ���������� ����������� �� ��������

	// $w3s_page++;
?>
<div class="pages">
 ��������: <?
	$w3s_pages_count=round($result['count']/RESULTS_PER_PAGE);
	if (!$w3s_pages_count) $w3s_pages_count=1;
	if ($w3s_pages_count>10) $w3s_pages_count=10;
	for ($w3s_i=1; $w3s_i<=$w3s_pages_count; $w3s_i++) {
		if ($w3s_i-1==$w3s_page) echo '<b>' . $w3s_i . '</b> ';
		else echo '<a href="search-results.php?cache=' . $_GET['cache'] . '&amp;page=' . ($w3s_i-1) . '">' . $w3s_i . '</a> ';
	}
?>

</div>