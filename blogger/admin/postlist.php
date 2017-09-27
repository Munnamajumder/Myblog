<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>



        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">No</th>
							<th width="10%">Post Title</th>
							<th width="20%">Description</th>
							<th width="10%">Category</th>
							<th width="10%">Image</th>
							<th width="10%">Author</th>
							<th width="10%">Tags</th>
							<th width="10%">Date</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$getPost = $post->getAllPost();
					
					if($getPost){
						$i=0;
						while($result=$getPost->fetch_assoc() ){
						$i++;	
				
					?>


						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><a href="editpost.php?eidtpostid=<?php echo $result['id']; ?>"><?php echo $result['title'];?></a></td>
							<td><?php echo $fm->textShorten($result['body'], 50);?></td>
							<td><?php echo $result['name'];?></td>
							<td><img src="<?php echo $result['image'];?>" height ="40px" width="60px" /></td>
							<td><?php echo $result['author'];?></td>
							<td><?php echo $result['tags'];?></td>
							<td><?php echo $fm->formatDate($result['date']);?></td>
							<td>
							<a href="editpost.php?eidtpostid=<?php echo $result['id']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete !!!');" href="deletepost.php?delpostid=<?php echo $result['id']; ?>">Delete</a>
							</td>
						</tr>
						


					</tbody>
					<?php }} ?>
				</table>
	
               </div>
            </div>
        </div>

      <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
			setSidebarHeight();


        });
    </script>
    
<?php include 'inc/footer.php';?>

