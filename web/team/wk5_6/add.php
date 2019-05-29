<?php
require 'dbConnect.php';
$db = get_db();
?>
 <?php
        $add_book = htmlspecialchars($_POST['add_book']);
        $add_chapter = htmlspecialchars($_POST['add_chapter']);
        $add_verse = htmlspecialchars($_POST['add_verse']);
        $add_content = htmlspecialchars($_POST['add_content']);
        
            $stmt = $db->prepare('INSERT INTO scriptures(book, chapter, verse, content) VALUES(:add_book, :add_chapter, :add_verse, :add_content);');
            $stmt->bindValue(':add_book', $add_book, PDO::PARAM_STR);
            $stmt->bindValue(':add_chapter', $add_chapter, PDO::PARAM_INT);
            $stmt->bindValue(':add_verse', $add_verse, PDO::PARAM_INT);
            $stmt->bindValue(':add_content', $add_content, PDO::PARAM_STR);
            $stmt->execute();
            
        
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
