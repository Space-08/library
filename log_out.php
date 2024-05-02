<?php
	setcookie('user', $user['user_name'], time() - 3600, "/");
	header('Location: /');
?>