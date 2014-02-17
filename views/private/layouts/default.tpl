<!DOCTYPE html>
<html>
<head>
    <title><?= $html->title(); ?></title>
    <?php
    $asset->addStylesheet('/common/css/style.css', []);
    $asset->addStylesheet('/css/debug.css', [], 100, 'dev');

    echo $asset->stylesheets(isset($env) ? $env : 'dev'); ?>
</head>
<body class="<?= $this->getConfig('module') . '-' . $this->getConfig('controller') . '-' . $this->getConfig('action'); ?>">
    <?= $this->getContent(); ?>
</body>
</html>