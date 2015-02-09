<?php
include 'database.php';

$postId = $_GET['p'];

$pdo = Database::connect();
$sql = "SELECT * FROM `articles` WHERE `id_article` = ".$postId." ORDER BY `id_article` ASC";

foreach ($pdo->query($sql) as $row) {
    echo '<h2>'.$row['title'].'</h2>';
    echo '<h4>'.$row['post_date'].'</h4>';
    //fetch article from database, clear the separator, view article on page
    $separator = "<!-- pagebreak -->";
    $article = str_replace($separator, '&nbsp', $row['article']);
    echo nl2br($article);
}

?>