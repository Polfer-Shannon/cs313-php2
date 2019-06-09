<?php
require '../dbConnect.php';
$db = get_db();
session_start();
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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
        <link href="../../css/project1.css" rel="stylesheet" type="text/css" 
              media="screen">
    </head>
    <body class="project">
        <header class="header__pages project1">
            <div class="header__text-box header__text-box--pages">
                <h1 class="heading-primary pages">
                    <span class="heading-primary--main pages">Organize</span>
                    <span class="heading-primary--sub pages">Favorite Family Recipes</span>
                </h1>
                <a href="../../../index.php" class="btn btn-outline-primary btn--white">&nbsp;&nbsp;&nbsp;&nbsp;Shannon Home&nbsp;&nbsp;&nbsp;&nbsp;</a>
                <a href="p1home.php" class="btn btn-outline-primary btn--white">&nbsp;&nbsp;&nbsp;&nbsp;Recipe Home&nbsp;&nbsp;&nbsp;&nbsp;</a>

            </div>
        </header>
         <div class="container">
            <?php
            //get user's first name to print
            echo "<h1>" . 'Ingredient list for New Recipe for ' . $_SESSION['currentUser'] . "</h1>";
            ?> 
        </div>
     

            <div class="container">
                <?php
                //get user's first name to print
                echo "<h1>" . 'Recipe Name: ' . $_SESSION['newRecipe'] . "</h1>";
                ?> 
            </div>
  
        <div class="container">
            <!--        Display new ingredient info-->

            <?php
            $recipes_id = $_SESSION['newRecipeId'];
            
            $stmt2 = $db->prepare('SELECT ingredients.food FROM ingredients LEFT JOIN menu ON menu.ingredients_id = ingredients.id WHERE menu.recipes_id =:recipes_id');
            $stmt2->bindValue(':recipes_id', $recipes_id, PDO::PARAM_INT);
            $stmt2->execute();
            $ingredients = $stmt2->fetchAll(PDO::FETCH_ASSOC);
            echo "<h4>" . 'Ingredient List' . "</h4>";
            foreach ($ingredients as $i) {
                echo "<p>" . $i['food'] . "</p>";
                echo '<br>';
            }
            ?>
            
            <div class="container">
                <p>Click the Recipe Home button above to view this new recipe from your recipe list.</p>
            </div>
        </div>
        
        <?php include ('../../common/footer.php'); ?>
    </body>
</html>