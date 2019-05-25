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
        <form method="post" action="results.php">

            <input type="text" name="username" placeholder="Enter Username">
            <input class="btn btn--white btn--animated" type="submit" value="List Your Recipes">

        </form>
        
        
        <form method="post" action="results.php">

            <input type="text" name="recipe" placeholder="Enter id#">
            <input class="btn btn--white btn--animated" type="submit" value="View a Recipe">

        </form>
        <div class="home__btn--message-box recipe_list">
            <?php
            //get and print data from database
            $user = $_POST['username'];
            $stmt = $db->prepare('SELECT * FROM recipes WHERE user_id=:user');
            $stmt->bindValue('user', $user, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $r) {
                echo "<span class='r_list'>" . 'id# ' . ' ' . $r['id'] . ' ' . $r['name'] . "</span>";
                echo '<br>';
            }
            ?> 
        </div>
        <footer>
            <?php include ('../../common/footer.php'); ?>
        </footer>
    </body>
</html>
