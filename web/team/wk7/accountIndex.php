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
 <?php
 $badLogin = false;
 
 //Check for post variables. If  not continue
if (isset($_POST['clientUsername']) && isset($_POST['clientPassword'])){
    //they have submitted a username and password to check
    $username = htmlspecialchars($_POST['clientUsername']);
    $password = htmlspecialchars($_POST['clientPassword']);
    
    $stmt = $db->prepare('SELECT password FROM client WHERE username=:username');
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $result = $stmt->execute();
    
    if ($result){
        $row = $stmt->fetch();
        $hashedPasswordFromDB = $row['password'];
        
        //now check to see if the hashed password matches
        if (password_verify($password, $hashedPasswordFromDB)){
            
            // password was correct, put the user on the session, and redirect to home
            $_SESSION['username'] = $username;
            header("Location: home.php");
            die(); //always include a die after redirects
        }else{
            $badLogin = true;
        }
    }else{
        $badLogin = true;
    }
    
}
 $_SESSION['badLogin'] = $badLogin;
 ?>