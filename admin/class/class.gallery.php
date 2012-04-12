<?php
	class Gallery{		
		//returns pictures array
		function getPictures($count, $parent_id, $multiple, $table_type){
			if($multiple == '1'){
				 $table = "galleries";
			}else{
				 $table = "pictures";
			};
			
			if($count > 0){
				$limit = "LIMIT 0, 3";
			};
			
			if($from_country_id != '0'){
				 $from_country_id = "(parent_id = '".$parent_id."') && ";
			}else{
				 $from_country_id = "";
			};
			
			$query = "SELECT * FROM ".$table." WHERE ".$from_country_id."(table_type = '".$table_type."') ORDER BY id DESC ".$limit;
			$sql = mysql_query($query);

			while($req = mysql_fetch_assoc($sql)){
				$rows[] = $req;
			};

			return $rows;
		}
    
		//returns one picture from related item
		function getPicture($parent_id, $multiple = 0, $table_type){
			if($multiple == 1){
				 $table = "galleries";
			}else{
				 $table = "pictures";
			};
			
      		$query = "SELECT * FROM ".$table." WHERE (parent_id = '".DB::quote($parent_id)."') && (table_type = '".DB::quote($table_type)."')";
      		$sql = mysql_query($query);
      
			while($req = mysql_fetch_assoc($sql)){
				$rows = $req;
    		};
    		return $rows;
    	}
	};
?>