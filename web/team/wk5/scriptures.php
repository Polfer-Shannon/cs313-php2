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
            $dbUrl = getenv('DATABASE_URL');

            $dbOpts = parse_url($dbUrl);

            $dbHost = $dbOpts["host"];
            $dbPort = $dbOpts["port"];
            $dbUser = $dbOpts["user"];
            $dbPassword = $dbOpts["pass"];
            $dbName = ltrim($dbOpts["path"], '/');

            $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            echo 'Error!: ' . $ex->getMessage();
            die();
        }
        ?>

        <?php
        foreach ($db->query('SELECT * FROM scriptures') as $row) {
            echo "<p>" . $row['book'] . "</p>" . $row['chapter'] . ':' . $row['verse'] . '-' . '"' . $row['content'] . '"';
            echo '<br>';
        }
        echo '<br>';
        ?>

        <?php
        $statement = $db->query('SELECT book, chapter, verse, content FROM scriptures');
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            echo 'Scripture: ' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . ' ' . '"' . $row['content'] . '"';
            echo '<br>';
        }
        echo '<br>';
        ?>

        <?php
        $statement = $db->query('SELECT book, chapter, verse, content FROM scriptures');
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $row) {
            echo $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . ' ' . '"' . $row['content'] . '"';
            echo '<br>';
        }
        ?>
    </body>
</html>