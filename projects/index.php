<?php
$insert = false;
if(isset($_POST['name'])) {
 
 $server = "localhost";
 $username = "root";
 $password = "";

 $con = mysqli_connect($server, $username, $password);

 if(!$con){
 
    die("coonection to this database failed due to " . mysqli_connect_error());
 }
 //echo "success Connected to the Database"

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $tel = $_POST['phone'];
    $desc = $_POST['desc'];

  $sql = "INSERT INTO `trip`.`trip` (`Name`, `Age`, `Gender`, `E-Mail`, `Phone`, `Other`, `Date`)
 VALUES ('$name', '$age', '$gender', '$email', '$tel', '$desc', current_timestamp())";
 //echo $sql;

 if($con->query($sql) == true)
 {
 //echo "Successfully Inserted";
 $insert= true;
}
else{
   echo "ERROR: $sql <br> $con->error";
}

$con->close();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Travel Form</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
</head>
<body>
  <img class='bg' src="bg.jpg" alt="sdc">
<div class="container">
<h1>Welcome to Siddhartha Collage form for US Trip </h1>
<p>Enter Your Details & submit this form to confirm your participation in Trip<p>
   <?php
   if($insert == true){
  echo"<p class='submitmsg'>Thank You for Joining Us for the trip</p>";
}
?>
<form action="index.php" method="post">
  <input type="text" name="name" id="name" placeholder="Enter Your Name">
  <input type="text" name="age" id="age" placeholder="Enter Your Age">
  <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
  <input type="email" name="email" id="email" placeholder="Enter Your Email">
  <input type="tel" name="phone" id="phone" placeholder="Enter Your Number as 9112345678">
  <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other Info"> </textarea>
  <button class="btn">submit</button>
 
</form>

</div>
  <script src="index.js">
/**/
  </script>
</body>
</html>