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
         $statement = $db->query('SELECT book, chapter, verse, content FROM scriptures WHERE book = :book');
         $statement->execute([$book]);
         
         $results = $statement->fetchAll(PDO::FETCH_ASSOC);
         foreach ($results as $row) {
            echo "<span>" . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . ' - ' . "</span>" . '"' . $row['content'] . '"';
            echo '<br>';
        }
        
        ?>
        
        </div>
    </body>
</html>

