<?php if ($auth_error) : ?>
    <p><?= $auth_error ?></p>
<?php endif; ?>

<form method="post">
    <input type="text" name="username">
    <input type="password" name="password">

    <button type="submit">Login</button>
</form>

<?php if (isset($errors)) : ?>
    <ul>
        <?php foreach ($errors as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
