<!DOCTYPE html>
<html>
<head>
    <title><?= $html->title(); ?></title>
    <?php
    $asset->addStylesheet('/main/css/style.css', []);
    $asset->addStylesheet('/css/debug.css', [], 100, 'dev');

    echo $asset->stylesheets($env ?: 'prod'); ?>
</head>
<body class="<?= $this->getConfig('module') . '-' . $this->getConfig('controller') . '-' . $this->getConfig('action'); ?>">
    <?= $this->getContent(); ?>
</body>
</html>