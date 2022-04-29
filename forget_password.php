<?php 
    $conn = new mysqli("localhost", "root", "", "cse299_project");
    if (mysqli_connect_errno()) {
        echo "cannot connect";
   } else {
        echo "connected";
   }
   if (isset($_POST['Signup'])) {
    $email = $_POST['email'];
    $dateofb = $_POST['birthdate1'];
    $Phone = $_POST['number01'];
    $password = $_POST['pass_word'];
    $repassword = $_POST['re_password'];

    if($password == $repassword){

        $sql="UPDATE `registration` SET `Password`='$repassword' WHERE Email='".$email."' AND DateOfBirth='".$dateofb."'AND '".$Phone."'";
        if ($conn->query($sql) === TRUE) {
            echo "Password Recovery successfully.";
            header("Location:Sign_In.php");
       } else {
            echo "ERROR: Could not able to execute . ";
            exit();
    }
   }
   else
     {
          echo "Sorry Email does't match";
     }
}

   
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <link rel="stylesheet" href="style_sign_up.css">
     <title>Forget password page</title>
</head>

<body>

     <div class="sign_up">
          <h1>Password Recovery</h1>
     </div>
     <form method="POST">
          <div class="main">
              
               <h2 class="name">Email</h2>
               <input class="email" type="text" name="email" placeholder="Enter Valid Email Address">

               <h2 class="name">Phone_Number</h2>
               <input class="number" type="num" name="number01" placeholder="Enter Valid Phone Number">

               <h2 class="name">Date_Of_Birth</h2>
               <input class="birthdate" type="date" name="birthdate1">
              
               <h2 class="name">Password</h2>
               <input class="password" type="text" name="pass_word" placeholder="Enter your new Passwprd">
               <input class="password" type="text" name="re_password" placeholder="Re Enter Your new Password">
               <button type="submit" name="Signup">Submit</button><br><br><br>

          </div>
     </form>
     </div>
</body>

</html>

