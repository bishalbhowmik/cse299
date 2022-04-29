<?php

@include 'config.php';

if(isset($_POST['add_artwork'])){

   $artwork_name = $_POST['art_name'];
   $artwork_price = $_POST['art_price'];
   $artwork_image = $_FILES['art_image']['name'];
   $artwork_image_tmp_name = $_FILES['art_image']['tmp_name'];
   $artwork_image_folder = 'Image/'.$artwork_image;

   if(empty($artwork_name) || empty($artwork_price) || empty($artwork_image)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO view_art(art_name, art_price, art_image) VALUES('$artwork_name', '$artwork_price', '$artwork_image')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($artwork_image_tmp_name, $artwork_image_folder);
         $message[] = 'new artwork added successfully';
      }else{
         $message[] = 'could not add the artwork';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM view_art WHERE art_id = $id");
   header('location:artwork_upload.php');
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Artwork Page Upload</title>

   
   <!-- custom css file link  -->
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

   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>add a new Artwork</h3>
         <input type="text" placeholder="Enter Artwork name" name="art_name" class="box">
         <input type="number" placeholder="Enter Artwork Price" name="art_price" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="art_image" class="box">
         <input type="submit" class="btn" name="add_artwork" value="add artwork">
      </form>

   </div>

   <?php

   $select = mysqli_query($conn, "SELECT * FROM view_art");
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>artwork image</th>
            <th>artwork name</th>
            <th>artwork price</th>
            <th>action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><img src="Image/<?php echo $row['art_image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['art_name']; ?></td>
            <td>Bdt-<?php echo $row['art_price']; ?> tk/-</td>
            <td>
        
               <a href="artwork_update.php?edit=<?php echo $row['art_id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="artwork_upload.php?delete=<?php echo $row['art_id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
         
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>


</body>
</html>