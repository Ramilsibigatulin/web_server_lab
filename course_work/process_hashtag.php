<?php
session_start();
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coursework";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение хэштега из формы
$hashtag = $conn->real_escape_string($_POST['hashtag']);

// Определение области знаний
$sql = "SELECT field.name FROM field JOIN hashtag_field_link ON field.id = hashtag_field_link.field_id JOIN Tag ON Tag.id = hashtag_field_link.hashtag_id WHERE Tag.name = '$hashtag'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $field = $result->fetch_assoc()['name'];
    echo "Область знаний: $field<br>";

    // Получение сообщений, связанных с хэштегом
    $sql = "SELECT SMS.Description FROM SMS JOIN Tag ON SMS.hashtag_id = Tag.id WHERE Tag.name = '$hashtag'";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>Сообщения:</h3>";
        while($row = $result->fetch_assoc()) {
            echo $row['Description'] . "<br>";
        }
    } else {
        echo "Нет сообщений для этого хэштега.";
    }
} else {
    $_SESSION['message'] = "Область знаний для этого хэштега не определена.";
    // Перенаправление пользователя
    header("Location: sorter.php");
    exit;
}

// Проверка, было ли введено сообщение
if (!empty($_POST['sms'])) {
    // Получение и очистка сообщения
    $sms = $conn->real_escape_string($_POST['sms']);

    // Получение ID хэштега из базы данных
    $sql = "SELECT id FROM Tag WHERE name = '$hashtag'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashtag_id = $row['id'];

        // Добавление сообщения в базу данных
        $sql = "INSERT INTO SMS (hashtag_id, Description) VALUES ('$hashtag_id', '$sms')";
        if ($conn->query($sql) === TRUE) {
            echo "Сообщение успешно добавлено.<br>";
        } else {
            echo "Ошибка: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Хэштег не найден в базе данных.<br>";
    }
}

$conn->close();
?>
