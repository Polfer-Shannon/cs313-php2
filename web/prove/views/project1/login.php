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
        <title>Login</title>
        <link href="../../css/home_style.css" rel="stylesheet" type="text/css" 
              media="screen">
        <link href="../../css/project1.css" rel="stylesheet" type="text/css" 
              media="screen">
        <script src="../../js/homejs.js"></script>
    </head>
    <body>
        <header class="header__pages project1">
            <div class="header__text-box header__text-box--pages">
                <h1 class="heading-primary pages">
                    <span class="heading-primary--sub pages">Favorite Family Recipes</span>
                </h1>
                <a href="p1home.php" class="btn btn--white btn--animated btn__pages">&nbsp;&nbsp;&nbsp;&nbsp;Recipe Home&nbsp;&nbsp;&nbsp;&nbsp;</a>
            </div>
        </header>
        <div class="login_box">
        <form method="post" action="p1home.php">
                    <!--<fieldset>-->
                        <h1 class="login_title">Login</h1>
                        <h2 class="rlForm"><label for="clientEmail">Email:</label></h2>
                        <input type="email" name="clientEmail" id="clientEmail" placeholder="Enter your email address" <?php if (isset($clientEmail)) {
                    echo "value='$clientEmail'";
                } ?> required><br>
                        <h2 class="rlForm"><label for="clientPassword">Password:</label></h2>
                        <input type="password" name="clientPassword" id="clientPassword" placeholder="Enter your password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
<!--                    </fieldset>-->
                    <p class="login_paragraph">Passwords must be at least 8 character's and contain at least 1<br>
                        of each of the following: number, capital letter, special character.</p>


                    <input class="btn btn--white btn--animated btn_color" type="submit" name="submit" value="Login">
                    <input type="hidden" name="action" value="Login">

                </form>
        </div>
        <br>
         <footer>
            <?php include ('../../common/footer.php'); ?>
        </footer>
    </body>
</html>