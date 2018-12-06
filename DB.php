<?php
class DB{
		private $dbhost;
		private $dbuser;
		private $dbpwd;
		private $dbname;
		private $connect;
		function __construct(){
			$this->dbhost='localhost';
			$this->dbuser='root';
			$this->dbpwd='';
			$this->dbname='Laba2';
			$this->connect;
		}
		function do_sql($sql){
			return mysqli_query($this->connect,$sql);
		}
		function connect_DB(){
			$this->connect=mysqli_connect($this->dbhost,$this->dbuser,$this->dbpwd,$this->dbname);
		}
		function disconnect_DB(){
			mysqli_close($this->connect);
			$con=NULL;
		}
		public function get_connect(){
			return $this->connect;
		}
	}
	?>