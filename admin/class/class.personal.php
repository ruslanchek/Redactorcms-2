<?php
	class Personal{
		public $table = 'users';
		public $item_mysql_fieldset = array(
			'id', 'login', 'name', 'email', 'ip', 'last', 'password'
		);
		
		function __construct(&$main, &$login){
			$this->main = $main;
			$this->login = $login;
		}
		
		//Check password
		public function checkPassword($password, $type = 'boolean'){
			$password = md5(md5(trim($password)));
            
			if($password == $this->main->item_data['password']){
			    if($type == 'string'){
			        return 'true';
			    }elseif($type == 'boolean'){
			        return true;
			    }
			}else{
                if($type == 'string'){
                    return 'false';
                }elseif($type == 'boolean'){
                    return false;
                }
			}
		}
		
		//Returns item data
		public function getItemData($id){
			$sql = mysql_query("SELECT ".$this->main->getMySqlFieldset($this->item_mysql_fieldset)." FROM ".$this->table." WHERE id = '".DB::quote($id)."'");
			$result = mysql_fetch_assoc($sql);
			$this->main->item_data = $result;
			return $result;
		}
		
		//Encode IP-adress
		public function encodeIp($ip){
			return long2ip($ip);
		}
		
		//Save new password
		public function changePassword($postdata){
			$old = DB::quote($postdata['old_password']);
			$new1 = DB::quote($postdata['new_password']);
			$new2 = DB::quote($postdata['new_password_again']);
			
			if($this->checkPassword($old)){
				if($new1 == $new2){
					$password = md5(md5(trim($new1))); 
					mysql_query("UPDATE users SET password = '".$password."' WHERE id = '".$this->main->item_data['id']."'");
					$this->main->form_error['condition'] = 1;
					$this->main->form_error['message'] = $this->main->getText('personal', 'save_result_password_ok');
				}else{
					$this->main->form_error['condition'] = 2;
					$this->main->form_error['message'] = $this->main->getText('personal', 'save_result_password_doesnt_mach');
				}
			}else{
				$this->main->form_error['condition'] = 2;
				$this->main->form_error['message'] = $this->main->getText('personal', 'save_result_password_invalid');
			};
		}
	};
?>