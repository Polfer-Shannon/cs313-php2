<?php
require 'dbConnect.php';
$db = get_db();

session_start();


//Get input from signup form
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

$stmt = $db->prepare('INSERT INTO client(username, password VALUES ):username, :password');
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$stmt->execute();

header("Location: login.php"); 