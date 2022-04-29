<?php
// error_reporting(0);
$conn = new mysqli("localhost", "root", "", "cse299_project");

if (mysqli_connect_errno()) {
     echo "cannot connect";
} else {
     echo "connected";
}


if (isset($_POST['Signup'])) {
     $fname = mysqli_real_escape_string($conn, $_REQUEST["First_Name"]);
     $lname = mysqli_real_escape_string($conn, $_REQUEST['Last_Name']);
     $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
     $Phone = mysqli_real_escape_string($conn, $_REQUEST['number01']);
     $dateofb = mysqli_real_escape_string($conn, $_REQUEST['birthdate1']);
     $countr = mysqli_real_escape_string($conn, $_REQUEST['country1']);
     $joindat = mysqli_real_escape_string($conn, $_REQUEST['joindate1']);
     $password = mysqli_real_escape_string($conn, $_REQUEST['pass_word']);

     $sql = "INSERT INTO `registration`(`Firstname`, `Lastname`, `Email`, `PhoneNumber`, `DateOfBirth`, `Country`, `JoiningDate`, `Password`) VALUES
                    (' $fname','$lname',' $email','$Phone','$dateofb','$countr',' $joindat','$password')";

     if ($conn->query($sql) === TRUE) {
          echo "Records added successfully.";
          //header("Location:login.php")
     } else {
          echo "ERROR: Could not able to execute . ";
          exit();
     }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <link rel="stylesheet" href="style_sign_up.css">
     <title>Sign Up page</title>
</head>

<body>

     <div class="sign_up">
          <h1>SIGN-UP FORM</h1>
     </div>
     <form method="POST">
          <div class="main">


               <h2 class="name">Name</h2>
               <input class="Firstname" type="text" name="First_Name" placeholder="Enter Your First Name">
               <input class="Lastname" type="text" name="Last_Name" placeholder="Enter Your Last Name">

               <h2 class="name">Email</h2>
               <input class="email" type="text" name="email" placeholder="Enter Valid Email Address">

               <h2 class="name">Phone_Number</h2>
               <input class="number" type="num" name="number01" placeholder="Enter Valid Phone Number">

               <h2 class="name">Date_Of_Birth</h2>
               <input class="birthdate" type="date" name="birthdate1">
               <h2 class="name">Country</h2>
               <input class="country" type="text" name="country1" placeholder="Select Country">

               <h2 class="name">Joining_Date</h2>
               <input class="joindate" type="date" name="joindate1">
               <h2 class="name">Password</h2>
               <input class="password" type="text" name="pass_word" placeholder="Enter Passwprd">
               <!-- <input class="repassword" type="text" name="re_password" placeholder="Re Enter Your Password">-->
               <button type="submit" name="Signup">Submit</button><br><br><br>

          </div>
     </form>
     </div>
</body>

</html>

