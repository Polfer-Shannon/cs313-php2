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
        <title>Add Recipes</title>
        <meta charset="UTF-8"/>
        <meta name="author" content="Shannon Polfer">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">      
<!--        <link href="../../css/home_style.css" rel="stylesheet" type="text/css" 
              media="screen">
        <link href="../../css/project1.css" rel="stylesheet" type="text/css" 
              media="screen">-->
        <script src="../../js/homejs.js"></script>
    </head>
    <body>
        <header class="header__pages">
            <div class="header__text-box header__text-box--pages">
                <h1 class="heading-primary pages">
                    <span class="heading-primary--main pages">Add New</span>
                    <span class="heading-primary--sub pages">Favorite Family Recipes</span>
                </h1>
                <a href="../../../index.php" class="btn btn--white btn--animated btn__pages">&nbsp;&nbsp;&nbsp;&nbsp;Home&nbsp;&nbsp;&nbsp;&nbsp;</a>
            </div>
        </header> 
        <div>
            <?php
        //get and print data from database
        $user2 = htmlspecialchars($_POST['username']);
        $stmt2 = $db->prepare('SELECT * FROM users WHERE username=:username');
        $stmt2->bindValue(':username', $user2, PDO::PARAM_STR);
        $stmt2->execute();
        $rows2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows2 as $row) {
           
                echo '<h1>' . 'New Recipes for ' . $row['first_name'] . '</h1>';
                echo '<br>';
                echo '<p>' . 'Please fill out the top form before adding ingredients:' . '</p>';
                            
        }
        ?> 
        </div>
        <div class="container">
            <form method="post" action="addRecipes.php">
                <div class="form-group">    
                    <label for="addRecipeName">Recipe Name:</label>
                    <input  class="form-control" type="text" name="addRecipeName" placeholder="Recipe Name">
                    <label for="addRecipeDirections">Directions:</label>
                    <textarea  class="form-control" type="text" name="addRecipeDirections" placeholder="Directions"></textarea>
                    <label for="addRank">How much does your family like this recipe? (Rank 1 to 5):</label>
                    <input  class="form-control" type="text" name="addRank" placeholder="Family Rank">
                    <label for="addDateServed">When did you last serve this recipe to your family?:</label>
                    <input  class="form-control" type="date" name="addDateServed" placeholder="mm/dd/yyy">
                    <br>
                    <input  class="form-control btn-primary" name="newRecipe" type="submit" value="Add Recipe">
                    
                </div>
            </form>
           
            
        </div>
        <?php
        $add_recipe = htmlspecialchars($_POST['addRecipeName']);
        $add_rank = htmlspecialchars($_POST['addRank']);
        $add_date = htmlspecialchars($_POST['addDateServed']);
        $user_id = $row['id'];
        $add_directions = htmlspecialchars($_POST['addRecipeDirections']);
        
        $stmt = $db->prepare('INSERT INTO recipes(name, rank, date, user_id,  directions,) VALUES(:addRecipeName, :addRank, :addDateServed, :user_id, :addRecipeDirections,);');
        $stmt->bindValue(':addRecipeName', $add_recipe, PDO::PARAM_STR);
        $stmt->bindValue(':addRank', $add_rank, PDO::PARAM_INT);
        $stmt->bindValue(':addDateServed', $add_date, PDO::PARAM_STR);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
        $stmt->bindValue(':addRecipeDirections', $add_directions, PDO::PARAM_STR);
        $stmt->execute();
        $recipe_id = $db->lastInsertId();
        
//        foreach ($menu as $m){
//            $stmt = $db->prepare('INSERT INTO menu(recipes_id, ingredients_id) VALUES(:recipies_id, :ingredients_id);');
//            $stmt->bindValue(':recipies_id', $recipe_id, PDO::PARAM_INT);
//            $stmt->bindValue('ingredients_id', $m, PDO::PARAM_INT);
//            $stmt->execute();
//        }
        var_dump($user_id);
        ?>
        <footer>
            <?php include ('../../common/footer.php'); ?>
        </footer>
    </body>
</html>

