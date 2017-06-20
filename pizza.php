<!-- Name: Chase Keady -->
<!-- COSC 365 -->
<!-- This assignment dealt with creating a web form. -->
<!-- This file contains the html and php code that will output -->
<!-- the name and total for the order. -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns = "http://www.w3.org/1999/html">

  <head>
    <title> Pizzazz Receipt </title>
    <link href="receipt.css" type="text/css" rel="stylesheet" />
  </head>

  <body>
    <?php
      $name = $_GET['name'];
      $size = (isset($_GET['size']) ? $_GET['size'] : null);
      $pepperoni = (isset($_GET['pepperoni']) ? $_GET['pepperoni'] : null);
      $mushrooms = (isset($_GET['mushrooms']) ? $_GET['mushrooms'] : null);
      $crust = (isset($_GET['crust']) ? $_GET['crust'] : null);
      $total = 0.00;
    ?>
    
    <h1>
      Thank You For Choosing </br>
      Pizzazz Pizza
    </h1>
    
    <p class="receipt">
      Name: <?= $name ?> <br />
      <?php
        if($size == "Large"){
          $total = $total + 9.95;
        } else if ($size == "X-Large"){
          $total = $total + 12.95;
        }
        
        if($pepperoni == "yes"){
          $total = $total + 1.25;
        }
      
        if($mushrooms == "yes"){
          $total = $total + 1.25;
        } 
        
        if($crust == "Deep Dish"){
          $total = $total + 2.00;
        }
      ?>
      
      Total: <?= "$" . number_format((float)$total, 2, '.', '') ?> <br />
      
    </p>
    
    <?php 
      $text= "Name: " . $name . "\n" . "Total: $" . number_format((float)$total, 2, '.', '');
      file_put_contents("pizza.txt", $text);
    ?>
    
  </body>
  
</html>


