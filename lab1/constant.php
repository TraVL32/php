<?php
// ЗАДАНИЕ 1
const SITE_NAME = 'Мой сайт';
// или: define('SITE_NAME', 'Мой сайт');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Константы</title>
</head>
<body>
	<h1>Константы</h1>
	<?php
	// ЗАДАНИЕ 2
	if (defined('SITE_NAME')) {
		echo 'SITE_NAME = ' . SITE_NAME . '<br>';
	}

	// ЗАДАНИЕ 3
	echo 'Версия PHP: ' . PHP_VERSION . '<br>';
	echo 'Директория скрипта: ' . __DIR__ . '<br>';
	?>
</body>
</html>