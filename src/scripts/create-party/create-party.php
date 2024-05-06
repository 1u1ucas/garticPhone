<?php

session_start();
$numberHistory = 0;
$ownerID = $_SESSION['id'];
$status = "created";


$connectDatabase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");

$request = $connectDatabase->prepare("INSERT INTO games (name, numberHistory, ownerId, status) VALUES (:name, :numberHistory, :ownerId, :status)");

$request->bindParam(':name', $_POST['name']);
$request->bindParam(':numberHistory', $numberHistory);
$request->bindParam(':ownerId', $ownerID);
$request->bindParam(':status', $status);


$request->execute();

header('Location: ../../search_party.php?success=La partie a bien été créée');