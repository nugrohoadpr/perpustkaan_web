<?php
	session_start();
	include "config.php";

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$nama = $_POST['nama'];
		$email = $_POST['email'];
	    $username = strtoupper($_POST['username']);
	    $password = md5($_POST['pass']);

	    if (empty($nama) || empty($username) || empty($email) || empty($password)) {
	        $error = 'Username, email, and password cannot be empty';
	    }	else{
	    	$stmt = $mysqli->prepare("INSERT INTO user (nama, username, email, pass) VALUES (?, ?, ?, ?)");
		    $stmt->bind_param("ssss", $nama, $username, $email, $password);
		    $stmt->execute();
		    $stmt->close();

		    $_SESSION['message'] = 'Registration successful. Please log in.';
		    header("Location: login.php");
		    exit;
	    }
		    
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action="register.php" method="POST">
 Nama: <input type="text" name="nama"><br>
 Username: <input type="text" name="username"><br>
 Email: <input type="text" name="email"><br>
 Password: <input type="password" name="pass"><br>
 <input type="submit" value="submit">
</form>

<p>Already have an account? <a href="login.php">Login Here</a></p>

</body>
</html>
