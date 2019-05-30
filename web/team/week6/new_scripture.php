<?
include("db_connect.php");
$db = get_db();

include("db_functions.php");

$data['book']    = filter_var($_POST['book'], FILTER_SANITIZE_STRING);
$data['chapter'] = filter_var($_POST['chapter'], FILTER_SANITIZE_STRING);
$data['verse']   = filter_var($_POST['verse'], FILTER_SANITIZE_STRING);
$data['content'] = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
$topics  = $_POST['topics'];
$newtopic = $_POST['newtopic'];
$newtopictext = filter_var($_POST['newtopictext'], FILTER_SANITIZE_STRING);

$scripture_id = addScripture($data);

foreach($topics as $t){
    addScriptureTopic($scripture_id, $t);
}
if($newtopic == "checked"){
    $newTopicId = addSTopic($newtopictext);
    addScriptureTopic($scripture_id, $newTopicId);
}


//header("Location: view_scriptures.php");
header("Location: index.php");
?>