<?php 
$filepath = realpath(dirname(__FILE__));
include_ONCE ($filepath."/../lib/Session.php");
Session::checkLogin();

include_ONCE ($filepath."/../lib/Database.php");
include_ONCE ($filepath."/../helpers/Format.php");

?>

<?php
class userlogin{
	
	private $db;
	private $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
		
	}

	public function userLogin($username, $password){
		$username = mysqli_real_escape_string($this->db->link,$username);
		$password = mysqli_real_escape_string($this->db->link,$password);
				
		$query = "select * from tbl_user where username = '$username' and password = '$password'";
			$result = $this->db->select($query);
				if($result != false){
				$value = mysqli_fetch_array($result);
				$row = mysqli_num_rows($result);
				if($row > 0){
					session::set('login',true);
					session::set('username',$value['username']);
					session::set('userId',$value['id']);
					header("location:index.php");
					
						}else{
							echo "No result founnd !!!";
							}
				}else{
			
					echo "username and password doesn't match !!!";
					}
	}



}



	?>