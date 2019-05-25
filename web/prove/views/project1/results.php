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
            $stmt = $db->prepare('SELECT * FROM recipes WHERE user_id=:user');
            $stmt->bindValue('user', $user, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $r) {
                echo '<span class="r_list"><a href="details.php?recipeLinks=' . $r['id'] . '">' . $r['name'] .  '</a></span>';
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
    </body>
</html>

