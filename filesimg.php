<?php
if(isset($_FILES['image']))
{

    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";

        $file_name=$_FILES['image']['name'];
        $file_size=$_FILES['image']['size'];
        $file_tmp=$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];

        if($file_size > 2097152){
            echo "<script> alert('File size must be 2mb or lower.'); </script>";
        }

        if($file_type=='image/jpg'|| $file_type=='image/jpeg'|| $file_type=='image/png'|| $file_type=='image/gif')
        {

            if(move_uploaded_file($file_tmp,"upload-img/". $file_name)){
                echo "<script> alert('Successfully Uploaded'); </script>";
            }else{
                echo "<script> alert('Not Uploaded'); </script>";
            }
        }
}
?>

<html>
    <body>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="image" id=""><br><br>
            <button type="submit">Upload</button>
            <!-- <input type="submit"> -->
        </form>
    </body>
</html>

<!-------------------------------------------------------------------------------------------------------->


<?php
    // include "../../include/connection.php";
    // include "../include/header.php";


    // if(isset($_POST['upload'])) 
    // {

        //   echo 1;
        //   exit();
      
//             $r=$_FILES['photo']['tmp_name'];
//             $r_type=$_FILES['photo']['type'];
//             $r_size=$_FILES['photo']['size'];
//             $r_name=$_FILES['photo']['name'];
            
//                 if($r_type=='image/jpg'|| $r_type=='image/jpeg'|| $r_type=='image/png'|| $r_type=='image/gif')
//                 {
//                     $path="../assets/img/".$r_name;
//                     $upload=move_uploaded_file($r,$path);
//                     if($upload)
//                     {
                
//                         $sql="INSERT INTO gallery (`image_name`) VALUES ('$r_name')";
//                         $sqli=mysqli_query($conn,$sql);
//                         if($sqli) 
//                         {

//                             echo "<script> alert('image successfully inserted.'); </script>";

//                         }

//                     }
//                 }
    
//     }  
?>
   
         <!---------------------------------------php part--------------------------------------------->

                <!-- <script>
                    if(window.history.replaceState)
                    {
                        window.history.replaceState(null,null,window.location.href);
                    }
                </script>

<form action="" method="post" enctype="multipart/form-data">

    <div class="container">
        <input type="file" name="photo" style="margin-top:3rem;">
    </div>

    <div class="container">
        <a href="#" class=" text-black"><button class="btn btn-primary mt-3 text-black" name="upload">Upload</button></a>
    </div>

</form>
    <a href="gallery.php">
        <button class="btn btn-success mt-1 text-black" style="margin-left:1rem;">
            Back
        </button>
    </a> -->