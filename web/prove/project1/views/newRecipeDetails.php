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
                    <span class="heading-primary--sub pages">Favorite Family Recipes</span>
                </h1>
                <a href="../../../index.php" class="btn btn-outline-primary">&nbsp;&nbsp;&nbsp;&nbsp;Shannon Home&nbsp;&nbsp;&nbsp;&nbsp;</a>
                <a href="p1home.php" class="btn btn-outline-primary">&nbsp;&nbsp;&nbsp;&nbsp;Recipe Home&nbsp;&nbsp;&nbsp;&nbsp;</a>

            </div>
        </header>
        
         <div class="container">
            <?php
            //get user's first name to print
            echo "<h1>" . 'New Recipe for ' . $_SESSION['currentUser'] . "</h1>";
            ?> 
         </div>
          <div class="container">
        <!--        Display new recipe info-->
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

        $_SESSION['newRecipe'] = $row['name'];
        $_SESSION['newRecipeId'] = $row['id'];

        ?>
        </div>
        <div class="container">
        <a href="newIngredients.php" class="btn btn-primary">Add Ingredients To This Recipe</a>
        </div>
        
        <?php include ('../../common/footer.php'); ?>
    </body>
</html>

