<?php
session_start();
//if (isset($_POST["submit"])) {
//    $_SESSION['purchase'][] = $_POST['plates'];
//    header('LOCATION: browse.php');
//}

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
        <title>SP Cart</title>
        <link href="../../css/cart_style.css" rel="stylesheet" type="text/css" 
              media="screen">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="../../js/cartjs.js"></script>
    </head>
    <body>
        <header>
            <h1>My Cart</h1>
        </header>
        <?php //        ?>
        <main>

            <p class="paragraph">The contents of your shopping cart are:</p>
            
            
            <?php
            //save array items to session variable
            foreach ($_POST['plates'] as $value) {
                $_SESSION['plates'][$value] = $value;
            }
//            if (isset($_POST['delete']))
            
            ?>
            <form action=cart.php method=post>
            <?php
//            display array items
            foreach ($_SESSION['plates'] as $value) {
                echo $value . " ";
                echo '<button type="submit" name="delete" value=" ' . $value . '">Delete</button>';
                echo "   ";
            }
            ?>
            </form>

            <br>
            <a href="browse.php" class="btn">Return to Browse</a>
            <br>
            <a href="checkout.php" class="btn">Continue to Checkout</a>
        </main>

    </body>
</html>
