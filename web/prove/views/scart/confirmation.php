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
        <title>SP Confirmation</title>
        <link href="../../css/cart_style.css" rel="stylesheet" type="text/css" 
              media="screen">
        <script src="../../js/cartjs.js"></script>
    </head>
    <body>
        <header>
            <h1>Purchase Confirmation</h1>

            Shipping Address: <br>

            <?php echo $_POST["address"]; ?> <br>
            <?php echo $_POST["city"]; ?> 
            <?php echo ", "; ?>
            <?php echo $_POST["state"]; ?> 
            <?php echo ", "; ?>
            <?php echo $_POST["zip"]; ?> <br>
        </header>
        <main>
            <br>
            You have purchased:


        </main>




    </body>
</html>

