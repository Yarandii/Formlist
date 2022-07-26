<?php
$servername = "localhost";
$username = "yarandi";
$password = "1234";
$dbname = "data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


//$Firstname = $Surname = $Email = $Phone = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["first_name"])) {
    $errors['first_name'] = "Firstname is required";
    
  } 
  else {
    $firstName = ($_POST["first_name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$firstName)) {
            $errors['first_name'] = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["sur_name"])) {
    $errors['sur_name'] = "Surname is required";
  } else {
    $surName = ($_POST["sur_name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$surName)) 
      $errors['sur_name'] = "Only letters and white space allowed";
  }
 
  if (empty($_POST["email"])) {
    $errors['email'] = "Email is required";
  } else {
    $email = ($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "Invalid email format";
    }
  }
  
  if (empty($_POST["phone"])) {
    $errors['phone'] = "Phone is required ";
  } else {
    $phone = $_POST["phone"];
    if(!preg_match("/^[0-9]{11}+$/", $phone)) {
    $errors['phone'] = "inValid Phone Number";
  }
}

if($errors){
  $params =  http_build_query($errors);
  header("location:http://localhost/php/add.php?$params");
}

// if we have some errors and values   
// if ($errors){
//   foreach ($errors as $value) {
//     echo $value."<br>";
//   }
  
 
// }


if (!$errors){
  $sql = "INSERT INTO list (first_name, sur_name, email, phone) VALUES ('$firstName', '$surName', '$email', '$phone')";
  if ($conn->query($sql) === TRUE) {
    $msg ="New record created successfuly";
    header("location:http://localhost/php/add.php?msg=$msg");
  }else{
    echo "Error: " . $sql . "<br>" . $conn->error;

  }
   
}

$conn->close();
}
 
?>


