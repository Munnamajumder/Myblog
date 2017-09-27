<?php 
$filepath = realpath(dirname(__FILE__));

include_ONCE ($filepath."/../lib/Database.php");
include_ONCE ($filepath."/../helpers/Format.php");


?>

<?php
class category{
	
	private $db;
	private $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
		
	}

	public function getAllCategoryPost(){
	$query = "select * from tbl_category";
	$result = $this->db->select($query);
	return $result;
	}

	public function getPostDetailByCategory($category){
	$query = "select * from tbl_post where cat = $category";
	$result = $this->db->select($query);
	return $result;
}

// <-----admin----->

public function getAllCategory(){
	$query = "select * from tbl_category order by id desc";
	$result = $this->db->select($query);
	return $result;
}

public function addCategory($name){
	$name = mysqli_real_escape_string($this->db->link,$name);
                    
    if(empty($name)){
        $msg = "Field must not be empty !!";
        return $msg;
        
    }else{
        $query = "INSERT INTO tbl_category(name) VALUES('$name')";
        $addCategory = $this->db->insert($query);
    
    if($addCategory){
       $msg = "category inserted sussesfully";
        return $msg;
    }else{
        $msg = "category not inserted";
        return $msg;
    }
}
	

}

public function getCategoryById($id){
	$query = "select * from tbl_category WHERE id = '$id' ORDER BY id DESC";
	$result = $this->db->select($query);
	return $result;
}

public function updateCategoryById($name, $id){
		$name = mysqli_real_escape_string($this->db->link,$name);
					
					if(empty($name)){
						  $msg = "Field must not be empty !!";
                          return $msg;
						
					}else{
						$query = "UPDATE tbl_category
						SET
						name='$name'
						where id='$id'";
						$updated_row = $this->db->update($query);
					
					if($updated_row){
						$msg = "category updated sussesfully";
						return $msg;
						
					}else{
						$msg = "category not updated";
						return $msg;

					}

					}
}
}





?>

