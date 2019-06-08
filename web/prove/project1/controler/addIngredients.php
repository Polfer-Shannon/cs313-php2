<?php

require '../dbConnect.php';
$db = get_db();
session_start();


$ingredients = $_POST['ingredients'];

$newIngredient = htmlspecialchars($_POST['newIngredient']);
$newIngredient_text = htmlspecialchars($_POST['newIngredient_text']);

$_SESSION['newRecipeId'] = $recipe_id;

foreach ($ingredients as $i) {
    $stmt = $db->prepare('INSERT INTO menu(recipes_id, ingredients_id) VALUES(:recipes_id, :ingredients_id)');
    $stmt->bindValue(':recipes_id', $recipe_id, PDO::PARAM_INT);
    $stmt->bindValue(':ingredients_id', $i, PDO::PARAM_INT);
    $stmt->execute();
}


if ($newIngredient == "true"){
    $stmt = $db->prepare('INSERT INTO ingredients(food) VALUES(:food)');
    $stmt->bindValue(':food', $newIngredient_text, PDO::PARAM_STR);
    $stmt->execute();
    $ingredients_id = $db->lastInsertId();

    $stmt = $db->prepare('INSERT INTO menu(recipes_id, ingredients_id) VALUES(:recipes_id, :ingredients_id)');
    $stmt->bindValue(':recipes_id', $recipe_id, PDO::PARAM_INT);
    $stmt->bindValue(':ingredients_id', $ingredients_id, PDO::PARAM_INT);
    $stmt->execute();
}

header("Location: ../views/newIngredientsDetails.php");


?>  