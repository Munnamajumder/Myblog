<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>

                	<?php
				if(isset($_GET['delcat'])){
					$delid = $_GET['delcat'];
					$delquery = "DELETE FROM tbl_category WHERE id='$delid'";
					$deldat=$db->delete($delquery);
					if($deldat){
						echo "category Deleted sussesfully";
						
					}else{
						echo "category not Deleted";
					}
					
					
				}
				
				?>

                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$getCatList = $cat->getAllCategory();

					if ($getCatList) {
						$i = 0;
						while ($result =$getCatList->fetch_assoc()) {
						$i++;	
					

					?>
					<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result ['name'];?></td>
							<td><a href="editcat.php?catid=<?php echo $result['id'];?>">Edit</a> || <a onclick="return confirm('Are you sure to delete !!!');"href="?delcat=<?php echo $result['id'];?>">Delete</a></td>
						</tr>

						<?php }} ?>
						
						
					</tbody>
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
