<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="#" method = "post" >
		Enter your ID:<input type="text" name="id"><br>
		Enter your Password:<input type="password" name="pwd">
		<input type="submit" name="submit">
	</form>
</body>
</html>


<?php
	$host = 'localhost:3306';
	$user = 'root';
	$pass = '';
	$db = 'temp1';
	$conn = mysqli_connect($host,$user,$pass,$db);
	if(!$conn)
		echo "<script>alert('DB Not Connected');</script>";
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : '';

	$query = "SELECT * from `admin` where `id` = '$id' and pwd = '$pwd' ";
	$res = mysqli_query($conn,$query);
	if($res > 0)
	{
		$data = mysqli_fetch_array($res);
		$_SESSION['id'] = $data['id'];
		$_SESSION['email'] = $data['email'];
		// $_SESSION['pwd'] = $data['pwd'];
		header('Location:profile.php');
	}
?>