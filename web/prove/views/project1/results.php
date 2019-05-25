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
        <?php
        //get and print data from database
        $user = $_POST['username'];
        $stmt = $db->prepare('SELECT * FROM recipes WHERE user_id=:user ORDER BY name');
        $stmt->bindValue('user', $user, PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $user2 = $_POST['username'];
        $stmt2 = $db->prepare('SELECT * FROM users WHERE id=:id');
        $stmt2->bindValue('id', $user2, PDO::PARAM_STR);
        $stmt2->execute();
        $rows2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows2 as $r2) {
            echo '<h1 class="recipe_list__title">' . 'Recipes for ' . $r2['first_name'] . '</h1>';
        }
        foreach ($rows as $r) {
            echo '<span class="r_list"><a href="details.php?recipeLinks=' . $r['id'] . '">' . $r['name'] . '</a></span>';
            echo '<br>';
        }
        ?> 



        <?php
        $recipe = $_POST['recipe'];
        $stmt = $db->prepare('SELECT * FROM recipes WHERE id=:id');
        $stmt->bindValue(':id', $recipe, PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $r) {
            echo '<p class="recipe_name"><a href="details.php?recipeLinks=' . $r['id'] . '">';
            echo $r['name'] . ' ';
            echo '<br>';
            echo '</a>;</p>';
        }
        ?>
        <form method="post" action="results.php">
            <label for="rank">Enter 1 to Order by Rank :</label>
            <br>
            <label for="rank">Enter 2 to Order by Date :</label>
            <input type="text" name="rank" placeholder="Enter Username">
            <input class="btn btn--white btn--animated" type="submit" value="Change Order">
        </form>    

            <?php
            //get and print data from database
            $user = $_POST['l_rank'];
            $stmt = $db->prepare('SELECT * FROM recipes WHERE user_id=:user ORDER BY name');
            $stmt->bindValue('user', $user, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $user2 = $_POST[''];
            $stmt2 = $db->prepare('SELECT * FROM users WHERE id=:id');
            $stmt2->bindValue('id', $user2, PDO::PARAM_STR);
            $stmt2->execute();
            $rows2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

            foreach ($rows2 as $r2) {
                echo '<h1 class="recipe_list__title">' . 'Recipes for ' . $r2['first_name'] . '</h1>';
            }
            foreach ($rows as $r) {
                echo '<span class="r_list"><a href="details.php?recipeLinks=' . $r['id'] . '">' . $r['name'] . '</a></span>';
                echo '<br>';
            }
            ?> 

        
    </body>
</html>

