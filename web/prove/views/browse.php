<?php
$plates = array(
    "(aJan)" => "January",
    "(bFeb)" => "February",
    "(cMar)" => "March",
    "(dApr)" => "April",
    "(eMay)" => "May",
    "(fJun)" => "June",
    "(gJul)" => "July",
    "(hAug)" => "August",
    "(iSep)" => "September",
    "(j0Oct)" => "October",
    "(kNov)" => "November",
    "(lDec)" => "December",
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
        <title>SP Browse</title>
        <link href="../css/cart_style.css" rel="stylesheet" type="text/css" 
              media="screen">
        <script src="../js/cartjs.js"></script>
    </head>
    <body>
        <header>
            <h1>Pre-owned Thomas Kinkade Calendar Plates</h1>
        </header>
        <main>
            <form method="post" action="details.php">
                <div class="row">
                    <?php
                    ksort($plates);
                    foreach ($plates as $key => $itemMonth) {
                        echo "<div class='col-1-of-4'><input type='radio' name='plates' value='$itemMonth'>" . $itemMonth . '</div><br>';
                    }
                    ?> 
                </div>
                <p class="viewImage">Choose a month to view an image of the Calendar Plate, then click the submit button.</p>
                <input class="viewImage-submit" type="submit" name="submit">
            </form>
        </main>




    </body>
</html>
