<?php
	$login = $_POST['name'];
	$pass = $_POST['pass'];
	$conn = new mysqli("localhost", "root", "", "authorization");
	$result = mysqli_query($conn, "SELECT * FROM users WHERE user_name = '$login' AND pass = '$pass'");
	$user = $result->fetch_assoc();
	if($user == 0)
	{
		header('Location: /');
	}
	else
	{
		setcookie('user', $user['user_name'], time() + 3600, "/");
		header('Location: /librarian.php');
	}
	$conn->close();
?>