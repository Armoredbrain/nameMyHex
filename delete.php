<?php

//CONNECTION
require_once 'connec.php';
$pdo = new \PDO(DSN, USER, PASS);

$query = "DELETE FROM colors WHERE id=:id";
$statement = $pdo->prepare($query);
$statement->bindValue(':id', $_GET['id'], \PDO::PARAM_INT);
$statement->execute();
header("location:editor.php");