<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <title>#сортер</title>
  </head>
  <body><?php
  session_start(); // Начало сессии

// Проверка, установлено ли сообщение в сессии
if (isset($_SESSION['message'])) {
    // Отображение сообщения
    echo "<span style='color: red;font-size:20px'>{$_SESSION['message']}</span>";    // Очистка сообщения из сессии
    unset($_SESSION['message']);
} ?>
    <h2>Введите хэштег и сообщение для него</h2>
    <form action="process_hashtag.php" method="post">
      <input type="text" name="hashtag" placeholder="#cake" required />
      <input type="text" name="sms" placeholder="sms..."/>
      <input type="submit" value="Отправить" />
    </form>
  </body>
</html>
