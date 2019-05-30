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
        <title>SP Home</title>
        <meta charset="UTF-8"/>
        <meta name="author" content="Shannon Polfer">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">      
        <link href="../../css/home_styleoff.css" rel="stylesheet" type="text/css" 
              media="screen">
        <link href="../../css/project1off.css" rel="stylesheet" type="text/css" 
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
        <div class="container">

            <?php
            echo '<h2><a href="login.php?action=login" title="Go to login">Login</a><h2><br>';
            ?>



            <form method="post" action="results.php">
                <div class="form-group">    
                    <label for="username">Or Enter Your Username:</label>
                    <input  class="form-control" type="text" name="username" placeholder="Username">
                    <input  class="form-control btn-primary" type="submit" value="List Your Recipes">
                </div>
            </form>
        </div>
        <footer>
            <?php include ('../../common/footer.php'); ?>
        </footer>
    </body>
</html>
