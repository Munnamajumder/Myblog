<?php 
$filepath = realpath(dirname(__FILE__));

include_ONCE ($filepath."/../lib/Database.php");
include_ONCE ($filepath."/../helpers/Format.php");


?>

<?php
class slogan{
	
	private $db;
	private $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
		
	}

	public function getAllSlogan(){
		
		
		 $query = "select * from title_slogan where id = '1'";
          $result = $this->db->select($query);
          return $result;



	}

	public function getSloganTitle(){
		$query = "select * from title_slogan where id = '1'";
				$slogan = $this->db->select($query); 
				return $slogan;
	}

	public function getSocialTitle(){
		$query = "select * from tbl_social where id = '1'";
				$social = $this->db->select($query);
				return $social;
	}

	public function getAllSocialId(){
		$query = "select * from tbl_social where id = '1'";
                $social = $this->db->select($query);
                return $social;
	}

	public function updateAllSocial($data){
		     $fb = $this->fm->validation($data['fb']);
                $tw = $this->fm->validation($data['tw']);
                $ln = $this->fm->validation($data['ln']);
                $gp = $this->fm->validation($data['gp']);
                $title = mysqli_real_escape_string($this->db->link,$fb);
                $cat = mysqli_real_escape_string($this->db->link,$tw);
                $cat = mysqli_real_escape_string($this->db->link,$ln);
                $cat = mysqli_real_escape_string($this->db->link,$gp);
                
                
                if($fb == "" || $tw == "" || $ln == "" ||$gp == "" ){
                    
                    echo "Field must not be empty";
                    
                    }else{
                    $query = "UPDATE tbl_social
                    SET
                    fb = '$fb',
                    tw = '$tw',
                    ln = '$ln',
                    gp = '$gp'
                   where id = '1'";
                    $updated_row = $this->db->update($query);
                    if ($updated_row) {
                        
                     $msg = "<span class='success'>Post updated Successfully.</span>";
                     return $msg;
                    }else {
                        
                     $msg = "<span class='error'>Post Not updated !</span>";
                      return $msg;
                    }
                    }
	}



}





?>

