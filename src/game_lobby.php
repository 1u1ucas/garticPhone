<?php require_once 'parts/header.php';


$game_id = $_SESSION['game_id'];

$connectDatabase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");

$query = $connectDatabase->prepare("SELECT * FROM user_in_game WHERE game_id = :game_id");

$query->bindParam(':game_id', $game_id);

$query->execute();

$users = $query->fetchAll(PDO::FETCH_ASSOC);

$request = $connectDatabase->prepare("SELECT * FROM games WHERE id = :game_id");

$request->bindParam(':game_id', $game_id);

$request->execute();

$game = $request->fetch(PDO::FETCH_ASSOC);

?>
<div class="container">

    <h1> <?php echo htmlspecialchars($game['name']); ?></h1>

    <h2>Game lobby</h2>

    <div class="row g-1">
        <?php
        $request = $connectDatabase->prepare("SELECT * FROM users WHERE id = :user_id");

        foreach ($users as $user) {
            $request->bindParam(':user_id', $user['user_id']);

            $request->execute();

            $user_info = $request->fetch(PDO::FETCH_ASSOC);

            echo '<p class="col-1">' . htmlspecialchars($user_info['username']) . '</p>';
        }
        ?>


    </div>

    <div class="mb-3">
        <a href="create_party.php" class="btn btn-primary w-100">Launch the game</a>
    </div>

    <div class="mb-3">
        <a href="scripts/quit-game/quit-game.php" class="btn btn-primary w-100">Quit the game</a>
    </div>




    <?php require_once 'parts/footer.php'; ?>