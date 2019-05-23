<?php
require "dbConnect.php";
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
            <h1>Results Page</h1>

        </header>



        <div>
          

            <?php
            $book = $_POST['book'];
            $stmt = $db->prepare('SELECT * FROM scriptures WHERE book=:book');
            $stmt->bindValue(':book', $book, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $r) {
                echo '<p><a href="details.php?scripture=' . $r['id'] . '">';
                echo $r['book'] . ' ';
                echo $r['chapter'];
                echo ':' . $r['verse'];
                echo '</a></p>';
            }
            ?>

        </div>
    </body>
</html>

