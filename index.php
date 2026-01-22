<?php

require_once('./connection.php');

$stmt = $pdo->query('SELECT id, title FROM books');

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raamatupood</title>
</head>
<body>
    <li>
<?php while ($book = $stmt->fetch()) { ?>
        <a href="book.php?id=<? echo $book['id']; ?>">
            <?php echo $book['title']; ?>
        </a>
<?php } ?>
    </li>


</body>
</html>

