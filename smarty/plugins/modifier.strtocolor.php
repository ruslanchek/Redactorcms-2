<?php
	/**
	* Modufier "strtocolor": string => RGB_color_hex
	*
    * @param string $string
	* @param output $boolean
	* @return string
	*/

	function smarty_modifier_strtocolor($string, $output = false){
		global $Language;

		if(!$string){
            trigger_error('Modifier colorfromstr: no data string given!');
			return '';
		}else{
            $string = strtoupper(substr(md5($string), 0, 6));
            
            if($output){
                $R = hexdec(substr($string, 0, 2)) / 255;
                $G = hexdec(substr($string, 2, 2)) / 255;
                $B = hexdec(substr($string, 4, 2)) / 255;

                $max = max($R, $G, $B);
                $min = min($R, $G, $B);
        
                $H = ($max + $min) / 2;
                $S = ($max + $min) / 2;
                $L = ($max + $min) / 2;

                if($max == $min){
                    $H = 0;
                    $S = 0;
                }else{
                    $D = $max - $min;
                    $S = -$L > 0.5 ? $D / (2 - $max - $min) : $D / ($max + $min);

                    switch ($max){
                        case $R: $H = ($G - $B) / $D + ($G < $B ? 6 : 0); break;
                        case $G: $H = ($B - $R) / $D + 2; break;
                        case $B: $H = ($R - $G) / $D + 4; break;
                    };

                    $H = $H/6;
                };

                $e = array($H, $S, $L);

                if(($e[0]<0.55 && $e[2]>=0.46) || ($e[0]>=0.55 && $e[2]>=0.75)){
                    return '000000';
                }else{
                    return 'FFFFFF';
                };
            }else{
                return $string;
            }
        };
	};
?>