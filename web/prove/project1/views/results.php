<?php
require '../dbConnect.php';
$db = get_db();
session_start();
?>
<!DOCTYPE html>
<!--
Personal Home Page
-->
<html lang="en-us">
    <head>   
        <meta charset="UTF-8"/>
        <meta name="author" content="Shannon Polfer">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SP Home</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
        <link href="../../css/project1.css" rel="stylesheet" type="text/css" 
              media="screen">
        
    </head>
    <body class="project">
        <header class="header__pages project1">
            <div class="header__text-box header__text-box--pages">
                <h1 class="heading-primary pages">
                    <span class="heading-primary--main pages">Organize</span>
                    <span class="heading-primary--sub pages">Favorite Family Recipes</span>
                </h1>
                <a href="../../../index.php" class="btn btn-outline-primary btn--white">&nbsp;&nbsp;&nbsp;&nbsp;Shannon Home&nbsp;&nbsp;&nbsp;&nbsp;</a>
                <a href="p1home.php" class="btn btn-outline-primary btn--white">&nbsp;&nbsp;&nbsp;&nbsp;Recipe Home&nbsp;&nbsp;&nbsp;&nbsp;</a>

            </div>
        </header>
        <div class="container">
            <?php
            //get and print user's first name from database
            $user2 = htmlspecialchars($_POST['username']);
            $stmt2 = $db->prepare('SELECT * FROM users WHERE username=:username');
            $stmt2->bindValue(':username', $user2, PDO::PARAM_STR);
            $stmt2->execute();
            $rows2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows2 as $row) {

                echo '<h1 class="recipe_list__title">' . 'Recipes for ' . $row['first_name'] . '</h1>';
                echo '<br>';
                echo '<p>' . 'Click on a recipe to view directions:' . '</p>';

                $user_id = $row['id'];
                $_SESSION["users_id"] = $user_id;

                $stmt = $db->prepare('SELECT * FROM recipes WHERE user_id=:user ORDER BY name');
                $stmt->bindValue(':user', $user_id, PDO::PARAM_INT);
                $stmt->execute();
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo '<table>';
                foreach ($rows as $r) {
                    echo '<tr><td><a class="btn btn-outline-primary btn--white" href="../controler/deleteRecipe.php?id=' . $r['id'] . '">' . 'Delete' . '</a></td>';
                    echo '<td><span><a class="recipes" href="details.php?recipeLinks=' . $r['id'] . '">' . $r['name'] . '</a></span></td></tr>';
                     
                }
            }
            echo '</table>';
            ?>
            
                
        </div> 
       
            <?php include ('../../common/footer.php'); ?>
       

    </body>
</html>

