﻿<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
        <div class="grid_10">
        <style>
        .leftside{float:left;width:70%}
        .rightside{float:left;width:20%}
        .rightside img{height:120%;width:100%}
        </style>
        
        
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                
                                        <?php
                if($_SERVER['REQUEST_METHOD'] =='POST'){
                    $title = $fm->validation($_POST['title']);
                    $slogan = $fm->validation($_POST['slogan']);
                $title = mysqli_real_escape_string($db->link,$title);
                $cat = mysqli_real_escape_string($db->link,$slogan);

                
                $permited  = array('png');
                $file_name = $_FILES['logo']['name'];
                $file_size = $_FILES['logo']['size'];
                $file_temp = $_FILES['logo']['tmp_name'];

                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));
                $same_image = 'logo'.'.'.$file_ext;
                $uploaded_image = "uploads/".$same_image;
                
                if($title == "" || $slogan == "" ){
                    
                    echo "Field must not be empty";
                    
                    }else{
                    if (!empty($file_name)) {
                    
                    if ($file_size >1048567){
                     echo "<span class='error'>Image Size should be less then 1MB!</span>";
                    } elseif (in_array($file_ext, $permited) === false){
                     echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                    } else{

                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "UPDATE title_slogan
                    SET
                    title = '$title',
                    slogan = '$slogan',
                    logo = '$uploaded_image'
                   where id = '1'";
                    $updated_row = $db->update($query);
                    if ($updated_row) {
                        
                     echo "<span class='success'>Post updated Successfully.</span>";
                    }else {
                        
                     echo "<span class='error'>Post Not updated !</span>";
                    }
                    }


                }else{

                    $query = "UPDATE title_slogan
                    SET
                    title = '$title',
                    slogan = '$slogan'
                   where id = '1' ";
                    $updated_row = $db->update($query);
                    if ($updated_row) {
                        
                     echo "<span class='success'>Post updated Successfully.</span>";
                    }else {
                        
                     echo "<span class='error'>Post Not updated !</span>";
                    }
                 }
                }


                
                }
                ?>
                
                
                
                <?php

                $slogan = $slgn->getAllSlogan();
               
                if($slogan){
                    while($result = $slogan->fetch_assoc()){
                        
                    
                
                
                ?>
                <div class="block sloginblock"> 
       <div class="leftside">              
                  <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">                    
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['title'];?>"  name="title" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['slogan'];?>" name="slogan" class="medium" />
                            </td>
                        </tr>

                          <tr>
                            <td>
                                <label>Upload logo</label>
                            </td>
                            <td>
                                <input type="file" name="logo" />
                            </td>
                        </tr>
                         
                        
                         <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    </div>
                    <div class="rightside">
                    <img src="<?php echo $result['logo'];?>" alt=""/>
                    </div>
                </div>
                <?php }} ?>
            </div>
        </div>
          <?php include "inc/footer.php";?>