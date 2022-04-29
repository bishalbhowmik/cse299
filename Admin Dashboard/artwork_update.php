<?php

@include 'config.php';

$id = $_GET['edit'];

if(isset($_POST['artwork_update'])){

   $artwork_name = $_POST['art_name'];
   $artwork_price = $_POST['art_price'];
   $artwork_image = $_FILES['art_image']['name'];
   $artwork_image_tmp_name = $_FILES['art_image']['tmp_name'];
   $artwork_image_folder = 'Image/'.$artwork_image;

   if(empty($artwork_name) || empty($artwork_price) || empty($artwork_image)){
      $message[] = 'please fill out all!';    
   }else{

      $update_data = "UPDATE view_art SET art_name='$artwork_name', art_price='$artwork_price', art_image='$artwork_image'  WHERE art_id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         move_uploaded_file($artwork_image_tmp_name, $artwork_image_folder);
         header('location:artwork_upload.php');
      }else{
         $$message[] = 'please fill out all!'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="CSS/admin_artwork_style.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM view_art WHERE art_id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the Artwork</h3>
      <input type="text" class="box" name="art_name" value="<?php echo $row['art_name']; ?>" placeholder="Enter the Artwork name">
      <input type="number" min="0" class="box" name="art_price" value="<?php echo $row['art_price']; ?>" placeholder="Enter the artwork price">
      <input type="file" class="box" name="art_image"  accept="image/png, image/jpeg, image/jpg">
      <input type="submit" value="update artwork" name="artwork_update" class="btn">
      <a href="artwork_upload.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>