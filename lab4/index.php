<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="app.js" defer></script>
    <title>Калькулятор</title>
  </head>
  <body>
    <header></header>
    <main>
      <div class="main">
        <h1 class="header">Calculator</h1>
        <ul class="str">
          <li>
          
            <form action="back.php" method="post">
              <label class="enter">
              <?php 
                 if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["user_input"])) {
                  $user_input = $_GET["user_input"];
                  }
                ?>
                <input
                  id="input1"
                  class="input"
                  type="text"
                  value="<?php 
                  if ($user_input) {
                  echo $user_input;
                  } else 
                  {echo "";}
                  ?>"
                  name="user_input"
                />
              </label>
              <button type="submit" class="signs_equal" id="submit_invisible">
                =
              </button>
            </form>
          </li>
          <p class="equal">=</p>
          <li>
            <div>
              <p id="result" class="res"> <?php 
              if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["result"])) {
                $result = $_GET["result"];
                echo $result;
              } else {
                echo '0';
              };?>
              
          </p>
            </div>
          </li>
        </ul>
        <div>
          <ul class="list_buttons">
            <li>
              <button class="number" id="one">1</button>
            </li>
            <li>
              <button class="number" id="two">2</button>
            </li>
            <li>
              <button class="number" id="three">3</button>
            </li>
            <li>
              <button class="number" id="four">4</button>
            </li>
            <li>
              <button class="number" id="five">5</button>
            </li>
            <li>
              <button class="number" id="six">6</button>
            </li>
            <li>
              <button class="number" id="seven">7</button>
            </li>
            <li>
              <button class="number" id="eight">8</button>
            </li>
            <li>
              <button class="number" id="nine">9</button>
            </li>
            <li>
              <button class="number" id="zero">0</button>
            </li>
            <li><button class="number" id="lBrack">(</button></li>
            <li><button class="number" id="rBrack">)</button></li>
            <li>
              <button class="signs" id="plus">+</button>
            </li>
            <li>
              <button class="signs" id="minus">-</button>
            </li>
            <li>
              <button class="signs" id="multiply">*</button>
            </li>
            <li>
              <button class="signs" id="devide">/</button>
            </li>
            <li>
              <button type="submit" class="signs" id="submit_real">=</button>
            </li>
            <li>
              <button class="del" id="delete">Delete</button>
            </li>
          </ul>
        </div>
      </div>
    </main>
  </body>
</html>
