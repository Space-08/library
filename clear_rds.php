<?php
	$conn = new mysqli("localhost", "root", "", "library");
	$query = mysqli_query($conn, "DELETE FROM readers");
	header('Location: /librarian.php');
	$conn->close();
?>