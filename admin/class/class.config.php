<?php
	class Config{
        private
        $main;

        public function __construct($main){
            $this->main = $main;
            $this->main->module_mode = $_GET['suboption'];
        }

        public function saveParams(){
            foreach($_POST as $key => $value){
                foreach($this->main->constants as $key_i => $value_i){
                    foreach($value_i as $key_ii => $value_ii){
                        if($key == $key_ii){
                            $this->main->constants[$key_i][$key_ii][0] = urlencode($value);
                        };
                    };
                };
            };

            $file = $_SERVER['DOCUMENT_ROOT'].'/constants.ini';
            
            $tmp = '';
            foreach($this->main->constants as $section => $values){
                $tmp .= "[$section]\n";
                foreach($values as $key => $val){
                    if(is_array($val)){
                        foreach($val as $k => $v){
                            $tmp .= "{$key}[$k] = \"$v\"\n";
                        }
                    } else {
                        $tmp .= "$key = \"$val\"\n";
                    }
                }
                $tmp .= "\n";
            };

            file_put_contents($file, $tmp);

            unset($tmp);
        }
    };
?>