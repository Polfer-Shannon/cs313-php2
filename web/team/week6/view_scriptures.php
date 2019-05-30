<?
include("db_connect.php");
$db = get_db();

include("db_functions.php");
$scriptures  = getScriptures();
for($i=0; $i<count($scriptures); $i++){
    $scriptures[$i]['topics'] = getTopicsForScripture($scriptures[$i]['id']);
}
?>
<!doctype html>
<html>
    <head>
        <title>View Scriptures | Groupwork Week 6</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="week6.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Scriptures</h1>
                    
                    <div class="card-columns">
                        <? foreach($scriptures as $s){ ?>
                        <div class="card">
                            <div class="card-header"><?=$s['book'];?> <?=$s['chapter'];?>:<?=$s['verse'];?></div>
                            <div class="card-body"><?=$s['content'];?></div>
                            <div class="card-footer">
                            <? foreach($s['topics'] as $t){ 
                                echo $t['name'];
                                echo " ";
                            } ?>
                            </div>
                        </div>
                        <? } ?>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </body>
</html>