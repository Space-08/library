<?php
	if(isset($_COOKIE['user']))
	{
		header('Location: /librarian.php');
	}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Авторизация</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<main>
		<section class="authorization">
			<section class="authorization-inner">
				<h1>Вход в систему</h1>
				<form class="authorization-data" action="authorization.php" method="post">
					<p>Имя пользователя:</p>
					<input type="text" name="name" class="user-name" id="all-text-fields" placeholder="Введите имя пользователя" required>
					<p>Пароль:</p>
					<input type="password" name="pass" class="password" id="all-text-fields" placeholder="Введите пароль" required>
					<input type="submit" class="authorization-button" id="all-buttons" value="Авторизоваться">
				</form>
			</section>
		</section>
	</main>
</body>
</html>