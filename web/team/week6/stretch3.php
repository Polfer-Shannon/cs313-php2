<?
include("db_connect.php");
$db = get_db();

include("db_functions.php");
$topics = getTopics();

$scriptures  = getScriptures();
for($i=0; $i<count($scriptures); $i++){
    $scriptures[$i]['topics'] = getTopicsForScripture($scriptures[$i]['id']);
}
?>
<!doctype html>
<html>
    <head>
        <title>Groupwork Week 6</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="week6.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form id="new-scripture-form" action="new_scripture.php" method="post">
                        <p>
                            <label for="book">Book</label>
                            <input class="form-control" type="text" id="book" name="book" required>
                        </p>
                        <p>
                            <label for="chapter">Chapter</label>
                            <input class="form-control" type="number" id="chapter" name="chapter" required>
                        </p>
                        <p>
                            <label for="verse">Verse</label>
                            <input class="form-control" type="number" id="verse" name="verse" required>
                        </p>
                        <p>
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" required></textarea>
                        </p>
                        <p>
                        <? foreach($topics as $t){ ?>
                            <label><input type="checkbox" class="checkbox-topics" name="topics[]" value="<?=$t['id'];?>"> <?=$t['name'];?></label><br>
                        <? } ?>
                            <label><input id="newtopic" type="checkbox" name="newtopic" value="checked"> <input id="newtopictext" type="text" name="newtopictext"></label>
                        </p>
                        <p>
                            <input id="newscripture-submit" class="btn btn-primary" type="submit" value="add scripture">
                        </p>
                    </form>
                </div>
                <div class="col-md-6" id="scripture-list">
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
        <script
          src="https://code.jquery.com/jquery-3.4.1.min.js"
          integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
          crossorigin="anonymous"></script>
        <script src="stretch3.js"></script>
    </body>
</html>