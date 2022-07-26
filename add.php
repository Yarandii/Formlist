<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informatiom Form</title>
</head>
<body>

<div style="text-align:center;background-color:#cdcdcd">
<form action="insertdata.php" method="post">

 Name:     <input value="<?php if(isset($_POST['first_name'])) { echo htmlentities ($_POST['first_name']); } ?>" type="text" name="first_name"><br><br>
 <span style="color:red"><?php if(isset($_GET['first_name'])) echo ($_GET['first_name']) . "</br>" ?></span>

 Surname:  <input type="text" name="sur_name"><br><br>
 <span style="color:red"><?php if(isset($_GET['sur_name'])) echo $_GET['sur_name']. "</br>" ?></span>

 E-mail:   <input type="text" name="email"><br><br>
 <span style="color:red"><?php if(isset($_GET['email'])) echo $_GET['email']. "</br>" ?></span>

 P-number: <input type="text" name="phone"><br><br>
 <span style="color:red"><?php if(isset($_GET['phone']))  echo $_GET['phone']. "</br>" ?></span>

 <input type="submit" value="Send"><br>

<span style="color:green"> <?php if(isset($_GET['msg'])) echo $_GET['msg'];?> </span>
   





</form>
</div>

</body>
</html>