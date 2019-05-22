<?php
require "scriptures.php";
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
            You commented : <?php echo $_POST["book"]; ?><br>

            <?php
            $book = $_POST["book"];
            $stmt = $db->prepare('SELECT * FROM scriptures WHERE book=:book');
            $stmt->bindValue(':book', $book, PDO::PARAM_STR);
            $statement->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $r) {
                echo '<p><a href="display.php?scripture=' . $r['id'] . '">';
                echo $r['chapter'];
                echo ':' . $r['verse'];
                echo '</a></p>';
            }
            ?>

        </div>
    </body>
</html>

