<?php

	class CSOGeneratePassword {
		private $password;
		 
		private function createRandomPassword() { 
	    	$chars = "abcdefghijkmnopqrstuvwxyz023456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
    		srand((double)microtime()*1000000); 
    		$i = 0; 
    		$pass = '' ; 

    		while ($i <= 7) { 
        	$num = rand() % 33; 
        	$tmp = substr($chars, $num, 1); 
        	$pass = $pass . $tmp; 
        	$i++; 
    		} 

    		return $pass; 
		}
		
		private function setPassword() {
			$this->$password = createRandomPassword();
		}
		
		public function getPassword() {
			return $this->password;
		}
	
?>