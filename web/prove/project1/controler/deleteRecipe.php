<?php

require '../dbConnect.php';
$db = get_db();
session_start();

$delete_id = ($_GET['id']);
$stmt = $db->prepare('DELETE FROM menu  WHERE recipes_id =:delete_id');
$stmt->bindValue(':delete_id', $delete_id, PDO::PARAM_INT);
$stmt->execute();

$stmt = $db->prepare('DELETE FROM recipes WHERE id =:delete_id');
$stmt->bindValue(':delete_id', $delete_id, PDO::PARAM_INT);
$stmt->execute();

header("Location: ../views/p1home.php"); 

?>