<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
        <div class="grid_10">
        
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <?php
                if($_SERVER['REQUEST_METHOD'] =='POST'){

                    $updatesocial = $slgn->updateAllSocial($_POST);

                    if (isset($updatesocial)) {
                       echo "$updatesocial";
                    }
           
                
                }
                
                
                ?>
                
                
            <?php
                $socialId = $slgn->getAllSocialId();
                
                if($socialId){
                    while($result = $socialId->fetch_assoc()){

                ?>
                
                <div class="block">               
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">                    
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="fb" value="<?php echo $result['fb'];?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="tw" value="<?php echo $result['tw'];?>" class="medium" />
                            </td>
                        </tr>
                        
                         <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="ln" value="<?php echo $result['ln'];?>" class="medium" />
                            </td>
                        </tr>
                        
                         <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="gp" value="<?php echo $result['gp'];?>" class="medium" />
                            </td>
                        </tr>
                        
                         <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php } } ?>
                <?phph
            </div>
        </div>
           <?php include "inc/footer.php";?>