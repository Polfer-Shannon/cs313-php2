<html>
    <head>
        <title>Week 3 Team Assignment</title>  
        <meta charset="UTF-8">
        <meta name="viewport" >
        <link rel="stylesheet" type="text/css" href="form_style.css"> 
    </head>
    <body>
<!--        stretch-->
        <?php
        $major = array(
            "(CS)" => "Computer Science",
            "(WDD)" => "Web Design and Development",
            "(CIT)" => "Computer Information Technology",
            "(CE)" => "Computer Engineering",
        );
        ?>
        
        <form method="post" action="student.php">
            <label for="name">Name:</label>
            <input type="text" name="name">
            <br>
            <label for="email">Email:</label>
            <input type="text" name="email">
            <br>
            <br>
            <label for="major">Major:</label>
            <br>
<!--            <input type="radio" name="major" value="Computer Science">Computer Science<br>
            <input type="radio" name="major" value="Web Design and Development">Web Design and Development<br>
            <input type="radio" name="major" value="Computer Information Technology">Computer Information Technology<br>
            <input type="radio" name="major" value="Computer Engineering">Computer Engineering<br>-->
<!--            stretch-->
            <?php
            asort($major);
            foreach ($major as $key => $major_print) {
                echo "<input type='radio' name='major' value='$major_print'>" . $major_print . ', ' . '<br>';
            }
            ?>
            <br>
            <label for="comment">Comments:</label>
            <textarea rows="4" cols="50" name="comment"></textarea>
            <br>
            <br>
            <label for="continent">What continents have you visited?</label><br>
          
<!--            <input type="checkbox" name="continent[]" value="North America">North America<br>
            <input type="checkbox" name="continent[]" value="South America">South America<br>
            <input type="checkbox" name="continent[]" value="Europe">Europe<br>
            <input type="checkbox" name="continent[]" value="Asia">Asia<br>
            <input type="checkbox" name="continent[]" value="Australia">Australia<br>
            <input type="checkbox" name="continent[]" value="Africa">Africa<br>
            <input type="checkbox" name="continent[]" value="Antarctica">Antarctica<br>-->
            
            <input type="checkbox" name="continent[]" value="NA">North America<br>
            <input type="checkbox" name="continent[]" value="SA">South America<br>
            <input type="checkbox" name="continent[]" value="EU">Europe<br>
            <input type="checkbox" name="continent[]" value="AS">Asia<br>
            <input type="checkbox" name="continent[]" value="AR">Australia<br>
            <input type="checkbox" name="continent[]" value="AF">Africa<br>
            <input type="checkbox" name="continent[]" value="AT">Antarctica<br>



            <input type="submit" name="submit"> 
        </form>
    </body>
</html>

