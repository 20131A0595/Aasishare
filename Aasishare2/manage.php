<?php
$conn = mysqli_connect('localhost', 'root', '', 'aasishare2') or die('Connection failed');
session_start();
$mb = $_SESSION['mb'];
$sel = "SELECT name FROM details WHERE mobile='$mb'";
$res = mysqli_query($conn, $sel);

if (mysqli_num_rows($res) > 0) {
	$row = mysqli_fetch_assoc($res);
	$name = $row['name'];

	if (isset($_POST['add'])) {
		echo '<script>window.location.href = "addmembers.php";</script>';
		exit();
	} elseif (isset($_POST['remove'])) {
		$_SESSION['name'] = $name;
		echo '<script>window.location.href = "deletemembers.php";</script>';
		exit();
	} elseif (isset($_POST['edit'])) {
		$_SESSION['name'] = $name;
		echo '<script>window.location.href = "editmembers.php";</script>';
		exit();
	}
} else {
	echo "invalid";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="manage_styles.css">
	<title>Manage page</title>
</head>
<body>
	<form method="post">
		<button type="submit" name="add" id="add"></button>&emsp; &emsp;
		<button type="submit" name="remove" id="delete"></button>&emsp; &emsp;
		<button type="submit" name="edit" id="edit"></button>
	</form>
	<a href="index.php">Main</a>
</body>
</html>
