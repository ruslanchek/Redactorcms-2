<?php
	class Login{
		public $active = false;
		public $userdata;
        public $error;
		
		function __construct(&$main){
			$this->main = $main;
			$this->check();
			$this->userdata['ip_conv'] = long2ip($this->userdata['ip']);
		}
		
		//Generate random string
		private function generateCode($length = 6) {
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789"; 
			$code = ""; 
			$clen = strlen($chars) - 1;   
			while (strlen($code) < $length) { 
				$code .= $chars[mt_rand(0, $clen)];   
			} 
			return $code; 
		}
		
		//Write last user's action time
		private function setActivity(){
			mysql_query("
			    UPDATE `users`
			    SET `activity` = '".date('Y-m-d H:i:s')."'
			    WHERE `id` = ".intval($this->userdata['id'])
            );
		}
						
		//Accept form data
		public function login(){
            $login = DB::quote($_POST['auth_login']);
            $password = DB::quote($_POST['auth_password']);

			$query = "
			    SELECT
			        `id`,
			        `password`,
			        `ip`,
			        `activity`
			    FROM
			        `users`
			    WHERE
			        `login` = '".DB::quote($login)."' &&
			        `publish` = 1
			    LIMIT 1
			";

            $sql = mysql_query($query);

			$data = mysql_fetch_assoc($sql);
			 
			//Check passwords
			if($data['password'] === md5(md5($password))){ 
				//Generate and encode random number
				$hash = md5($this->generateCode(10)); 
					 
				if(long2ip($data['ip']) === "0.0.0.0" || long2ip($data['ip']) === $_SERVER['REMOTE_ADDR']){	 
					if(isset($_POST['auth_attach_ip'])){
						//IP attaching
						$insip = ", `ip` = INET_ATON('".DB::quote($_SERVER['REMOTE_ADDR'])."')";
					}else{
						$insip = ", `ip` = '0'";
					};
				};
					
				//Save new autorisation hash and IP to the DB
				mysql_query("
				    UPDATE
				        `users`
				    SET
				        `hash` = '".$hash."' ".$insip.",
				        `last` = '".date('Y-m-d H:i:s')."'
				    WHERE
				        `id` = ".intval($data['id'])
                );
				 
				//Set cookies
				setcookie("id", $data['id'], time()+$this->main->config['session_time'], "/admin"); 
				setcookie("hash", $hash, time()+$this->main->config['session_time'], "/admin"); 
								 
				//Go to check script
				header("Location: /admin");
			}else{ 
				$this->error = $this->main->getText('login', 'wrong_login_data');  
			};
		}
		
		//Check login data
		private function check(){
			if(isset($_COOKIE['id']) and isset($_COOKIE['hash'])){    
				$query = mysql_query("
				    SELECT
				        *
				    FROM
				        `users`
				    WHERE
				        `id` = ".intval($_COOKIE['id'])." &&
				        `publish` = 1
				    LIMIT 1
				");
                
				$userdata = mysql_fetch_assoc($query); 
				
				$this->userdata = $userdata;
					
				if(($userdata['hash'] !== $_COOKIE['hash']) or ($userdata['id'] !== $_COOKIE['id'])){
					setcookie("id", "", time() - 3600*24*30*12, "/admin"); 
					setcookie("hash", "", time() - 3600*24*30*12, "/admin");

					$this->active = false;

				}elseif(
                    (long2ip($userdata['ip']) !== $_SERVER['REMOTE_ADDR']) and
                    (long2ip($userdata['ip']) !== "0.0.0.0")
                ){
					$interval = Utilities::datetimeToSeconds(date('Y-m-d H:i:s')) - Utilities::datetimeToSeconds($userdata['activity']);

					if($interval > $this->main->config['session_time']){
						mysql_query("
						    UPDATE `users`
						    SET `ip` = 0
						    WHERE `id` = ".intval($this->userdata['id'])
                        );
						$this->active = true;
					}else{
						setcookie("id", "", time() - 3600*24*30*12, "/admin"); 
						setcookie("hash", "", time() - 3600*24*30*12, "/admin");
						
						$this->error = $this->main->getText('login', 'wrong_ip_adress'); 
						$this->active = false;
					};
				}else{ 
					setcookie("id", $_COOKIE['id'], time()+$this->main->config['session_time'], "/admin"); 
					setcookie("hash", $_COOKIE['hash'], time()+$this->main->config['session_time'], "/admin");

					$this->setActivity();
					$this->active = true;
				};

			}else{
				$this->active = false; //Cookies disabled
			};
		}
		
		//Exit
		public function exitUser(){
			setcookie("id", "", time() - 3600*24*30*12, "/admin"); 
			setcookie("hash", "", time() - 3600*24*30*12, "/admin");

            mysql_query("
			    UPDATE `users`
			    SET `ip` = ''
			    WHERE `id` = '".$this->userdata['id']."'
			");

			header("Location: /admin");
		}

	};
?>