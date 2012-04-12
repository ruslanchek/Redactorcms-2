<?php
	function smarty_modifier_splitted($str, $index){
		$result = explode('::', $str);
        return $result[$index];
	};
?>