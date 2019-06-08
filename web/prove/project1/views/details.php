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
    <body>
        <header class="header__pages project1">
            <div class="header__text-box header__text-box--pages">
                <h1 class="heading-primary pages">
                    <span class="heading-primary--sub pages">Favorite Family Recipes</span>
                </h1>
                <a href="../../../index.php" class="btn btn-outline-primary">&nbsp;&nbsp;&nbsp;&nbsp;Shannon Home&nbsp;&nbsp;&nbsp;&nbsp;</a>
                <a href="p1home.php" class="btn btn-outline-primary">&nbsp;&nbsp;&nbsp;&nbsp;Recipe Home&nbsp;&nbsp;&nbsp;&nbsp;</a>

            </div>
        </header>
        <div class="container">
            <?php
            $recipe_id = $_GET['recipeLinks'];
            $stmt = $db->prepare('SELECT * FROM recipes WHERE id=:id');
            $stmt->bindValue(':id', $recipe_id, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            echo '<h2><span>' . $row['name'] . '</span></h2>';

            $recipe_id2 = $row['id'];
            $stmt2 = $db->prepare('SELECT ingredients.food FROM ingredients
        LEFT JOIN menu
        ON menu.ingredients_id = ingredients.id
        WHERE menu.recipes_id=:recipe_id');
            $stmt2->bindValue(':recipe_id', $recipe_id2, PDO::PARAM_INT);
            $stmt2->execute();
            $row2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
            echo '<h3>' . "Ingredient List" . '</h3>';
            foreach ($row2 as $r2) {
                echo '<p>' . $r2['food'] . '</p>';
            }

            echo '<h3>' . "Directions" . '</h3>';
            echo '<p>' . $row['directions'] . "</p>";
            ?>
        </div>
        
          <!--        Display new recipe info-->
          <div>
        <?php
        $recipes_id = $_SESSION["recipe_id"];
        $stmt = $db->prepare('SELECT * FROM recipes WHERE id=:recipes_id');
        $stmt->bindValue(':recipes_id', $recipes_id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "<h3>" . $row['name'] . "</h3>";
        echo "<h5>" . 'Family Rank: ' . $row['rank'] . "</h5>";
        echo "<h5>" . 'Last Served on: ' . $row['date'] . "</h5>";
        echo "<h4>" . 'Directions:' . "</h4>";
        echo "<p>" . $row['directions'] . "</p>";

        $stmt2 = $db->prepare('SELECT ingredients.food FROM ingredients LEFT JOIN menu ON menu.ingredients_id = ingredients.id WHERE menu.recipes_id =:recipes_id ORDER BY ingredients.food');
        $stmt2->bindValue(':recipes_id', $recipes_id, PDO::PARAM_INT);
        $stmt2->execute();
        $ingredients = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        echo "<h4>" . 'Ingredient List' . "</h4>";
        foreach ($ingredients as $i){ 
            echo "<p>" . $i['food'] . "</p>";
            echo '<br>';
        }
        ?>
        </div>
        
        <footer class="card-footer text-center footer-bg_color" >
            <?php include ('../../common/footer.php'); ?>
        </footer>
    </body>
</html>


