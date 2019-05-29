        <?php
$add_script = htmlspecialchars($_POST['addScripture']);
//            $stmt = $db->prepare('SELECT * FROM scriptures WHERE book=:book');
//            $stmt->bindValue(':book', $book, PDO::PARAM_STR);
//            $stmt->execute();
//            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
//            foreach ($rows as $r) {
//                echo '<p><a href="details.php?scripture=' . $r['id'] . '">';
//                echo $r['book'] . ' ';
//                echo $r['chapter'];
//                echo ':' . $r['verse'];
//                echo '</a></p>';
//            }

echo $add_script;
?>
