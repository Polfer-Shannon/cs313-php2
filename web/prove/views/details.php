<?php
session_start();
?>
<!DOCTYPE html>
<!--
Item Detail
-->
<html lang="en-us">
    <head>   
        <meta charset="UTF-8"/>
        <meta name="author" content="Shannon Polfer">
        <meta name="viewport">
        <title>Item Detail</title>
        <link href="../css/cart_style.css" rel="stylesheet" type="text/css" 
              media="screen">
        <script src="../js/cartjs.js"></script>
    </head>
    <body>
        <header>
            <h1>Thomas Kinkade Calendar Plate Details</h1>
        </header>
        <main>  
            <form method="post" action="cart.php">
                <div class="calPic-div">
                    <?php
                    if (isset($_POST["plates"])){
                        $_SESSION["inCart"]=array();
                        $_SESSION["inCart"] = $_POST["plates"];
                    }
                    echo '<p class="viewImage">You have chosen the month of: </p>';
                    echo '';
                    echo '<p class="viewImage-month">' . $_POST["plates"] . '<br>' . '<span class="viewImage-month">$100</span>' . '</p>';
                    if ($_POST["plates"] === "January") {
                        echo '<img class="calPic" src="../img/cart/jan.jpg">';
                    } elseif ($_POST["plates"] === "February") {
                        echo '<img class="calPic" src="../img/cart/feb.jpg">';
                    } elseif ($_POST["plates"] === "March") {
                        echo '<img class="calPic" src="../img/cart/mar.jpg">';
                    } elseif ($_POST["plates"] === "April") {
                        echo '<img class="calPic" src="../img/cart/apr.jpg">';
                    } elseif ($_POST["plates"] === "May") {
                        echo '<img class="calPic" src="../img/cart/may.jpg">';
                    } elseif ($_POST["plates"] === "June") {
                        echo '<img class="calPic" src="../img/cart/jun.jpg">';
                    } elseif ($_POST["plates"] === "July") {
                        echo '<img class="calPic" src="../img/cart/jul.jpg">';
                    } elseif ($_POST["plates"] === "August") {
                        echo '<img class="calPic" src="../img/cart/aug.jpg">';
                    } elseif ($_POST["plates"] === "September") {
                        echo '<img class="calPic" src="../img/cart/sep.jpg">';
                    } elseif ($_POST["plates"] === "October") {
                        echo '<img class="calPic" src="../img/cart/oct.jpg">';
                    } elseif ($_POST["plates"] === "November") {
                        echo '<img class="calPic" src="../img/cart/nov.jpg">';
                    } elseif ($_POST["plates"] === "December") {
                        echo '<img class="calPic" src="../img/cart/dec.jpg">';
                    } else {
                        echo "error";
                    }
                    ?><br>
                    <input class="btn-add-to-cart" type="submit" value="Add to Cart">
                    <a href="browse.php"><Button class="btn-return" type="button">Return to Browse Page</button></a>
                </div>

            </form>
            
        </main> 
    </body>
</html>
