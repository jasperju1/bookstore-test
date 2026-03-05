<?php

require_once('./connection.php');

$stmt = $pdo->query('SELECT * FROM books');
// tee paring sql andmebaasis et leida autor iga booki id jargi, igal raamatul on enda id kus on tema autorid, mitte koik autorid
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Raamatupood</title>
</head>

<body>
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
    <?php while ($book = $stmt->fetch()) { ?>
        <li>
            <div class="flex justify-center items-center mt-20">
                <div class="flex items-center flex-col gap-10">
                    <div class="flex flex-col gap-0 items-center">
                        <a href="book.php?id=<? echo $book['id']; ?>" class="font-semibold text-3xl max-w-prose">
                            <?= $book['title']; ?> (<?= $book['release_date'] ?>)
                        </a>
                    </div>
                    <img src="<?= $book['cover_path'] ?>" alt="">
                    <p class="text-xl font-semibold"><?= round($book['price'], 2); ?>€
                    </p>
                    <p class="max-w-prose text-lg">
                        <?= $book['summary']; ?>
                    </p>
                </div>
            </div>
        </li>
    <?php } ?>
    </li>



</body>

</html>

