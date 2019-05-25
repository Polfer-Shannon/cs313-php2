<?php
require 'dbConnect.php';
$db = get_db();
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
        <link href="../../css/home_style.css" rel="stylesheet" type="text/css" 
              media="screen">
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
                <a href="../../../index.php" class="btn btn--white btn--animated btn__pages">&nbsp;&nbsp;&nbsp;&nbsp;Recipe Home&nbsp;&nbsp;&nbsp;&nbsp;</a>
            </div>
        <?php
        //get and print data from database
        $user = $_POST['username'];
        $stmt = $db->prepare('SELECT * FROM recipes WHERE user_id=:user ORDER BY name');
        $stmt->bindValue('user', $user, PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $user2 = $_POST['username'];
        $stmt2 = $db->prepare('SELECT * FROM users WHERE id=:id');
        $stmt2->bindValue('id', $user2, PDO::PARAM_STR);
        $stmt2->execute();
        $rows2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows2 as $r2) {
            echo '<h1 class="recipe_list__title">' . 'Recipes for ' . $r2['first_name'] . '</h1>';
        }
        foreach ($rows as $r) {
            echo '<span class="r_list"><a href="details.php?recipeLinks=' . $r['id'] . '">' . $r['name'] . '</a></span>';
            echo '<br>';
        }
        ?> 
        <br>

        <form method="post" action="results.php">
            <!--            <label for="rank">Enter 1 to Order by Rank :</label>-->
            <br>
            <!--            <label for="rank">Enter 2 to Order by Date :</label>-->
            <input class="input_box ib_big" type="text" name="order" placeholder="Enter '1' for rank or '2' for date">
            <input class="btn btn--white btn--animated btn_color" type="submit" value="Change List Order">
        </form>    

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


    </body>
</html>

