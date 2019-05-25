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
<!--        <header>
            
        </header>-->
        <?php
        $recipe_id = $_GET['recipeLinks'];
        $stmt = $db->prepare('SELECT ingredients.food, recipes.name FROM ingredients, recipes, menu WHERE recipes.id=:id AND ingredients.id = menu.ingredients_id And recipes.id = menu.recipes_id');
        $stmt->bindValue(':id', $recipe_id, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "<p class='recipe_details'><span>" . $row['name'] . ': '  . 'Ingredient List' . "</span>";
        echo '<br>';
        echo $row['food'] . '"' . "</p>";
        echo '<br/>';
        var_dump($recipe_id);
        ?>
    </body>
</html>
