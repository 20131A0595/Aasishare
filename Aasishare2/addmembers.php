<?php
$conn = mysqli_connect('localhost','root','','aasishare2') or die('connection failed');
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if(isset($_POST['add'])){
	session_start();
$name = $_SESSION['name'];
$email = $_SESSION['email'];
	$name1=$_POST['name1'];
	$email1 = test_input($_POST["email1"]);
	if (filter_var($email1, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $email1)) 
  	$email1=$_POST['email1'];
  	else
  	$email1="";
	$name2=$_POST['name2'];
	$email2 = test_input($_POST["email1"]);
	if (filter_var($email2, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $email2)) 
  	$email1=$_POST['email2'];
  	else
  	$email2="";
	$name3=$_POST['name3'];
	$email3 = test_input($_POST["email3"]);
	if (filter_var($email3, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $email3)) 
  	$email3=$_POST['email3'];
  	else
  	$email3="";
	$name4=$_POST['name4'];
	$email4 = test_input($_POST["email4"]);
	if (filter_var($email4, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $email4)) 
  	$email4=$_POST['email4'];
  	else
  	$email4="";
	$name5=$_POST['name5'];
	$email5 = test_input($_POST["email5"]);
	if (filter_var($email5, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $email5)) 
  	$email5=$_POST['email5'];
  	else
  	$email5="";
	$ins="INSERT INTO members(name, email, name1, email1, name2, email2, name3, email3, name4, email4, name5, email5) VALUES('$name', '$email','$name1', '$email1', '$name2', '$email2', '$name3', '$email3', '$name4', '$email4', '$name5', '$email5')";
	$insert = mysqli_query($conn, $ins);
         if($insert){
         	echo '<script>alert("Members addedd successfully!")</script>';
         }else{
         	echo '<script>alert("Failed to add members")</script>';
         }
         echo "<script>location.href='login.php'</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="addmembers.css">
	<title>Add members</title>
</head>
<body>
	<h3>Enter your team members details</h3>
	<form method="post" action="addmembers.php">
		<fieldset>
			<label>Person 1</label>
			<h3>
			Name:
			<input type="text" name="name1" required placeholder="Enter Person 1 name" autocomplete="off"><br><br>
			Email: 
			<input type="Email" name="email1" required placeholder="Enter Person 1 email" autocomplete="off">
		</fieldset>
		<fieldset>
			<label>Person 2</label>
			<h3>
			Name:
			<input type="text" name="name2" required placeholder="Enter Person 2 name" autocomplete="off"><br><br>
			Email: 
			<input type="Email" name="email2" required placeholder="Enter Person 2 email" autocomplete="off">
		</fieldset>
		<fieldset>
			<label>Person 3</label>
			<h3>
			Name:
			<input type="text" name="name3" required placeholder="Enter Person 3 name" autocomplete="off"><br><br>
			Email: 
			<input type="Email" name="email3" required placeholder="Enter Person 3 email" autocomplete="off">
		</fieldset>
		<fieldset>
			<label>Person 4</label>
			<h3>
			Name:
			<input type="text" name="name4" required placeholder="Enter Person 4 name" autocomplete="off"><br><br>
			Email: 
			<input type="Email" name="email4" required placeholder="Enter Person 4 email" autocomplete="off">
		</fieldset>
		<fieldset>
			<label>Person 5</label>
			<h3>
			Name:
			<input type="text" name="name5" required placeholder="Enter Person 5 name" autocomplete="off"><br><br>
			Email: 
			<input type="Email" name="email5" required placeholder="Enter Person 5 email" autocomplete="off">
		</fieldset><br><br>
		<button type="submit" name="add"> Add members</button>
	</form>
		<br><br>
	<a href="manage.php">Home</a>
</body>
</html>