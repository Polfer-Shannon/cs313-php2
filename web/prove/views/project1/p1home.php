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
        <header>
            <div class="header__text-box">
                <h1 class="heading-primary">
                    <span class="heading-primary--main">Organize</span>
                    <span class="heading-primary--sub">Favorite Family Recipes</span>
                </h1>

                <!--                <a href="#" onclick="recipeList()" class="btn btn--white btn--animated">Choose a Recipe</a>-->


                <form method="post" action="results.php">

                    <input type="text" name="book">
                    <input class="btn btn--white btn--animated" type="submit" value="View a Recipe">

                </form>

            </div>
            <div class="home__btn--message-box">
                <?php
                //get and print data from database
                $statement = $db->query('SELECT  id, name FROM recipes');
                $results = $statement->fetchAll(PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    echo "<span class='r_list'>" . $row['id'] . ' ' . $row['name'] . $row['date'] . $row['directions'] . "</span>";
                    echo '<br>';
                }
                ?> 
            </div>

        </header>  

        <footer>
            <?php include ('../../common/footer.php'); ?>
        </footer>
    </body>
</html>
