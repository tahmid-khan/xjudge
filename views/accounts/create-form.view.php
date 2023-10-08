<!doctype html>

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

    <button type="submit">Register</button>
</form>
