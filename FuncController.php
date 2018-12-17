<?php  
	session_start();
	require_once('PHP/DB.php');
	class FuncController{
		private $DataBase;
		
		function __construct(){
			$this->DataBase=new DB();
		}
		public function get_user_role(){
			if (isset($_SESSION['role'])) {
				return $_SESSION['role'];
			}else
				return "none";
		}
		public function sort(){
			$this->DataBase->connect_DB();
			$rows = array();
			$result = $this->DataBase->do_sql("SELECT * FROM users ORDER BY id DESC");
			while ($row = mysqli_fetch_assoc($result)){
    			$rows[] = $row;
			}
			$this->DataBase->disconnect_DB();
			return $rows;
		}
		public function getelementsdb(){
			$this->DataBase->connect_DB();
			$rows = array();
			$result = $this->DataBase->do_sql("SELECT * FROM users");
			while ($row = mysqli_fetch_assoc($result)){
    			$rows[] = $row;
			}
			$this->DataBase->disconnect_DB();
			return $rows;
		}
	}
	
if (($_POST['model']=='functional')&&($_POST['action']=='search')) {
    $fc=new FuncController();
    echo json_encode($fc->search($_POST['search']));
}

if (($_POST['model']=='functional')&&($_POST['action']=='get_user_role')) {
    $fc=new FuncController();
    echo $fc->get_user_role();
}

if (($_POST['model']=='functional')&&($_POST['action']=='sort')) {
    $fc=new FuncController();
    echo json_encode($fc->sort());
}
if (($_POST['model']=='functional')&&($_POST['action']=='getelementsdb')) {
    $fc=new FuncController();
    echo json_encode($fc->getelementsdb());
}
?>