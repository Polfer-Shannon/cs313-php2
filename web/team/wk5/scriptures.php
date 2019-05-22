<?php
require 'dbConnect.php';
$db = get_db();
?>


<html>
    <head>
        <title>Week 5 Team Assignment</title>  
        <meta charset="UTF-8">
        <meta name="viewport" >
        <link rel="stylesheet" type="text/css" href="scriptures.css"> 
    </head>
    <body>
        <header>
            <h1>Scripture Resources</h1>

        </header>


        <?php
        //Example 1 get and print data from database
//        foreach ($db->query('SELECT * FROM scriptures') as $row) {
//            echo "<span>" . $row['book'] .  ' ' . $row['chapter'] . ':' . $row['verse'] . ' - ' . "</span>" . '"' . $row['content'] . '"';
//            echo '<br>';
//        }
//        echo '<br>';
        ?>

        <?php
        //Example 2 get and print data from database
//        $statement = $db->query('SELECT book, chapter, verse, content FROM scriptures');
//        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
//            echo "<span>" . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . ' - ' . "</span>" . '"' . $row['content'] . '"';
//            echo '<br>';
//        }
//        echo '<br>';
        ?>

        <?php
        //Example 3 get and print data from database
        $statement = $db->query('SELECT book, chapter, verse, content FROM scriptures');
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $row) {
            echo "<span>" . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . ' - ' . "</span>" . '"' . $row['content'] . '"';
            echo '<br>';
        }
        ?>

        <div>
            <form method="post" action="results.php">
                <label for="book">Search for Book:</label>
                <input type="text" name="book">
                <input type="submit" value="search">

            </form>

            <div>

                <?php
//         $book = $_POST["book"]; 
//         $statement = $db->query('SELECT book, chapter, verse, content FROM scriptures WHERE book = :book');
//         $statement->execute([$book]);
//         
//         $results = $statement->fetchAll(PDO::FETCH_ASSOC);
//         foreach ($results as $row) {
//            echo "<span>" . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . ' - ' . "</span>" . '"' . $row['content'] . '"';
//            echo '<br>';
//        }
                ?>
            </div>
        </div>
    </body>
</html>