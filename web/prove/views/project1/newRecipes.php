   <?php
require 'dbConnect.php';
$db = get_db();
?>   

  <?php
        $add_recipe = htmlspecialchars($_POST['addRecipeName']);
        $add_rank = htmlspecialchars($_POST['addRank']);
        $add_date = htmlspecialchars($_POST['addDateServed']);
        $user_id = $row['id'];
        $add_directions = htmlspecialchars($_POST['addRecipeDirections']);
        
        var_dump($user_id);
        var_dump($add_recipe);
        var_dump($add_rank);
        var_dump($add_date);
        var_dump($add_directions);
//        $stmt = $db->prepare('INSERT INTO recipes(name, rank, date, user_id,  directions,) VALUES(:addRecipeName, :addRank, :addDateServed, :user_id, :addRecipeDirections,);');
//        $stmt->bindValue(':addRecipeName', $add_recipe, PDO::PARAM_STR);
//        $stmt->bindValue(':addRank', $add_rank, PDO::PARAM_INT);
//        $stmt->bindValue(':addDateServed', $add_date, PDO::PARAM_STR);
//        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
//        $stmt->bindValue(':addRecipeDirections', $add_directions, PDO::PARAM_STR);
//        $stmt->execute();
//        $recipe_id = $db->lastInsertId();
        
//        foreach ($menu as $m){
//            $stmt = $db->prepare('INSERT INTO menu(recipes_id, ingredients_id) VALUES(:recipies_id, :ingredients_id);');
//            $stmt->bindValue(':recipies_id', $recipe_id, PDO::PARAM_INT);
//            $stmt->bindValue('ingredients_id', $m, PDO::PARAM_INT);
//            $stmt->execute();
//        }
        
       

