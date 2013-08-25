<!DOCTYPE html>
<html>
<head>
	<title><?php echo $this->html->title(); ?></title>
	<?php
	$this->asset->addStylesheet('/common/css/style.css', 'screen');
	$this->asset->addStylesheet('/css/debug.css', 'screen', 100, 'dev');

	echo $this->asset->stylesheets(isset($env) ? $env : 'dev'); ?>
</head>
<body>
	<?php echo $this->getContent(); ?>
</body>
</html>