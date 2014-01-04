<h1><?= $code; ?></h1>

<h2><?= $pageTitle; ?></h2>

<p>
    <b>Exception:</b> <?= get_class($error); ?><br>
    <b>Message:</b> <?= $message; ?><br>
    <b>File:</b> <?= $error->getFile(); ?><br>
    <b>Line:</b> <?= $error->getLine(); ?>
</p>

<?php backtrace($error); ?>