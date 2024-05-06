<?php require_once 'parts/header.php'; ?>

<div class="container">
    <h1>Login page</h1>

    <form action="scripts/sign-in/sign-in.php" method="POST">
        <div class="mb-3">
            <input class="form-control" type="text" placeholder="Enter an email" name="email">
        </div>
        <div class="mb-3">
            <input class="form-control" type="text" placeholder="Enter a password" name="password">
        </div>
        <div class="mb-3">
            <input type="submit" value="Sign-in" class="btn btn-primary w-100">
        </div>
    </form>
    <p>
        you don't have an account yet?
        <a href="sign_up.php">Click here</a>
    </p>

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

</div>

<?php require_once 'parts/footer.php'; ?>