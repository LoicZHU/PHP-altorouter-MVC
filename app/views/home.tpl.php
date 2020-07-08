
<table>
    <thead>
        <tr>
            <th>Personnages</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <!-- affichage des info par perso -->
            <?php foreach ($charactersList as $character) : ?>
            <td>
                <img src="<?= $imageAssetsBaseUri . $character->getPicture() ?>" alt="image de <?= $character->getName()?>"/><br>
                <?= '- IDENTITE : ' . $character->getName() . '<br>' ?>
                <?= '- TYPE : ' . $character->getType_name() . '<br>' ?>
                <?= '- DESCRIPTION : ' . $character->getDescription() ?>
            </td>
            <?php endforeach ?>
            <!-- /affichage des info par perso -->
        </tr>
    </tbody>
</table>

