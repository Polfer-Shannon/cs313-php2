<?php

require 'dbConnect.php';
$db = get_db();
?>

<?php

$add_book = htmlspecialchars($_POST['add_book']);
$add_chapter = htmlspecialchars($_POST['add_chapter']);
$add_verse = htmlspecialchars($_POST['add_verse']);
$add_content = htmlspecialchars($_POST['add_content']);
$topics = $_POST['topics'];

$stmt = $db->prepare('INSERT INTO scriptures(book, chapter, verse, content) VALUES(:add_book, :add_chapter, :add_verse, :add_content);');
$stmt->bindValue(':add_book', $add_book, PDO::PARAM_STR);
$stmt->bindValue(':add_chapter', $add_chapter, PDO::PARAM_INT);
$stmt->bindValue(':add_verse', $add_verse, PDO::PARAM_INT);
$stmt->bindValue(':add_content', $add_content, PDO::PARAM_STR);
$stmt->execute();
$scripture_id = $db->lastInsertId();
foreach ($topics as $t) {
    echo "<p>$t</p>";
    $stmt = $db->prepare('INSERT INTO scrip_top(scriptures_id, topic_id) VALUES(:scriptures_id, :topic_id);');
    $stmt->bindValue(':scriptures_id', $scripture_id, PDO::PARAM_INT);
    $stmt->bindValue(':topic_id', $t, PDO::PARAM_INT);
    $stmt->execute();
}
?>
<pre><?php echo print_r($topics);?></pre>