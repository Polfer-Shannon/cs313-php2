<?php
require '../dbConnect.php';
$db = get_db();
session_start();
?>
<!DOCTYPE html>
<!--
New Ingredients page
-->
<html lang="en-us">
    <head>  
        <title>Add Ingredients</title>
        <meta charset="UTF-8"/>
        <meta name="author" content="Shannon Polfer">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">      
        <link href="../../css/project1.css" rel="stylesheet" type="text/css" 
              media="screen">
    </head>
    <body class="project">
        <header class="header__pages">
            <div class="header__text-box header__text-box--pages">
                <h1 class="heading-primary pages">
                    <span class="heading-primary--main pages">Organize</span>
                    <span class="heading-primary--sub pages">Favorite Family Recipes</span>
                </h1>
                <a href="../../../index.php" class="btn btn-outline-primary btn--white">&nbsp;&nbsp;&nbsp;&nbsp; Shannon Home&nbsp;&nbsp;&nbsp;&nbsp;</a>
                <a href="p1home.php" class="btn btn-outline-primary btn--white">&nbsp;&nbsp;&nbsp;&nbsp;Recipe Home&nbsp;&nbsp;&nbsp;&nbsp;</a>
            </div>
        </header> 

        <div class="container">
            <?php
            //get user's first name to print
            echo "<h1>" . 'Add Ingredients to New Recipe for ' . $_SESSION['currentUser'] . "</h1>";
//            print_r($_SESSION['currentUser']);
            ?> 
        </div>
        <div class="container">

            <div class="container">
                <?php
                //get user's first name to print
                echo "<h1>" . 'Recipe Name: ' . $_SESSION['newRecipe'] . "</h1>";
                ?> 
            </div>


            <!--            Form to add ingredients-->
            <div class="container">
                <form method="post" action="../controler/addIngredients.php">
                    <div class="form-group">

                        <table>
                            <th>Food</th>
                            <th>Category</th>
                            <th>On Hand</th>
                            <?php
                            $stmt = $db->query('SELECT * FROM ingredients ORDER BY food');
                            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            $stmt->execute();


                            foreach ($results as $row) {
                                ?>
                                <tr>
                                    <td> <input type="checkbox" name="ingredients[]" value="<?= $row['id']; ?>"> <?= $row['food']; ?> </td>
                                    <td> <?= $row['category']; ?></td>
                                    <td> <?= $row['on_hand']; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                        <br>
                        <label for="newIngredient">New Ingredient:</label> 
                        <input type="checkbox" name="newIngredient" value="true">
                        <input type="text" name="newIngredient_text" placeholder="Type new ingredient"> 

                        <input  class="form-control btn-primary" type="submit" value="Add Ingredients">
                    </div>
                </form>
            </div>
        </div>

        <footer>
        <?php include ('../../common/footer.php'); ?>
        </footer>
    </body>
</html>


