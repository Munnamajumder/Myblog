<?php include 'inc/header.php';?>
<?php include 'inc/slider.php';?>

<style>
	.pagination {
  display: block;
  margin-top: 10px;
  padding: 10px;
  text-align: center;
}
.pagination a {
  background: #e6af4b none repeat scroll 0 0;
  border: 1px solid #d49d39;
  border-radius: 5px;
  color: #F6F6F6;
  margin: 1px;
  padding: 10px;
  text-decoration: none;
  color: #F1F1F1;
  font-size: 15px;
}
.pagination a:hover{background: #ba831f none repeat scroll 0 0;color: #000;}
</style>

	

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="samepost clear">

					<?php
		$per_page = 3;
		if(isset($_GET['page'])){
			$page = $_GET['page'];
			
		}else{
			$page = 1;
		}
		$start_form = ($page-1)*$per_page;
		
		?>

		
	<?php
			$getpost = $post->getAllPostdetails($start_form, $per_page);
			if ($getpost) {
				while ($result = $getpost->fetch_assoc() ) {
			
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
				<?php }}else{ ?>
				<p>Post Not Available !!!</p>

				<?php } ?>



			


			</div>

							<!--pagination ---->
			
			<?php
			$query = "select * from tbl_post";
			$result = $db->select($query);
			$total_rows = mysqli_num_rows($result);
			$total_page = ceil($total_rows/$per_page);
			
			
			echo "<span class='pagination'><a href='index.php?page=1'>".'First page'."</a>";
			for($i=1;$i<=$total_page;$i++){
				echo "<a href='index.php?page=".$i."'>".$i."</a>";
			}
			
			
			echo "<a href='index.php?page=$total_page'>".'Last page'."</a></span>" 
			?>
			
			<!--pagination ---->
	

		</div>


    <?php include 'inc/sidebar.php';?>

    <script src="js/script.js" type="text/javascript"></script>
<script type="text/jquery.js" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/jquery.nivo.slider.js" src="js/nav.js"></script>



 	<?php include 'inc/footer.php';?>