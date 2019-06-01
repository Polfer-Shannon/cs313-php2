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


$newIngredient = htmlspecialchars($_POST['newIngredient']);
$addCategory = htmlspecialchars($_POST['newIngredient_text']);

$stmt = $db->prepare('INSERT INTO recipes(name, rank, date, user_id, directions) VALUES(:addRecipeName, :addRank, :addDateServed, :user_id, :addRecipeDirections);');
$stmt->bindValue(':addRecipeName', $add_recipe, PDO::PARAM_STR);
$stmt->bindValue(':addRank', $add_rank, PDO::PARAM_INT);
$stmt->bindValue(':addDateServed', $add_date, PDO::PARAM_STR);
$stmt->bindValue(':user_id', $users_id, PDO::PARAM_INT);
$stmt->bindValue(':addRecipeDirections', $add_directions, PDO::PARAM_STR);
$stmt->execute();
$recipe_id = $db->lastInsertId();

$_SESSION["recipe_id"] = $recipe_id;
$newIngredient = htmlspecialchars($_POST['newIngredient']);
$addCategory = htmlspecialchars($_POST['addCategory']);
$ingredients = $_POST['ingredients'];

foreach ($ingredients as $i) {
    $stmt = $db->prepare('INSERT INTO menu(recipes_id, ingredients_id) VALUES(:recipes_id, :ingredients_id);');
    $stmt->bindValue(':recipes_id', $recipe_id, PDO::PARAM_INT);
    $stmt->bindValue(':ingredients_id', $i, PDO::PARAM_INT);
    $stmt->execute();
}

    $stmt = $db->prepare('INSERT INTO ingredients(food, category) VALUES(:food, :category)');
    $stmt->bindValue(':food', $newIngredient, PDO::PARAM_STR);
    $stmt->bindValue(':category', $addCategory, PDO::PARAM_STR);
    $stmt->execute();
    $ingredients_id = $db->lastInsertId();

    $stmt = $db->prepare('INSERT INTO scrip_top(scriptures_id, topic_id) VALUES(:scriptures_id, :topic_id)');
    $stmt->bindValue(':scriptures_id', $scripture_id, PDO::PARAM_INT);
    $stmt->bindValue(':topic_id', $topic_id, PDO::PARAM_INT);
    $stmt->execute();

header("Location: addRecipes.php");    
  ?>     

