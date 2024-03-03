<?php
include "connection.php";

if(isset($_POST['submit']))
{
    $p_name = mysqli_real_escape_string($conn,$_POST['pName']);
    $p_price = mysqli_real_escape_string($conn,$_POST['pPrice']);

    $file_name=$_FILES['pImage']['name'];
    $file_type=$_FILES['pImage']['type'];
    $file_size=$_FILES['pImage']['size'];
    $file_tmp=$_FILES['pImage']['tmp_name'];
    $target_file = "image/".$file_name;

        if($file_size > 2097152){
            echo "<script> alert('File size must be 2mb or lower.'); </script>";
        }

        if($file_type=='image/jpg'|| $file_type=='image/jpeg'|| $file_type=='image/png'|| $file_type=='image/gif')
        {

            if(move_uploaded_file($file_tmp,$target_file))
            {

                $sql = "INSERT INTO product (product_name,product_price,product_image	
                ) VALUES ('$p_name','$p_price','$target_file')";
            
                if(mysqli_query($conn,$sql)){
                   echo '<script> alert("product added to the database successfully."); </script>';
                }else{
                   echo '<script> alert("Failed to add the product."); </script>';
                }
            }
        }
}    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Info</title>
   <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body class="bg-info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 bg-light m-5 rounded">
                    <h2 class="text-center p-2 mt-3">Add Product Info</h2>

                    <!--To Stop Repetition -->
                    <script>
                        if(window.history.replaceState)
                        {
                            window.history.replaceState(null,null,window.location.href);
                        }
                    </script>

                    <form action="" method="post" enctype="multipart/form-data" id="form-box">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Product Name" name="pName" id="" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Product Price" name="pPrice" id="" required>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="pImage" class="custom-file-input" id="customFile" required>
                                <label for="customFile" class="custom-file-label">Choose Product Image</label>
                            </div>
                        <div class="form-group py-2">
                            <input type="submit" name="submit" class="btn btn-success btn-block" value="Add" id="">
                        </div>
                        </div>
                    </form>

                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6 p-4 bg-light rounded">
                    <a href="index.php" class="btn btn-warning btn-block btn-lg">Go to Product Page</a>
                </div>
            </div>

        </div>
</body>
</html>