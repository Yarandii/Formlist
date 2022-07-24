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
    $errors[] = "Firstname is required";
  } 
  else {
    $firstName = $_POST["first_name"];
  }

  if (empty($_POST["sur_name"])) {
    $errors[] = "Surname is required";
  } else {
    $surName = $_POST["sur_name"];
  }

  if (empty($_POST["email"])) {
    $errors[] = "Email is required";
  } else {
    $email = $_POST["email"];
  }

  if (empty($_POST["phone"])) {
    $errors[] = "Phone is required ";
  } else {
    $phone = $_POST["phone"];
  }


// if we have some errors and values   
if ($errors){
  foreach ($errors as $value) {
    echo $value."<br>";
  }
}

if (!$errors){
  $sql = "INSERT INTO list (first_name, sur_name, email, phone) VALUES ('$firstName', '$surName', '$email', '$phone')";
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  }else{
    echo "Error: " . $sql . "<br>" . $conn->error;

  }
   
}

$conn->close();
}


?>