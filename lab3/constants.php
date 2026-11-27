<?php
declare(strict_types=1);

$constants = get_defined_constants(true);
$total = 0;
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Константы PHP</title>
	<style>
		table { border-collapse: collapse; }
		th, td { border: 1px solid #000; padding: 6px 10px; }
	</style>
</head>
<body>
	<h1>Константы PHP</h1>
<?php
foreach ($constants as $category => $items) {
	echo '<h2>' . htmlspecialchars((string) $category) . '</h2>';
	echo '<table>';
	foreach ($items as $name => $value) {
		$total++;
		echo '<tr><td>' . htmlspecialchars($name) . '</td><td><pre>' . htmlspecialchars(print_r($value, true)) . '</pre></td></tr>';
	}
	echo '</table>';
}

echo '<p>Всего констант: ' . $total . '</p>';
?>
</body>
</html>