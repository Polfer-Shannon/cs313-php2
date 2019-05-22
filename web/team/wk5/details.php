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
            <h1>Details Page</h1>

        </header>

        <?php
        $scriptureid = $_GET['scripture'];
        $stmt = $db->prepare('SELECT * FROM scriptures WHERE id=:id');
        $stmt->bindValue(':id', $scriptureid, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "<p><span>" . $row['book'] . ' ';
        echo $row['chapter'];
        echo ':' . $row['verse'] . ' - ' . "</span>";
        echo '"' . $row['content'] . '"' . "</p>";
        echo '<br/>';
        ?>
    </body>
</html>