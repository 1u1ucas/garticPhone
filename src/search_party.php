<?php require_once 'parts/header.php';


$connectDatabase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");

$request = $connectDatabase->prepare("SELECT * FROM games ORDER BY id DESC");

$request->execute();

$games = $request->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container">

    <div>
        <h1>Create a party</h1>
        <a href="create_party.php">click here</a>
    </div>

    <h1>Search party</h1>

    <div class="row">
        <?php foreach ($games as $game): ?>
        <div class="col-4">
            <div class="card">
                <form action="scripts/join-game/join-game.php" class="card-body" method="POST">
                    <h5 class="card-title"><?php echo $game['name']; ?></h5>
                    <p class="card-text">Number of players: <?php echo $game['playerNumber']; ?></p>
                    <input type="hidden" name="game_id" value="<?php echo $game['id']; ?>">
                    <button type="submit" value="envoyer" class="btn btn-primary">Go to the game</button>
                </form>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>




<?php require_once 'parts/footer.php'; ?>