<?php
	/**
	* Modufier "filesize": string => RGB_color_hex
	*
    * @param size $integer
	* @return string
	*/

	function smarty_modifier_filesize($size){
		global $Language;

		if(!$size){
            trigger_error('Modifier filesize: no data int given!');
			return '';
		}else{
            $metrics[0] = 'B';
            $metrics[1] = 'KB';
            $metrics[2] = 'MB';
            $metrics[3] = 'GB';
            $metrics[4] = 'TB';
            $metric = 0;

            while(floor($size/1024) > 0){
                ++$metric;
                $size /= 1024;
            };

            $ret = round($size,1)." ".(isset($metrics[$metric])?$metrics[$metric]:'??');

            return $ret;
        };
	};
?>