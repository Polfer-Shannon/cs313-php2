<!DOCTYPE html>
<!--
Browse Page
-->
<html lang="en-us">
    <head>   
        <meta charset="UTF-8"/>
        <meta name="author" content="Shannon Polfer">
        <meta name="viewport">
        <title>SP Browse</title>
        <link href="../../css/cart_style.css" rel="stylesheet" type="text/css" 
              media="screen">
        <script src="../../js/cartjs.js"></script>
    </head>
    <body>
        <header>
            <h1>Pre-owned Thomas Kinkade Calendar Plates</h1>
        </header>
               

        <main>

            
            <form method="post" action="cart.php" >

                <input type="checkbox" name="plates[]" value="Jan">January <br>
                <img src="../../img/cart/jan.jpg" alt="January Plate" style="width: 100px;height: 100px;"><br>
                <input type="checkbox" name="plates[]" value="Feb">February<br>
                <img src="../../img/cart/feb.jpg" alt="February Plate" style="width: 100px;height: 100px;"><br>
                <input type="checkbox" name="plates[]" value="Mar">March<br>
                <img src="../../img/cart/mar.jpg" alt="March Plate" style="width: 100px;height: 100px;"><br>
                <input type="checkbox" name="plates[]" value="Apr">April<br>
                <img src="../../img/cart/apr.jpg" alt="April Plate" style="width: 100px;height: 100px;"><br>

                <input class="btn" type="submit" value="Add to Cart" name="submit">
                
                
            </form>
            

            <a href="cart.php" class="btn">View Cart</a>
        
            
            
        </main>
        

    </body>
</html>
