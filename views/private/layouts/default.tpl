<!DOCTYPE html>
<html>
<head>
    <title><?= $html->title(); ?></title>
    <?php
    $asset->addStylesheet('/common/css/style.css', []);
    $asset->addStylesheet('/css/debug.css', [], 100, 'dev');

    echo $asset->stylesheets(isset($env) ? $env : 'dev'); ?>
</head>
<body class="module-<?= $this->config->module; ?> controller-<?= $this->config->controller; ?> action-<?= $this->config->action; ?>">
    <?= $this->getContent(); ?>
</body>
</html>