<?php
    class Modules{
        private $option;
		
		function __construct($modules_array){
			$this->modules = $modules_array;
		}

		//Check access to the module
        private function moduleAccess($mCode){
            global $cg_p;
            foreach ($cg_p as $item){
                if($item == $mCode){
                    return true;
                };
            };
        }

		//Find the module
        private function findModule($mName){
        	$name_ok = false;
        	
            $mNameArr = explode(";", $mName);
                            
            foreach($mNameArr as $item){
                if($item == $this->option){
                    $name_ok = true;
                };
            };

            if($name_ok){
                return true;
            };
        }

		//Get the module
        private function getModule(){
			foreach($this->modules as $item){
				if($this->findModule($item[0])){
					return $item;
				};
			}
        }

		//Show the module
        public function showModule($option){
            $this->option = $option;
            return ($this->getModule($option));
        }
    };
?>