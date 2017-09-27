<?php 
$filepath = realpath(dirname(__FILE__));

include_ONCE ($filepath."/../lib/Database.php");
include_ONCE ($filepath."/../helpers/Format.php");


?>

<?php
class Post{
	
	private $db;
	private $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
		
	}

public function getAllPostdetails($start_form, $per_page){
		$query = "SELECT * FROM tbl_post limit $start_form, $per_page";
	$result = $this->db->select($query);
	return $result;
}	

public function getPostDetailById($id){
	$query = "select * from tbl_post where id = $id";
	$result = $this->db->select($query);
	return $result;
}

public function getAllPostByCatId($catid){
		$query = "select * from tbl_post where cat = '$catid' order by rand() limit 6";
		$result = $this->db->select($query);
		return $result;
}

public function getAllLatestPost(){
	$query = "select * from tbl_post LIMIT 5 ";
	$result = $this->db->select($query);
	return $result;

}

public function getPostDetailBySearch($search){
	$query = "SELECT * FROM tbl_post where title LIKE '%$search%' or  body LIKE '%$search%' ";
	$result = $this->db->select($query);
	return $result;

}

public function insertAllPost($data, $files){
	$title = mysqli_real_escape_string($this->db->link,$data['title']);
	$cat = mysqli_real_escape_string($this->db->link,$data['cat']);
	$body = mysqli_real_escape_string($this->db->link,$data['body']);
	$tags = mysqli_real_escape_string($this->db->link,$data['tags']);
	$author = mysqli_real_escape_string($this->db->link,$data['author']);
	
	$permited  = array('jpg', 'jpeg', 'png', 'gif');
	$file_name = $files['image']['name'];
	$file_size = $files['image']['size'];
	$file_temp = $files['image']['tmp_name'];

	$div = explode('.', $file_name);
	$file_ext = strtolower(end($div));
	$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	$uploaded_image = "uploads/".$unique_image;

	if($title == "" || $cat == "" || $body == "" || $tags == "" || $author == "" || $file_name == ""){
					
			$msg = "Field must not be empty";
			return $msg;
	}elseif ($file_size >1048567){
			 echo "<span class='error'>Image Size should be less then 1MB!</span>";
			} elseif (in_array($file_ext, $permited) === false){
			 echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
			} else{
			move_uploaded_file($file_temp, $uploaded_image);	
			
	$query = "INSERT INTO tbl_post(cat, title, body, image, author, tags) VALUES('$cat', '$title', '$body', '$uploaded_image', '$author', '$tags')";
			$inserted_rows = $this->db->insert($query);	
			if ($inserted_rows) {
						
					 $msg = "<span class='success'>Post Inserted Successfully.</span>";
					 return $msg;
					}else {
						
					 $msg = "<span class='error'>Post Not Inserted !</span>";
					 return $msg;
					}
}


}

	public function getAllPost(){
	        $query = "SELECT tbl_post.*,tbl_category.name FROM tbl_post
				INNER JOIN tbl_category
				ON tbl_post.cat = tbl_category.id
				ORDER by tbl_post.title DESC";
				$result = $this->db->select($query);
			return $result;
	}

	public function getAllPostById($editpostid){
		 $query="SELECT * FROM tbl_post WHERE id='$editpostid' order by id desc";
		  $result = $this->db->select($query);
		  return $result;
	}

	public function updatePostById($data, $files, $editpostid){

	$title = mysqli_real_escape_string($this->db->link,$data['title']);
	$cat = mysqli_real_escape_string($this->db->link,$data['cat']);
	$body = mysqli_real_escape_string($this->db->link,$data['body']);
	$tags = mysqli_real_escape_string($this->db->link,$data['tags']);
	$author = mysqli_real_escape_string($this->db->link,$data['author']);
	
	$permited  = array('jpg', 'jpeg', 'png', 'gif');
	$file_name = $files['image']['name'];
	$file_size = $files['image']['size'];
	$file_temp = $files['image']['tmp_name'];

	$div = explode('.', $file_name);
	$file_ext = strtolower(end($div));
	$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	$uploaded_image = "uploads/".$unique_image;

	if($title == "" || $cat == "" || $body == "" || $tags == "" || $author == "" || $file_name == ""){
					
			$msg = "Field must not be empty";
			return $msg;
		}else{
                    if (!empty($file_name)) {
                    
                    if ($file_size >1048567){
					 echo "<span class='error'>Image Size should be less then 1MB!</span>";
					} elseif (in_array($file_ext, $permited) === false){
					 echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
					} else{

					move_uploaded_file($file_temp, $uploaded_image);
                    $query = "UPDATE tbl_post
                    SET
                    cat = '$cat',
                    title = '$title',
                    body = '$body',
                    image = '$uploaded_image',
                    author = '$author',
                    tags = '$tags'
                   where id = $editpostid";
					$updated_row = $this->db->update($query);
					if ($updated_row) {
						
					 $msg = "<span class='success'>Post updated Successfully.</span>";
					 return $msg;
					}else {
						
					 $msg = "<span class='error'>Post Not updated !</span>";
					 return $msg;
					}
					}


                }else{

                    $query = "UPDATE tbl_post
                    SET
                    cat = '$cat',
                    title = '$title',
                    body = '$body',
                    author = '$author',
                    tags = '$tags'
                   where id = $editpostid ";
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
}
	?>