<!DOCTYPE html>
<!--
Personal Home Page
-->
<html lang="en-us">
    <head>   
        <meta charset="UTF-8"/>
        <meta name="author" content="Shannon Polfer">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SP Home</title>
        <link href="css/home_style.css" rel="stylesheet" type="text/css" 
              media="screen">
        <script src="js/homejs.js"></script>
    </head>
    <body>
        <header>
            <div class="header__text-box">
                <h1 class="heading-primary">
                    <span class="heading-primary--main">Shannon's</span>
                    <span class="heading-primary--sub">CSS313 Web Engineering II Web Site </span>
                </h1>

                
                <a href="#" onclick="myFunction()" class="btn btn--white btn--animated">&nbsp;&nbsp;&nbsp;&nbsp;Hi There&nbsp;&nbsp;&nbsp;&nbsp;</a>
                 <a href="views/assignments.php" class="btn btn--white btn--animated">Assignments</a>
            </div>
            <div class="home__btn--message-box">
                <p id="home__btn--answer"></p>
            </div>
        </header>  
        
        <footer>
                <?php include ('common/footer.php'); ?>
            </footer>
    </body>
</html>

