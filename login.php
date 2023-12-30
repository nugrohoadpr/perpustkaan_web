<?php
	session_start();
	include "config.php";

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$username = strtoupper($_POST['username']);
		$password = md5($_POST['pass']);

		$data = mysqli_query($mysqli,"SELECT * FROM user WHERE username='$username' AND pass='$password'");
		$cek = mysqli_num_rows($data);
		 
		if($cek > 0){
		    $_SESSION['username'] = $username;
		    header("location: book_show.php");
		}else{
		    header("location: login.php");
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action="login.php" method="POST">
 Username: <input type="text" name="username"><br>
 Password: <input type="password" name="pass"><br>
 <input type="submit" value="submit">
</form>

<p>Don't have an account? <a href="register.php">Register Here</a></p>

</body>
</html>
