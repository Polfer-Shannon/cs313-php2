<?php
//require 'dbConnect.php';
//$db = get_db();
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
            <form method="post" action="llist_all.php">

<!--                <label for="add_book">Add a book</label>
                <input type="text" name="add_book">

                <label for="add_chapter">Add a chapter</label>
                <input type="text" name="add_chapter">

                <label for="add_verse">Add a verse</label>
                <input type="text" name="add_verse">-->

                <label for="add_content">Add content</label>
                <textarea rows="6" cols="50" name="add_content"></textarea>


                <input type="submit" value="addScripture">

            </form>

        </div>
        

        
    </body>
</html>
