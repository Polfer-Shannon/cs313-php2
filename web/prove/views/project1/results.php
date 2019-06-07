<?php
require 'dbConnect.php';
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
        <script src="../../js/homejs.js"></script>
    </head>
    <body>
        <header class="header__pages project1">
            <div class="header__text-box header__text-box--pages">
                <h1 class="heading-primary pages">
                    <span class="heading-primary--sub pages">Favorite Family Recipes</span>
                </h1>
                <a href="../../../index.php" class="btn btn-outline-primary">&nbsp;&nbsp;&nbsp;&nbsp;Shannon Home&nbsp;&nbsp;&nbsp;&nbsp;</a>
                <a href="p1home.php" class="btn btn-outline-primary">&nbsp;&nbsp;&nbsp;&nbsp;Recipe Home&nbsp;&nbsp;&nbsp;&nbsp;</a>

            </div>
        </header>
        <div class="container">
            <?php
            //get and print data from database
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
                    echo '<tr><td><a class="btn btn-primary" href="deleteRecipe.php?id=' . $r['id'] . '">' . 'Delete' . '</a></td>';
                    echo '<td><span><a class="recipes" href="details.php?recipeLinks=' . $r['id'] . '">' . $r['name'] . '</a></span></td></tr>';
                     
                }
            }
            echo '</table>';
            ?>
            
                
        </div>
        <!--        <br>
        
                <form method="post" action="results.php">
                                <label for="rank">Enter 1 to Order by Rank :</label>
                    <br>
                                <label for="rank">Enter 2 to Order by Date :</label>
                    <input class="input_box ib_big" type="text" name="order" placeholder="Enter '1' for rank or '2' for date">
                    <input class="btn btn--white btn--animated btn_color" type="submit" value="Change List Order">
                </form>    -->

        <?php
//        //get and print data from database
//        $order = $_POST['order'];
//        $stmt = $db->query('SELECT * FROM recipes ORDER BY rank');
//        $stmt->execute();
//        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//        $order2 = $_POST['order'];
//        $stmt2 = $db->query('SELECT * FROM recipes ORDER BY date');
//        $stmt2->execute();
//        $rows2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
//
//        foreach ($rows as $r) {
//            if ($order = 1) {
//                echo '<span class="r_list"><a href="details.php?recipeLinks=' . $r['id'] . '">' . $r['rank'] . $r['name'] . '</a></span>';
//                echo '<br>';
//            }
//        }
//        
//        foreach ($rows2 as $r2) {
//            if ($order2 = 2){
//            echo '<span class="r_list"><a href="details.php?recipeLinks=' . $r['id'] . '">' . $r['date'] . $r['name'] . '</a></span>';
//            echo '<br>';
//        }
//        }
        ?> 
        <footer class="card-footer text-center footer-bg_color" >
            <?php include ('../../common/footer.php'); ?>
        </footer>

    </body>
</html>

