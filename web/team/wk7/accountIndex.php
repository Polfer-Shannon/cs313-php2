<?php
require 'dbConnect.php';
$db = get_db();

session_start();
?>

<?php
//Get input from signup form
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

if (!isset($username) || $username == "" || !isset($password) || $password == ""){
    header("Location: signUp.php");
    die(); // alwasy die after redirect
}

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $db->prepare('INSERT INTO client(username, password) VALUES(:username, :password)');
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $hash, PDO::PARAM_STR);
$stmt->execute();

header("Location: login.php"); 
die();

?>

 $_SESSION['badLogin'] = $badLogin;
 ?>