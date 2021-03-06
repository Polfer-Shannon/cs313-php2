<?php
require 'dbConnect.php';
$db = get_db();

session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    header("Location: login.php");
    die(); // we always include a die after redirects.
}
?>
<!DOCTYPE html>
<!--
Team Week 7
-->
<html lang="en-us">
    <head>  
        <title>SP Home</title>
        <meta charset="UTF-8"/>
        <meta name="author" content="Shannon Polfer">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    

        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
        <link href="wk7.css" rel="stylesheet" type="text/css" media="screen">
        <script src="../../js/homejs.js"></script>
    </head>

    <body class="text-center">
        <header>

        </header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
            <a class="navbar-brand" href="../../prove/views/assignments.php">Assignments Page</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login Page</a>
                    </li>

                </ul>

            </div>
        </nav>
        <div>

            <h1>Welcome to the homepage!</h1>

            Your username is: <?= $username ?><br /><br />

            <a href="signOut.php">Sign Out</a>
        </div>
    </body>
</html>


