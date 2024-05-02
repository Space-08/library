<?php

// Подключение к базе данных
$conn = new mysqli("localhost", "root", "", "library");

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Обработка запроса на удаление
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reader_id"])) {
    $reader_id = $_POST["reader_id"];

    // Удаление записи из таблицы readers
    $sql = "DELETE FROM readers WHERE reader_id=$reader_id";

    if ($conn->query($sql) === TRUE) {
        header('Location: /librarian.php');
    }
}

// Закрытие соединения с базой данных
$conn->close();
?>