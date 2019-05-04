<?php
session_start();
?>
<!DOCTYPE html>
<!--
Shopping Cart
-->
<html lang="en-us">
    <head>   
        <meta charset="UTF-8"/>
        <meta name="author" content="Shannon Polfer">
        <meta name="viewport">
        <title>SP Cart</title>
        <link href="../css/cart_style.css" rel="stylesheet" type="text/css" 
              media="screen">
        <script src="../js/cartjs.js"></script>
    </head>
    <body>
        <header>
            <h1>Thomas Kinkade Calendar Plates - CART</h1>
        </header>
        <main>  
<?php echo $_SESSION["inCart"] ?>
        </main> 
    </body>
</html>