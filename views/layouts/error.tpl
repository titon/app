
<?php echo $this->html->docType(); ?>
<html>
<head>
    <title><?php echo $this->html->title(); ?></title>
	<?php
	echo $this->html->meta('content-type');
	echo $this->html->meta('description', 'Titon: The PHP 5.3 Modular Framework');
	echo $this->asset->stylesheets(); ?>
</head>
<body>
    <?php echo $this->content(); ?>

    <?php if (!empty($benchmarks)) { ?>
		<table cellpadding="5" cellspacing="0">
		<tr>
			<th>Benchmark</th>
			<th>Time</th>
			<th>Memory Usage</th>
			<th>Peak Memory</th>
		</tr>
			<?php foreach ($benchmarks as $mark => $data) { ?>
			<tr>
				<td><?php echo $mark; ?></td>
				<td><?php echo $data['avgTime'] ? $data['avgTime'] : 'Interrupted'; ?></td>
				<td><?php echo $data['avgMemory'] ? $data['avgMemory'] : 'Interrupted'; ?></td>
				<td><?php echo $data['peakMemory']; ?></td>
			</tr>
			<?php } ?>
		</table>
    <?php } ?>
	
	<?php echo $this->asset->scripts(); ?>
</body>
</html>
