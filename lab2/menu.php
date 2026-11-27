<?php
declare(strict_types=1);

$leftMenu = [
	['link' => 'Главная', 'href' => 'index.html'],
	['link' => 'Цикл for', 'href' => 'for.php'],
	['link' => 'Цикл while', 'href' => 'while.php'],
	['link' => 'Таблица умножения', 'href' => 'table.php'],
];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Меню</title>
	<style>
		.menu {
			list-style-type: none;
			margin: 0;
			padding: 0;
		}

		.horizontal li {
			display: inline;
			padding: 5px
		}
	</style>
</head>
<body>
	<h1>Меню</h1>
	<?php
	echo '<ul class="menu">';
	foreach ($leftMenu as $item) {
		echo '<li><a href="' . htmlspecialchars($item['href'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '">'
			. htmlspecialchars($item['link'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</a></li>';
	}
	echo '</ul>';
	?>
</body>
</html>
