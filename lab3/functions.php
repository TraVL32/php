<?php
declare(strict_types=1);

$extensions = get_loaded_extensions();
$total = 0;
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Функции загруженных модулей</title>
</head>
<body>
	<h1>Функции загруженных модулей</h1>
<?php
foreach ($extensions as $extension) {
	$funcs = get_extension_funcs($extension);
	if ($funcs === false) {
		continue;
	}

	echo '<h2>' . htmlspecialchars($extension) . '</h2>';
	echo '<ul>';
	foreach ($funcs as $func) {
		$total++;
		echo '<li>' . htmlspecialchars($func) . '</li>';
	}
	echo '</ul>';
}

echo '<p>Всего функций: ' . $total . '</p>';
?>
</body>
</html>