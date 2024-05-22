<?php

session_start();

$game_id = $_POST['game_id'];
$user_id = $_SESSION['id'];

$_SESSION['game_id'] = $game_id;

$connectDatabase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");

$request = $connectDatabase->prepare("INSERT INTO user_in_game (game_id, user_id) VALUES (:game_id, :user_id)");

$request->bindParam(':game_id', $game_id);
$request->bindParam(':user_id', $user_id);

$request->execute();

$updatePlayerNumber = $connectDatabase->prepare("UPDATE games SET playerNumber = playerNumber + 1 WHERE id = :game_id");

$updatePlayerNumber->bindParam(':game_id', $game_id);

$updatePlayerNumber->execute();

header('Location: ../../game_lobby.php?success=Vous avez bien rejoint la partie');