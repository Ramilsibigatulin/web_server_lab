<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
  <?php
$url = 'https://docs.google.com/spreadsheets/d/1datUjdqhLoSW2oN1buH7jJW9GYuo5D7R/edit#gid=1949183560'; 
print_r(get_headers($url));
?>
    <a href="index.html">Переход на 1 страницу</a>
  </body>
</html>
