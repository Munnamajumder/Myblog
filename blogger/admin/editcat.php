<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
if(!isset($_GET['catid']) || $_GET['catid']==NULL){
    header("location:catlist.php");
}else{
    $id=$_GET['catid'];
}

?>


        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Category</h2>
                               
               <div class="block copyblock"> 


               <?php
               
               if($_SERVER['REQUEST_METHOD'] =='POST'){
                    $name = $_POST['name'];

                    $updateCatById = $cat->updateCategoryById($name, $id);

                }
               
               ?>


                <?php
                if (isset($updateCatById)) {
                    echo "$updateCatById";
                }

                ?>

                <?php
                    $getCatById = $cat->getCategoryById($id);

                    if ($getCatById) {      
                        while ($result =$getCatById->fetch_assoc()) {
        
                    ?>


                 <form action="" method="POST">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $result ['name'];?>" />
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }} ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>

