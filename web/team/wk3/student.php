<?php
$name = htmlspecialchars($_POST["name"]);
//$email = htmlspecialchars($_POST["email"]);
//$major = htmlspecialchars($_POST["major"]);
//$continent = $_POST["continent"];
//$comment = htmlspecialchars($_POST["comment"]);
?>
<html>
    <head>
        <title>Week 3 Team Assignment</title>  
        <meta charset="UTF-8">
        <meta name="viewport" >
        <link rel="stylesheet" type="text/css" href="form_style.css"> 
    </head>

    <body>
        <?php
//        stretch
        $map = array(
            "NA" => "North America",
            "SA" => "South America",
            "EU" => "Europe",
            "AS" => "Asia",
            "AR" => "Australian",
            "AF" => "Africa",
            "AT" => "Antarctica",
                )
        ?>
        <h1>Information for : <?= $name ?></h1><br>
        Your email address is: <?php
        $help = $_POST['email'];
        echo "<a href='mailto:" . $_POST["email"] . "?Subject=" . 'Hello' . "'>$help</a>";
        ?><br>

        Your Major is : <?php echo $_POST["major"]; ?><br>

        You commented : <?php echo $_POST["comment"]; ?><br>

        You have visited : <?php
//        foreach ($_POST["continent"] as $selected) {
//            echo $selected . ", ";
//        }

//        stretch
        if (isset($_POST["submit"])) {
            foreach ($_POST["continent"] as $selected) {
                foreach ($map as $x => $x_value)
                    if ($selected === $x)
                        echo $x_value;
                echo "" . ", ";
            }
        }
        ?><br>

    </body>
</html>


