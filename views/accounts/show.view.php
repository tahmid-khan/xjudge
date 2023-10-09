<!doctype html>

<h1>Profile of <?= $_SESSION['username'] ?></h1>

<form method="post">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" required pattern="^\w{3,32}$">
    <?php if ($errors['username']) : ?>
        <p><?= $errors['username'] ?></p>
    <?php endif; ?>

    <label for="email">Email address</label>
    <input type="email" name="email" id="email" required>
    <?php if ($errors['email']) : ?>
        <p><?= $errors['email'] ?></p>
    <?php endif; ?>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" required pattern="^.{8,}$">
    <?php if ($errors['password']) : ?>
        <p><?= $errors['password'] ?></p>
    <?php endif; ?>

    <button type="submit">Update</button>
</form>

<?php if (isset($server_error)) : ?>
    <p><?= $server_error ?></p>
<?php endif; ?>
