<?php
	/**
	* Modufier "date": unix_timestamp, date, datetime => human language date
	*
	* @param string $string
	* @param string $format — 'date', 'time', 'datetime'
	* @return string
	*/

	function smarty_modifier_date($string, $format = 'datetime'){
		global $Language;

		$Language['global']['date_format']		    =	'%d %B, %Y';
		$Language['global']['time_format']		    =	'%H:%M';
		$Language['global']['datetime_format']	    =	'%d %B, %Y, %H:%M';
        $Language['global']['datetimefull_format']	=	'%d %B, %Y, %H:%M:%S';

		$Language['Month'] = array(
			'1'		=>	'января',
			'2'		=>	'февраля',
			'3'		=>	'марта',
			'4'		=>	'апреля',
			'5'		=>	'мая',
			'6'		=>	'июня',
			'7'		=>	'июля',
			'8'		=>	'августа',
			'9'		=>	'сентября',
			'10'	=>	'октября',
			'11'	=>	'ноября',
			'12'	=>	'декабря'
		);

		if(!isset($Language['global'][$format.'_format'])){
			trigger_error('Modifier date: invalid format specified!');
			return '';
		};

		$format = $Language['global'][$format.'_format'];
			if(!is_numeric($string)){
				
			//Try to read date or datetime
			$timestamp = strtotime($string);
			if($timestamp!==FALSE && $timestamp!=-1 /* PHP < 5.1 */){
				$string = $timestamp;
			};
		};

		//it is an UNIX-timestamp?
		if(is_numeric($string)){
			
			//Month in human language
			$format = str_replace('%B', $Language['Month'][date('n', $string)], $format);
			$format = str_replace('%d', date('j', $string), $format);
			return strftime($format, $string);
		};

		//Still no return yet? - Error!
		trigger_error('Invalid data for date modifier!');
		
		return '';
	};
?>