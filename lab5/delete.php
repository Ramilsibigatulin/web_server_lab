<?php 
    if (isset($_GET['id'])){
        $sql = 'DELETE FROM `notebook` WHERE `id`='.$_GET['id'];
        mysqli_query($connect, $sql);
        if (mysqli_errno($connect)) print_r(mysqli_error($connect));
            else $s = 'Запись удалена';
    }
?>

<?php
    $sql = 'SELECT `id`, `firstname`, 
            LEFT(`name`, 1) N, LEFT(`lastname`, 1) L 
            FROM `notebook`';
    $res = mysqli_query($connect, $sql);
    if (mysqli_errno($connect)) print_r(mysqli_error($connect));
?>
<div class="container">
    <?php if(isset($s)):?>
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading"></h4>
        <p><?=$s;?></p>
        <p class="mb-0"></p>
      </div>
    <?php endif;?>
    
    <?php while($row = mysqli_fetch_assoc($res)):?>
        <a href="?p=delete&id=<?=$row['id'];?>"><?=$row['firstname'].' '.$row['N'].'.'.$row['L'].'.<br>'?></a>
    <?php endwhile;?>




    <?php
// Начало сессии
session_start();

// Проверка, не записан ли уже текст 'test' в сессию
if (!isset($_SESSION['text'])) {
    // Если текст 'test' еще не записан, записываем его в сессию
    $_SESSION['text'] = 'test';
}

// Вывод содержимого сессии
echo '<h1>Содержимое сессии: ' . $_SESSION['text'] . '</h1>';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Пример работы с сессиями</title>
</head>
<body>
    <h1>Пример работы с сессиями</h1>
    <p>При заходе на эту страницу текст "test" записывается в сессию. При обновлении страницы содержимое сессии будет отображено.</p>
</body>
</html>