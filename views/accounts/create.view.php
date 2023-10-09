<!doctype html>

<form method="post">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" required pattern="^\w{3,32}$">
    <?php if (isset($errors['username'])) : ?>
        <p><?= $errors['username'] ?></p>
    <?php endif; ?>

    <label for="email">Email address</label>
    <input type="email" name="email" id="email" required>
    <?php if (isset($errors['email'])) : ?>
        <p><?= $errors['email'] ?></p>
    <?php endif; ?>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" required pattern="^.{8,}$">
    <?php if (isset($errors['password'])) : ?>
        <p><?= $errors['password'] ?></p>
    <?php endif; ?>

    <button type="submit">Register</button>
</form>

<?php if (isset($server_error)) : ?>
    <p><?= $server_error ?></p>
<?php endif; ?>
