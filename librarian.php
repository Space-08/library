<?php
	if(!isset($_COOKIE['user']))
	{
		header('Location: /');
	}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Библиотекарь</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<header>
		<section class="header-inner">
			<h1>Работа с клиентами Библиотеки</h1>
			<form class="log-out-form" action="log_out.php" method="post">
				<input type="submit" class="log-out-button" id="all-buttons" value="Выйти">
			</form>
		</section>
	</header>
	<main class="librarian-main">
		<section class="librarian">
			<section class="librarian-inner">
				<section class="tab">
					<input checked id="tab-btn-1" name="tab-btn" type="radio" value="">
					<label for="tab-btn-1">Абонементы</label>
					<input id="tab-btn-2" name="tab-btn" type="radio" value="">
					<label for="tab-btn-2">Читатели</label>
					<section class="tab-content" id="content-1">
						<h2>Список абонементов</h2>
						<form class="search-form" id="search-1" action="search_subscriptions.php" method="post">
							<input type="text" name="search" class="search-field" id="all-text-fields" placeholder="Введите данные абонемента и нажмите Enter" required>
						</form>
						<section class="subscriptions-content">
							<section class="subscriptions-objects">
								<section class="subscription-object">
									<p>№ Абонемента</p>
									<p>Имя читателя</p>
									<p>Отчество читателя</p>
									<p>Название книги</p>
									<p>Дата абонемента</p>
									<button class="edit-subscription-object" name="edit-button">
										<img src="img/edit.svg" alt="Редактировать">
									</button>
									<button class="delete-subscription-object" name="delete-button">
										<img src="img/trash.svg" alt="Удалить">
									</button>
								</section>
							</section>
						</section>
						<section class="librarian-btn">
							<form class="clear-btn" action="clear_sub.php" method="post">
								<input type="submit" name="clear-sub" class="clear-all-button" id="all-buttons" value="Очистить все">
							</form>
							<button class="new-subscription-button" id="all-buttons">Новый абонемент</button>
						</section>
					</section>
					<section class="tab-content" id="content-2">
						<h2>Список читателей</h2>
						<form class="search-form" id="search-2" action="search_readers.php" method="post">
							<input type="text" name="search" class="search-field" id="all-text-fields" placeholder="Введите данные читателя и нажмите Enter" required>
						</form>
						<section class="readers-content">
							<section class="readers-objects">
								<?php
									$conn = new mysqli("localhost", "root", "", "library");
									// Запрос к базе данных для получения данных из таблицы readers
									$sql = "SELECT * FROM readers";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
									  // Вывод данных каждого читателя в отдельном объекте
									  while($row = $result->fetch_assoc()) {
									    echo '<section class="reader-object" id="reader-' . $row["reader_id"] . '">';
									    echo '<p>' . $row["reader_id"] . '</p>';
									    echo '<p>' . $row["first_name"] . '</p>';
									    echo '<p>' . $row["second_name"] . '</p>';
									    echo '<p>' . $row["last_name"] . '</p>';
									    echo '<p>' . $row["birthday"] . '</p>';
									    echo '<p>' . $row["address"] . '</p>';
									    echo '<p>' . $row["telephone"] . '</p>';
									    echo '<button class="edit-reader-object" onclick="editReader(' . $row["reader_id"] . ')"><img src="img/edit.svg" alt="Редактировать"></button>';
									    echo '<button class="delete-reader-object" name="delete-button"><img src="img/trash.svg" alt="Удалить"></button>';
									    echo '</section>';
									  }
									} else {
									  echo "Пусто";
									}
									// Закрытие соединения
									$conn->close();
								?>
							</section>
						</section>
						<section class="librarian-btn">
							<form class="clear-btn" action="clear_rds.php" method="post">
								<input type="submit" name="clear-sub" class="clear-all-button" id="all-buttons" value="Очистить все">
							</form>
							<button class="new-reader-button" id="all-buttons">Новый читатель</button>
						</section>
					</section>
				</section>
			</section>
		</section>
	</main>
	<section class="new-object-container" id="new-subscription-container">
		<div class="overlay" id="new-subscription-overlay"></div>
		<section class="new" id="new-subscription">
			<form class="new-form" id="new-subscription-form" action="new_subscription.php" method="post">
				<h2>Новый абонемент</h2>
				<input type="text" name="first_name" class="reader-first_name" id="all-text-fields" placeholder="Введите имя читателя" required>
				<input type="text" name="second_name" class="reader-second_name" id="all-text-fields" placeholder="Введите отчество читателя" required>
				<input type="text" name="last_name" class="reader-last_name" id="all-text-fields" placeholder="Введите фамилию читателя" required>
				<input type="text" name="birthday" class="reader-birthday" id="all-text-fields" placeholder="Введите дату рождения" required>
				<input type="text" name="address" class="reader-address" id="all-text-fields" placeholder="Введите адрес читателя" required>
				<input type="text" name="telephone" class="reader-telephone" id="all-text-fields" placeholder="Введите телефон читателя" required>
				<input type="text" name="subscription_date" class="subscription-date" id="all-text-fields" placeholder="Введите дату абонемента" required>
				<select>
					<option>Выберете книгу</option>
				</select>
				<input type="submit" class="save" id="all-buttons" value="Сохранить">
			</form>
		</section>
	</section>
	<section class="edit-object-container" id="edit-subscription-container">
		<div class="overlay" id="edit-subscription-overlay"></div>
		<section class="edit" id="edit-subscription">
			<form class="edit-form" id="edit-subscription-form" action="edit_subscription.php" method="post">
				<h2>Изменение абонемента</h2>
				<input type="text" name="first_name" class="reader-first_name" id="all-text-fields" placeholder="Введите имя читателя" required>
				<input type="text" name="second_name" class="reader-second_name" id="all-text-fields" placeholder="Введите отчество читателя" required>
				<input type="text" name="last_name" class="reader-last_name" id="all-text-fields" placeholder="Введите фамилию читателя" required>
				<input type="text" name="birthday" class="reader-birthday" id="all-text-fields" placeholder="Введите дату рождения" required>
				<input type="text" name="address" class="reader-address" id="all-text-fields" placeholder="Введите адрес читателя" required>
				<input type="text" name="telephone" class="reader-telephone" id="all-text-fields" placeholder="Введите телефон читателя" required>
				<input type="text" name="subscription_date" class="subscription-date" id="all-text-fields" placeholder="Введите дату абонемента" required>
				<select>
					<option>Выберете книгу</option>
				</select>
				<input type="submit" class="save" id="all-buttons" value="Сохранить">
			</form>
		</section>
	</section>
	<section class="new-object-container" id="new-reader-container">
		<div class="overlay" id="new-reader-overlay"></div>
		<section class="new" id="new-reader">
			<form class="new-form" id="new-reader-form" action="new_reader.php" method="post">
				<h2>Новый читатель</h2>
				<input type="text" name="first_name" class="reader-first-name" id="all-text-fields" placeholder="Введите имя читателя" required>
				<input type="text" name="second_name" class="reader-second-name" id="all-text-fields" placeholder="Введите отчество читателя" required>
				<input type="text" name="last_name" class="reader-last-name" id="all-text-fields" placeholder="Введите фамилию читателя" required>
				<input type="text" name="birthday" class="reader-birthday" id="all-text-fields" placeholder="Введите дату рождения" required>
				<input type="text" name="address" class="reader-address" id="all-text-fields" placeholder="Введите адрес читателя" required>
				<input type="text" name="telephone" class="reader-telephone" id="all-text-fields" placeholder="Введите телефон читателя" required>
				<input type="submit" class="save" id="all-buttons" value="Сохранить">
			</form>
		</section>
	</section>
	<section class="edit-object-container" id="edit-reader-container">
		<div class="overlay" id="edit-reader-overlay"></div>
		<section class="edit" id="edit-reader">
			<form class="edit-form" id="edit-reader-form" action="edit_reader.php" method="post">
				<h2>Изменение читаталя</h2>
				<input type="hidden" name="reader_id" id="reader_id">
				<input type="text" name="first_name" class="all-text-fields" id="first_name" placeholder="Введите имя читателя" required>
				<input type="text" name="second_name" class="all-text-fields" id="second_name" placeholder="Введите отчество читателя" required>
				<input type="text" name="last_name" class="all-text-fields" id="last_name" placeholder="Введите фамилию читателя" required>
				<input type="text" name="birthday" class="all-text-fields" id="birthday" placeholder="Введите дату рождения" required>
				<input type="text" name="address" class="all-text-fields" id="address" placeholder="Введите адрес читателя" required>
				<input type="text" name="telephone" class="all-text-fields" id="telephone" placeholder="Введите телефон читателя" required>
				<input type="submit" class="save" id="all-buttons" value="Сохранить">
			</form>
		</section>
	</section>
	<script src="js/script.js"></script>
</body>
</html>