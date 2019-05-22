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
        try {
            // default Heroku Postgres configuration URL
            $dbUrl = getenv('DATABASE_URL');

            // Get the various parts of the DB Connection from the URL
            $dbOpts = parse_url($dbUrl);

            $dbHost = $dbOpts["host"];
            $dbPort = $dbOpts["port"];
            $dbUser = $dbOpts["user"];
            $dbPassword = $dbOpts["pass"];
            $dbName = ltrim($dbOpts["path"], '/');
            
            // Create the PDO connection
            $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
            
            // This line makes PDO give us an exception when there are problems, and can be very helpful in debugging
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            // If this were in production, you would not want to echo
            // the details of the exception.
            //echo "Error connecting to DB. Details: $ex"; //(without getMessage();
            echo 'Error!: ' . $ex->getMessage();
            die();
        }
        ?>

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
//        $statement = $db->query('SELECT book, chapter, verse, content FROM scriptures');
//        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
//        foreach ($results as $row) {
//            echo "<span>" . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . ' - ' . "</span>" . '"' . $row['content'] . '"';
//            echo '<br>';
//        }
        ?>
        
        <div>
            <form method="post" action="results.php">
            <label for="book">Search for Book:</label>
            <input type="text" name="book">
            <input type="submit" name="submit">
           
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