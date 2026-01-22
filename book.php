<?php

require_once('./connection.php');

$id = $_GET['id'];

// SELECT ...

$stmt = $pdo->prepare('SELECT * FROM books WHERE id = :id');
$stmt->execute(['id' => $id]);
$user = $stmt->fetch();

var_dump($book);