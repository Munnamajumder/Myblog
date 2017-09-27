 <?php include 'inc/header.php';?>

 <?php
if(!isset($_GET['id']) || ($_GET['id'])== NULL){
	header("location:404.php");	
}else{
	$id = $_GET['id'];
}
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
			<?php

			$getPostById = $post->getPostDetailById($id);
			
			if($getPostById){
				while($result = $getPostById->fetch_assoc() ){
		?>
	            <h2><?php echo $result['title'];?></h2>
				<h4><?php echo $fm->formatDate($result['date']);?>. By <a href="#"><?php echo $result['author'];?></a></h4>
				<img src="admin/<?php echo $result['image'];?>" alt="post image"/>
				<?php echo $result['body'];?>

			
				
				<div class="relatedpost clear">
					<h2>Related articles</h2>
<?php
				$catid = $result['cat'];
				$getPostByCatId = $post->getAllPostByCatId($catid);

				if ($getPostByCatId) {
					while ($result = $getPostByCatId->fetch_assoc()) {

			
					?>
					<a href="post.php?id=<?php echo $result['id'];?>"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>


					<?php }} ?>
				</div>



					<?php }} ?>
	</div>

		</div>
 <?php include 'inc/sidebar.php';?>

 <?php include 'inc/footer.php';?>