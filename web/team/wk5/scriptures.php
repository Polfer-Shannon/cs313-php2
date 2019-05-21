<html>
    <head>
        <title>Week 3 Team Assignment</title>  
        <meta charset="UTF-8">
        <meta name="viewport" >
        <link rel="stylesheet" type="text/css" href="form_style.css"> 
    </head>
    <body>
    <header>
        <h1>Scripture Resources</h1>
        
    </header>
    

<?php
try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
?>
        
        <?php 
foreach ($db->query('SELECT * FROM scriptures') as $row)
{
    echo $row['book'] . $row['chapter'] .':' . $row['verse'] . '-' . '"' . $row['content'] . '"';
}
        ?>
    </body>
</html>