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
            </div>
        </header>  
        <form method="post" action="results.php">

            <input type="text" name="book" placeholder="Enter id#">
            <input class="btn btn--white btn--animated" type="submit" value="View a Recipe">

        </form>
        <div class="home__btn--message-box">
            <?php
            //get and print data from database
            $statement = $db->query('SELECT  id, name FROM recipes ORDER BY name');
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                echo "<span class='r_list'>" . 'id#  ' . $row['id'] . ' ' . $row['name'] . $row['date'] . $row['directions'] . "</span>";
                echo '<br>';
            }
            ?> 
        </div>
        <footer>
            <?php include ('../../common/footer.php'); ?>
        </footer>
    </body>
</html>
