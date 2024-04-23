<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coursework";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Неверный формат email.";
    exit;
}

if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
    $sql = "INSERT INTO Users (email, password) VALUES ('$email', '$password')";

    if ($conn->query($sql) === TRUE) {
         // Перенаправление пользователя на страницу success.html
         header("Location: sorter.php");
         exit; // Важно добавить exit после перенаправления, чтобы предотвратить дальнейшее выполнение скрипта

    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Пароль должен содержать минимум 8 символов, включая числа, знаки !? и большие буквы латинского алфавита.";
}

$conn->close();
?>