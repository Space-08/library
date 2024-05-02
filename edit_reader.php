<?php
// Подключение к базе данных
$conn = new mysqli("localhost", "root", "", "library");
// Обработка отправленных данных формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reader_id = $_POST["reader_id"];
    $first_name = $_POST["first_name"];
    $second_name = $_POST["second_name"];
    $last_name = $_POST["last_name"];
    $birthday = $_POST["birthday"];
    $address = $_POST["address"];
    $telephone = $_POST["telephone"];

    // Обновление данных читателя в базе данных
    $sql = "UPDATE readers SET first_name='$first_name', second_name='$second_name', last_name='$last_name', birthday='$birthday', address='$address', telephone='$telephone' WHERE reader_id=$reader_id";

    if ($conn->query($sql) === TRUE) {
        header('Location: /librarian.php');
    }
}

// Закрытие соединения с базой данных
$conn->close();
?>