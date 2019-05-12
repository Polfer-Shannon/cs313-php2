<?php
session_start();

?>
<!DOCTYPE html>
<!--
Browse Page
-->
<html lang="en-us">
    <head>   
        <meta charset="UTF-8"/>
        <meta name="author" content="Shannon Polfer">
        <meta name="viewport">
        <title>SP Checkout</title>
        <link href="../../css/cart_style.css" rel="stylesheet" type="text/css" 
              media="screen">
        <script src="../../js/cartjs.js"></script>
    </head>
    <body>
        <header>
            <h1>Checkout</h1>
        </header>
        <main>
            <form method="post" action="confirmation.php">
            <label for="address">Adress:</label>
            <input type="text" name="address">
            <br>
            <label for="city">City:</label>
            <input type="text" name="city">
            <br>
            <label for="state">State:</label>
            <input type="text" name="state">
            <br>
            <label for="zip">Zip:</label>
            <input type="text" name="zip">
            <br>
            <input class="btn" type="submit" value="Complete Purchase" name="submit">
            </form>
            <a href="cart.php" class="btn">Return to Cart</a>
        </main>




    </body>
</html>


