 <?php include 'inc/header.php';?>

 <?php
if(!isset($_GET['category']) || ($_GET['category'])== NULL){
	header("location:404.php");	
}else{
	$category = $_GET['category'];
}
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="samepost clear">
			<?php

			$getPostByCat = $cat->getPostDetailByCategory($category);
			
			if($getPostByCat){
				while($result = $getPostByCat->fetch_assoc() ){
		?>
	            <h2><a href=""><?php echo $result['title']; ?></a></h2>
				<h4><?php echo $fm->formatDate($result['date']); ?>, By <a href="#"><?php echo $result['author']; ?></a></h4>
				 <a href="#"><img src="admin/<?php echo $result['image']; ?>" alt="post image"/></a>
				<p>
					<?php echo $fm->textShorten($result['body']); ?>
				</p>

				


				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
				</div>
				<?php }} ?>

			
				




	</div>

		</div>
 <?php include 'inc/sidebar.php';?>

 <?php include 'inc/footer.php';?>