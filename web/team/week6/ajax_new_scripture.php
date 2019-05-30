
<?
include("db_connect.php");
$db = get_db();

include("db_functions.php");

//------------------------------------
// get variables from jquery post function
//------------------------------------
$data['book']    = filter_var($_POST['book'], FILTER_SANITIZE_STRING);
$data['chapter'] = filter_var($_POST['chapter'], FILTER_SANITIZE_STRING);
$data['verse']   = filter_var($_POST['verse'], FILTER_SANITIZE_STRING);
$data['content'] = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
$topics = array();
parse_str($_POST['topics'], $topics);
$newtopic = $_POST['newtopic'];
$newtopictext = filter_var($_POST['newtopictext'], FILTER_SANITIZE_STRING);

//-------------------------------------
// add stuff to database
//-------------------------------------
$scripture_id = addScripture($data);

foreach($topics as $t){
    addScriptureTopic($scripture_id, $t[0]);
}
if($newtopic == "true"){
    $newTopicId = addSTopic($newtopictext);
    addScriptureTopic($scripture_id, $newTopicId);
}

//--------------------------------------
// get scriptures from db and output
//--------------------------------------
$scriptures  = getScriptures();
for($i=0; $i<count($scriptures); $i++){
    $scriptures[$i]['topics'] = getTopicsForScripture($scriptures[$i]['id']);
}
?>
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