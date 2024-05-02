<?php
	$first_name = $_POST['first_name'];
	$second_name = $_POST['second_name'];
	$last_name = $_POST['last_name'];
	$birthday = $_POST['birthday'];
	$address = $_POST['address'];
	$telephone = $_POST['telephone'];
	$conn = new mysqli("localhost", "root", "", "library");
	$query = mysqli_query($conn, "INSERT INTO readers (first_name, second_name, last_name, birthday, address, telephone) VALUES
        ('$first_name', '$second_name', '$last_name', '$birthday', '$address', '$telephone')");
	if ($query === TRUE){
    	header('Location: /librarian.php');
	}
	$conn->close();
?>