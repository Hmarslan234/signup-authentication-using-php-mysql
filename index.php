

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Signup Form</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

	<h2>Singup Here</h2>
	
	<form autocomplete="off" method="post" action="">
		<label>Name: </label><input type="text" name="name">
		<label>Email: </label><input type="text" name="email" autocomplete="off">
		<label>Password: </label><input type="password" name="password" autocomplete="off">
		<label>Confirm Password: </label><input type="password" name="c_password">

		<button type="submit" name="submit">Submit</button>
	</form>

	<?php 






if (isset($_POST['submit'])) {
 	$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$c_password = $_POST['c_password'];

$secure_password = password_hash($password, PASSWORD_DEFAULT);
$secure_password1 = password_hash($c_password, PASSWORD_DEFAULT);

 
$userserver="localhost";
$username="root";
$userpassword="";
$database="signup";


//Connecting Database
$conn = mysqli_connect($userserver, $username, $userpassword ,$database);

//Inserting Values into database
$sql = "INSERT INTO `user`( `name`, `email`, `password`, `c_password`) VALUES ('$name','$email','$secure_password','

	$secure_password1')";

if ( mysqli_query($conn, $sql)){
	echo "Sigup Success";
}

 if (empty($name)) {
  	echo "Name is required";
  } 


//Validating Conditions
 if ( ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
  	echo "invalid email<br>";
  } 

  if (strlen($password) < 8) {
  	echo "Password must contain at least 8 charachters<br>";
  }

  if ( ! preg_match("/[a-z]/", $password)) {
  	echo "Password must contain at least 1 charachter";
  }
  if ( ! preg_match("/[A-Z]/", $password)) {
  	echo "Password must contain at least 1 capital letter";
  }
   if ( ! preg_match("/[0-9]/", $password)) {
  	echo "Password must contain at least 1 digit/number";
  }
  if ( ! preg_match("/\W/", $password)) {
  	echo "Password must contain at least 1 special charachter";
  }
  if ( preg_match("/\s/", $password)) {
  	echo "Avoid space in password";
  }

  if ($password !== $c_password) {
  	echo "Password must match";
  }


//Printing Array value
  echo "<pre>";
  print_r($_POST);
  echo "</pre>";


 } 
?>

</body>
</html>