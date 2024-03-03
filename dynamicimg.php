<?php
include "../../include/connection.php";
include "../include/header.php";
?>

<?php  
    if(isset($_POST['upload'])) 
    {
      // echo 1;
      // exit();
      
         $r=$_FILES['photo']['tmp_name'];
        $r_type=$_FILES['photo']['type'];
        $r_size=$_FILES['photo']['size'];
        $r_name=$_FILES['photo']['name'];
        
                if($r_type=='image/jpg'|| $r_type=='image/jpeg'|| $r_type=='image/png'|| $r_type=='image/gif')
                {
                    $path="../assets/img/".$r_name;
                    $upload=move_uploaded_file($r,$path);
                    if($upload)
                    {
                
                $sql="INSERT INTO gallery (`image_name`) VALUES ('$r_name')";
                $sqli=mysqli_query($conn,$sql);
                if($sqli)
                {
                 ?>

                 <script>
                    alert("image successfully inserted..");
                 </script>

                <?php
                 
                }

                }
             }
    
            }  
   ?>
   
<!-- -----------------------php part----------------------------  -->
                <script>
                    if(window.history.replaceState)
                    {
                        window.history.replaceState(null,null,window.location.href);
                    }
                </script>

<form action="" method="post"enctype="multipart/form-data">
<div class="container">
    <input type="file" name="photo" style="margin-top:3rem;">
    
</div>
<div class="container">
<a href="#" class=" text-black"><button class="btn btn-primary mt-3 text-black" name="upload">Upload</button></a>

</div>
</form>
<a href="gallery.php"><button class="btn btn-success mt-1 text-black" style="margin-left:1rem;">Back</button></a>