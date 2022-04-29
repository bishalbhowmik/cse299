<?php

$conn = new mysqli("localhost", "root", "", "cse299_project");

if (mysqli_connect_errno()) {
     echo "cannot connect";
} else {
     echo "connected";

     if (isset($_POST['submit1'])) {
        $fname = $_POST['name1'];
        $email = $_POST['email1'];
        $message = $_POST['message1'];

        $sql ="INSERT INTO `contact_us`(`name`, `email`, `message`) VALUES (' $fname','$email','$message')";

        if ($conn->query($sql) === TRUE) {
            echo "Your message has been sent successfully.";
            //header("Location:login.php")
       } else {
            echo "ERROR: Could not able to execute . ";
            exit();
       }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style/contactstyle.css">
    
  </head>
  <body>

<div class="contact-section">
<h1>Contact Us</h1>
  <div class="border"></div>
  <form class="contact-form" method="post">
<h2 class = "name"> Name </h2>
    <input type="text" class="contact-form-text"  name = "name1">
<h2 class = "email"> Email </h2>
    <input type="email" class="contact-form-text" name = "email1">
   <h2 class = "message"> Message </h2> 
    <textarea class="contact-form-text" name = "message1"> </textarea>
    <input type="submit" class="contact-form-btn" name="submit1" value="Send">
  </form>

</div>

  </body>
</html>