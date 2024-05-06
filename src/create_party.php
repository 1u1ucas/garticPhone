<?php require_once 'parts/header.php'; ?>

<div class="container">
    <h1>Create a party</h1>

    <form action="scripts/create-party/create-party.php" method="POST">
        <div class="mb-3">
            <input class="form-control" type="text" placeholder="Enter a name" name="name">
        </div>
        <div class="mb-3">
            <input type="submit" value="Create party" class="btn btn-primary w-100">
        </div>
    </form>

    <?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger">
        <?php echo $_GET['error']; ?>
    </div>
    <?php endif; ?>

    <?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success">
        <?php echo $_GET['success']; ?>
    </div>
    <?php endif; ?>


    <?php require_once 'parts/footer.php'; ?>