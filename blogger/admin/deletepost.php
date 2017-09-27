<?php
include "../lib/session.php";
Session::checkSession();
?>

<?php

include "../helpers/format.php";
include "../config/config.php";
include "../lib/Database.php";


?>

<?php
$db = new Database();
$fm = new format();

?>
<?php
if(!isset($_GET['delpostid']) || $_GET['delpostid']==NULL){
    header("location:postlist.php");
}else{
    $postid=$_GET['delpostid'];
    $query = "select * from tbl_post where id = '$postid'";
    $getdata =$db->select($query);
    if($getdata){
    	while ($delimg=$getdata->fetch_assoc()) {
    		$dellink = $delimg['image'];
    		unlink($dellink);
    	}

    }


    $delquery = "delete  from tbl_post where id = '$postid'";

    $delData = $db->delete($delquery);
    if ($delData) {
    	echo "<script>alert('Data deleted sucessfully.');</script>";
    	echo "<script>window.location='postlist.php';</script>";
    	}else{

    	echo "<script>alert('Data not deleted sucessfully.');</script>";
    	echo "<script>window.location='postlist.php';</script>";

    	}
    }

?>