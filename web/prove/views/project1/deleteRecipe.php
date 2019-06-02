<?php

require 'dbConnect.php';
$db = get_db();
session_start();

$id = filter_var($_GET['id']);
$stmt = $db->prepare('DELETE FROM menu  WHERE recipes_id = ' . $id);
$stmt->execute();

$stmt = $db->prepare('DELETE FROM recipes WHERE id = ' . $id);
$stmt->execute();

header("Location: p1home.php"); 

