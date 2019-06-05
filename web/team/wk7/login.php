<?php
require 'dbConnect.php';
$db = get_db();
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
            <a class="navbar-brand" href="../../prove/views/assignments.php">Assignments Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a href="accountIndex.php?action=registration" title='Create an account'
                       class="nav-link">Create an Account</a>
                        
                    </li>

                </ul>

            </div>
        </nav>

        <form class="form-signin">
            <div class="form-group">
                <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                <label for="username" class="sr-only">Username</label>
                <input type="text" name="username"  class="form-control" placeholder="Username">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password"  class="form-control" placeholder="Password" required>

                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </div>

        </form>
    </body>
</html>

