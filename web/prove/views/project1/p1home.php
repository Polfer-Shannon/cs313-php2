<?php 
require 'dbConnect.php';
$db = get_db();
?>
<!DOCTYPE html>
<!--
Personal Home Page
-->
<html lang="en-us">
    <head>   
        <meta charset="UTF-8"/>
        <meta name="author" content="Shannon Polfer">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SP Home</title>
        <link href="../../css/home_style.css" rel="stylesheet" type="text/css" 
              media="screen">
        <link href="../../css/project1.css" rel="stylesheet" type="text/css" 
              media="screen">
        <script src="../../js/homejs.js"></script>
    </head>
    <body>
        <header class="header__pages">
            <div class="header__text-box header__text-box--pages">
                <h1 class="heading-primary pages">
                    <span class="heading-primary--main pages">Organize</span>
                    <span class="heading-primary--sub pages">Favorite Family Recipes</span>
                </h1>
                <a href="../../../index.php" class="btn btn--white btn--animated btn__pages">&nbsp;&nbsp;&nbsp;&nbsp;Home&nbsp;&nbsp;&nbsp;&nbsp;</a>
            </div>
        </header>  
        <?php 
        echo '<a href="login.php?action=login" title="Go to login" >Login</a>';
        ?>
       
        <div class="home__btn--message-box p1_message_box">
            <form method="post" action="results.php">

            <input class="input_box" type="text" name="username" placeholder="Enter UserID 1, 2 or 3">
            <input class="btn btn--white btn--animated btn_color" type="submit" value="List Your Recipes">

        </form>
        </div>
        <footer>
            <?php include ('../../common/footer.php'); ?>
        </footer>
    </body>
</html>
