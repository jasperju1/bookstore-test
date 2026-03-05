<?php

require_once('./connection.php');

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM books WHERE id = :id');
$stmt->execute(['id' => $id]);
$book = $stmt->fetch();

$stmt = $pdo->prepare('SELECT * FROM authors WHERE id = :id');
$stmt->execute(['id' => $id]);
$author = $stmt->fetch();
 
var_dump($author);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title><?= $book['title'] ?></title>
</head>

<body class="p-0">
    <header>
        <div class="p-10 pr-20 pl-20 flex flex-row justify-between border-b-1">
            <div class="flex gap-20">
                <a class="text-2xl" href="/">HOME</a>
                <a class="text-2xl" href="/">BOOKS</a>
            </div>
            <div>
                <a class="text-2xl" href="/">ACCOUNT</a>
            </div>
        </div>
    </header>
    <div class="flex justify-center items-center mt-20">
        <div class="flex items-center flex-col gap-10">
            <div class="flex flex-col gap-0 items-center">
                <p class="font-semibold text-3xl max-w-prose">
                    <?= $book['title']; ?> (<?= $book['release_date'] ?>)
                </p>
                <p class="font- text-2xl">
                    <?= $author['first_name']; ?> <?= $author['last_name']; ?>
                </p>
            </div>
            <img src="<?= $book['cover_path'] ?>" alt="">
            <p class="text-xl font-semibold"><?= round($book['price'], 2); ?>€
            </p>
            <p class="max-w-prose text-lg">
                <?= $book['summary']; ?>
            </p>
        </div>
    </div>
</body>

</html>


<!-- <?php while ($book = $stmt->fetch()) { ?>
<?php } ?> -->