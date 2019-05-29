        <?php

$content = htmlspecialchars($_POST['add_content']);
//            $stmt = $db->prepare('SELECT * FROM scriptures WHERE book=:book');
//            $stmt->bindValue(':book', $book, PDO::PARAM_STR);
//            $stmt->execute();
//            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
//            foreach ($rows as $r) {
//                echo '<p><a href="details.php?scripture=' . $r['id'] . '">';
//                echo $r['book'] . ' ';
//                echo $r['chapter'];
//                echo ':' . $r['verse'];
//                echo '</a></p>';
//            }

echo $content;
?>
<html>
    <head>
        <title>Week 6 Team Assignment</title>  
        <meta charset="UTF-8">
        <meta name="viewport" >
        <link rel="stylesheet" type="text/css" href="scriptures.css"> 
    </head>
    <body>
        <header>
            <h1>Add Scripture and Topic</h1>

        </header>
                <?php
$add_script = htmlspecialchars($_POST['addScripture']);
$content = htmlspecialchars($_POST['add_content']);
//            $stmt = $db->prepare('SELECT * FROM scriptures WHERE book=:book');
//            $stmt->bindValue(':book', $book, PDO::PARAM_STR);
//            $stmt->execute();
//            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
//            foreach ($rows as $r) {
//                echo '<p><a href="details.php?scripture=' . $r['id'] . '">';
//                echo $r['book'] . ' ';
//                echo $r['chapter'];
//                echo ':' . $r['verse'];
//                echo '</a></p>';
//            }

echo $add_script;
?>
    </body>
</html>