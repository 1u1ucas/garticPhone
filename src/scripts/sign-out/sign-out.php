<?php

session_start();

$user_id = $_SESSION['id'];


$connectDatabase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");
//prepare request
$request = $connectDatabase->prepare("DELETE FROM user_in_game WHERE user_id = :user_id");
//bind params
$request->bindParam(':user_id', $user_id);
//execute request
$request->execute();
$result = $request->fetch(PDO::FETCH_ASSOC);

if ($_SESSION['game_id'] == null) {
    header('Location: ../../index.php?success=Vous avez bien été déconnecté');
    exit();
}

$game_id = $_SESSION['game_id'];

$updatePlayerNumber = $connectDatabase->prepare("UPDATE games SET playerNumber = playerNumber - 1 WHERE id = :game_id");

$updatePlayerNumber->bindParam(':game_id', $game_id);

$updatePlayerNumber->execute();

session_destroy();

header('Location: ../../index.php?success=Vous avez bien été déconnecté');