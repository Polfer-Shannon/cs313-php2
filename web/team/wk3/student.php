<?php $name = htmlspecialchars($_POST["name"]);
//$email = htmlspecialchars($_POST["email"]);
//$major = htmlspecialchars($_POST["major"]);
//$continent = $_POST["continent"];
//$comment = htmlspecialchars($_POST["comment"]);

?>

<html>
    <body>
        <?php
        $map = array(
            "NA" => "The continent of North America",
            "SA" => "South America",
            "EU" => "Europe",
            "AS" => "Asia",
            "AR" => "Australian",
            "AF" => "Africa",
            "AT" => "and Antarctica(Why would you go here?)",
            )
        ?>
        <p>Information for : <?= $name ?></p><br>
        Your email address is: <?php echo $_POST["email"]; ?><br>
        Your Major is : <?php echo $_POST["major"]; ?><br>

        You commented : <?php echo $_POST["comment"]; ?><br>
        You have visited : <?php
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


