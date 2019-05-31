<?php

require 'dbConnect.php';
$db = get_db();
session_start();
?>   

<?php

$add_recipe = htmlspecialchars($_POST['addRecipeName']);
$add_rank = htmlspecialchars($_POST['addRank']);
$add_date = htmlspecialchars($_POST['addDateServed']);
$users_id = $_SESSION["users_id"];
$add_directions = htmlspecialchars($_POST['addRecipeDirections']);


$stmt = $db->prepare('INSERT INTO recipes(name, rank, date, user_id, directions,) VALUES(:addRecipeName, :addRank, :addDateServed, :user_id, :addRecipeDirections,);');
$stmt->bindValue(':addRecipeName', $add_recipe, PDO::PARAM_STR);
$stmt->bindValue(':addRank', $add_rank, PDO::PARAM_INT);
$stmt->bindValue(':addDateServed', $add_date, PDO::PARAM_STR);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':addRecipeDirections', $add_directions, PDO::PARAM_STR);
$stmt->execute();
$recipe_id = $db->lastInsertId();

echo $add_recipe;
echo $add_rank;
echo $add_date;
echo $user_id;
echo $add_directions;
echo $recipe_id;

//foreach ($menu as $m) {
//    $stmt = $db->prepare('INSERT INTO menu(recipes_id, ingredients_id) VALUES(:recipies_id, :ingredients_id);');
//    $stmt->bindValue(':recipies_id', $recipe_id, PDO::PARAM_INT);
//    $stmt->bindValue(':ingredients_id', $m, PDO::PARAM_INT);
//    $stmt->execute();
//}
    header("Location: addRecipes.php");    
  ?>     

