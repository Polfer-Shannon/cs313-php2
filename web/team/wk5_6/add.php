<?php
require 'dbConnect.php';
$db = get_db();
?>
<?php
            $add_script = htmlspecialchars($_POST['addScripture']);
            $stmt = $db->prepare('SELECT * FROM scriptures WHERE book=:book');
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

<html>
    <head>
        <title>Week 5 Team Assignment</title>  
        <meta charset="UTF-8">
        <meta name="viewport" >
        <link rel="stylesheet" type="text/css" href="scriptures.css"> 
    </head>
    <body>
        <header>
            <h1>Add Scripture and Topic</h1>

        </header>


        <div>
            <form method="post" action="add.php">
                
                <label for="add_book">Add a book</label>
                <input type="text" name="add_book">
                
                <label for="add_chapter">Add a chapter</label>
                <input type="text" name="add_chapter">
                
                <label for="add_verse">Add a verse</label>
                <input type="text" name="add_verse">
                
                <label for="add_content">Add content</label>
                <textarea rows="6" cols="50" name="add_content"></textarea>
                
                
                <input type="submit" value="addScripture">

            </form>


            
            
            
        </div>
    </body>
</html>
