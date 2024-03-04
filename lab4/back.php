<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
</head>
<body>
 <?php 
$user_input = "не определено";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $user_input = $_POST["user_input"];
} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["result"])) {
 $user_input = $_GET["result"];
}
function isValidExpression($expression) {
    $length = strlen($expression);
    $lastChar = '';
    $openBrackets = 0;
    for ($i = 0; $i < $length; $i++) {
        $char = $expression[$i];
        if (ctype_digit($char)) {
            continue;
        }
        if ($char == '+' || $char == '-' || $char == '*' || $char == '/') {
            if ($lastChar == '+' || $lastChar == '-' || $lastChar == '*' || $lastChar == '/') {
                return false; 
            }
            continue;
        }
        if ($char == '(') {
            $openBrackets++;
            continue;
        }
        if ($char == ')') {
            if ($openBrackets == 0) {
                return false; 
            }
            $openBrackets--;
            continue;
        }
        return false;
    }
    if ($openBrackets != 0) {
        return false;
    }
    return true;
}

function calculate($user_input) {
    if (!isValidExpression($user_input)) {
        return "Неверный формат выражения";
    }
    return calculateExpression($user_input);
}
function calculateExpression($user_input) {
 $regex = "/\(([^()]*)\)/";

 while (preg_match($regex, $user_input, $matches)) {
      $subexpression = $matches[1];
      $result = calculate($subexpression);
      $user_input = str_replace("($subexpression)", $result, $user_input);
 }
 $regex = '/(-?\d+\.?\d*)\s*([\/\*])\s*(-?\d+\.?\d*)/';

 while (preg_match($regex, $user_input, $matches)) {
      $result = $matches[2] == '*' ? $matches[1] * $matches[3] : $matches[1] / $matches[3];
      $user_input = preg_replace($regex, $result, $user_input, 1);
 }
 $regex = '/(-?\d+\.?\d*)\s*([+\-])\s*(-?\d+\.?\d*)/';

 while (preg_match($regex, $user_input, $matches)) {
      $result = $matches[2] == '+' ? $matches[1] + $matches[3] : $matches[1] - $matches[3];
      $user_input = preg_replace($regex, $result, $user_input, 1);
 }
 return $user_input;
};

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $result = calculate($user_input);
    echo '<h2>'.htmlspecialchars($result).'</h2>';
    // Перенаправляем на страницу с результатом
    header("Location: index.php?result=$result&user_input=$user_input");
    exit();
} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["result"])) {
    echo '<h2>'.htmlspecialchars($user_input).'</h2>';
}
?>
</body>
</html>