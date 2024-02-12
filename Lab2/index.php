<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $examp_str = '6 / x = 2';
    $mas = explode(" ", $examp_str);
    $number = intval($mas[0]);
    $operator = $mas[1];
    $unknown = NAN;
    $result = intval($mas[4]);
    // echo strval($number)."</br>";
    // echo strval($result)."</br>";
    // echo strval($operator)."</br>";
    switch (True) {
        case $operator === "+":
            $unknown =  $result - $number; 
            break;
        case $operator === "-":
            $unknown = $number - $result; 
            break;
        case $operator === "*":
            $unknown = $result / $number;
            break;
        case $operator === "/":
            $unknown = intval($number) / intval($result); 
            break;
        case $operator === "**":
            $unknown = log($result,$number);
            break;
        default:
            break;
    }
    echo "<h1>x = $unknown</h1></br>";
    echo "<h2>Оператор = $operator</h2></br>";

    ?>
    
</body>
</html>