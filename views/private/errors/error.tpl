<h1><?php echo $code; ?></h1>

<h2><?php echo $pageTitle; ?></h2>

<p>
    <b>Exception:</b> <?php echo get_class($error); ?><br>
    <b>Message:</b> <?php echo $message; ?><br>
    <b>File:</b> <?php echo $error->getFile(); ?><br>
    <b>Line:</b> <?php echo $error->getLine(); ?>
</p>

<?php backtrace($error); ?>