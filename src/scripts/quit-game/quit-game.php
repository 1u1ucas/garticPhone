<?php

session_start();

$user_id = $_SESSION['id'];

$game_id = $_SESSION['game_id'];
unset($_SESSION['game_id']);

$connectDatabase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");
//prepare request
$request = $connectDatabase->prepare("DELETE FROM user_in_game WHERE user_id = :user_id");
//bind params
$request->bindParam(':user_id', $user_id);
//execute request
$request->execute();
$result = $request->fetch(PDO::FETCH_ASSOC);

$updatePlayerNumber = $connectDatabase->prepare("UPDATE games SET playerNumber = playerNumber - 1 WHERE id = :game_id");

$updatePlayerNumber->bindParam(':game_id', $game_id);

$updatePlayerNumber->execute();


header('Location: ../../search_party.php?success=vous avez bien quitté la game');