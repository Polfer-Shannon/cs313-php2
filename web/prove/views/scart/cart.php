<?php
session_start();
if (isset($_POST["submit"])) {
    $_SESSION['purchase'][] = $_POST['plates'];
    header('LOCATION: browse.php');
}
$plate = array(
            "Jan" => "January",
            "Feb" => "February",
            "Mar" => "March",
            "Apr" => "April",
            "May" => "May",
            "Jun" => "June",
            "Jul" => "July",
            "Aug" => "August",
            "Sep" => "September",
            "Oct" => "October",
            "Nov" => "November",
            "Dec" => "December",
        );
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
        <?php
        
//        ?>
        <main>

            <p>See contents of your Cart</p>
            <form method="post" action="" >
                <input class="btn" type="submit" value="See Items in Cart" name="added">
            </form>
            <?php
//                  
                if (isset($_POST['added'])) {
                foreach ($_SESSION['purchase'] as $key => $value) {
                    if (isset($value[0])){
                    echo $value[0];
                    echo "" . ", ";
                }
                }
                }
                
            
            
//            if (isset($_POST['added'])) {
//            foreach ($_SESSION['purchase'] as $key1 => $value) {
//                foreach ($plate as $x => $x_value)
//                    if ($value === $x)
//                        echo $x_value;
//                echo "" . ", ";
//            }
//                print_r($_SESSION['purchase']);
//            }
            
            ?>
            <br>
            <a href="browse.php" class="btn">Return to Browse</a>
            <br>
            <a href="checkout.php" class="btn">Continue to Checkout</a>
        </main>

    </body>
</html>


<!--if (isset($_POST["submit"])) {
            foreach ($_POST["continent"] as $selected) {
                foreach ($map as $x => $x_value)
                    if ($selected === $x)
                        echo $x_value;
                echo "" . ", ";
            }
        }-->