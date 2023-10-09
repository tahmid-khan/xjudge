<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About | Xjudge</title>
</head>
<body>
    <nav>
        <menu>
            <li><a href="/contests">All Contests</a></li>
            <li><a href="/contests">My Contests</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/help">Help</a></li>
        </menu>
        <main>
            <h1>Contests</h1>
            <ul>
                <?php foreach ($contests as $contest) : ?>
                    <li><?= $contest['name'] ?></li>
                <?php endforeach; ?>
            </ul>
        </main>
    </nav>
</body>
</html>
