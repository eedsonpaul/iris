<?php
	class cat {
		public $name;
		public $age;
		public $furcolor;
		public $gender;
		public $weight;
		function cat($name,$age,$furcolor,$gender,$height,$weight)
		{
			$this->name = $name;
			$this->age = $age;
			$this->furcolor = $furcolor; 
			$this->gender = $gender;
			$this->height = $height;
			$this->weight = $weight;
		}
	}
	
	echo time()."<br>";
	echo date('Y-m-d',time())."<br>";
	echo strtotime('1999-2-2')."<br>";
	echo $_POST['w'];
	//echo date(time());
?>