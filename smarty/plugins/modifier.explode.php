<?php
	function smarty_modifier_explode($str, $delimiter){
		global $Language;

		return explode($delimiter, $str);
	};
?>