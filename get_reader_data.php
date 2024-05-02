<?php
  // get_reader_data.php
  $conn = new mysqli("localhost", "root", "", "library");

  $reader_id = $_GET['reader_id'];
  $sql = "SELECT * FROM readers WHERE reader_id=$reader_id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
  } else {
    echo json_encode(['error' => 'Читатель не найден']);
  }

  $conn->close();
?>