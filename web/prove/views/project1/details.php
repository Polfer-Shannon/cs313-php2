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
    <header class="header__pages project1">
            <div class="header__text-box header__text-box--pages">
                <h1 class="heading-primary pages">
                    <span class="heading-primary--sub pages">Favorite Family Recipes</span>
                </h1>
                <a href="p1home.php" class="btn btn--white btn--animated btn__pages">&nbsp;&nbsp;&nbsp;&nbsp;Recipe Home&nbsp;&nbsp;&nbsp;&nbsp;</a>
                
            </div>
        </header>
    <body>
        <!--        <header>
                    
                </header>-->
        <?php
        $recipe_id = $_GET['recipeLinks'];
        $stmt = $db->prepare('SELECT * FROM recipes WHERE id=:id');
        $stmt->bindValue(':id', $recipe_id, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);



        echo "<p class='recipe_details'><span>" . $row['name'] . ': ' . 'Directions' . "</span>";
        echo '<br>';
        echo $row['directions'] . '"' . "</p>";
        echo '<br/>';
        
        
        $recipe_id2 = $_GET['recipeLinks'];
        $stmt2 = $db->prepare('SELECT ingredients.food FROM ingreidents INNER JOIN (recipes INNER JOIN menu ON recipes.id = menu.recipes_id) ON ingredients.id = menu.ingredients_id WHERE recipes.id=:id');
        $stmt2->bindValue(':id', $recipe_id2, PDO::PARAM_STR);
        $stmt2->execute();
       $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
       echo "<p class='recipe_details'><span>" . $row['name'] . ': ' . 'Ingredient List' . "</span>";
        echo '<br>';
        echo $row2['food'] . '"' . "</p>";       echo '<br/>';
        
        
        ?>
         <footer>
            <?php include ('../../common/footer.php'); ?>
        </footer>
    </body>
</html>

       $recipe_id2 = $_GET['recipeLinks'];
        $stmt2 = $db->prepare('SELECT ingredients.food FROM ingreidents INNER JOIN (recipes INNER JOIN menu ON recipes.id = menu.recipes_id) ON ingredients.id = menu.ingredients_id WHERE recipes.id=:id');
        $stmt2->bindValue(':id', $recipe_id2, PDO::PARAM_STR);
        $stmt2->execute();
       $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
       echo "<p class='recipe_details'><span>" . $row['name'] . ': ' . 'Ingredient List' . "</span>";
        echo '<br>';
        echo $row['rank'] . '"' . "</p>";       echo '<br/>';
