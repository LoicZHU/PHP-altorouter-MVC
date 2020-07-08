<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>oSonic</title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="<?= $this->router->generate('homepage') ?>">Accueil</a></li>
                <?php foreach ($typesList as $type) : ?>
                <li><a href="<?= $this->router->generate('type-page') . $type->getId() ?>">Personnages <?= $type->getName() ?></a></li>
                <?php endforeach ?>
                <li><a href="<?= $this->router->generate('creator-page') ?>">Créateurs</a></li>
            </ul>
        </nav>
    </header>

    <main>

